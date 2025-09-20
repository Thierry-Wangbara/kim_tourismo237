<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiteManagerBookingController extends Controller
{
    public function __construct()
    {
        // Pas de middleware dans le constructeur - il est appliqué au niveau des routes
    }

    /**
     * Display a listing of bookings for the site manager's sites
     */
    public function index()
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Récupérer les réservations pour les sites de ce gestionnaire
        $bookings = Booking::whereHas('site', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with(['site', 'user'])
        ->orderBy('created_at', 'desc')
        ->paginate(15);

            // Statistiques
            $stats = [
                'total' => Booking::whereHas('site', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->count(),
                'pending' => Booking::whereHas('site', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->pending()->count(),
                'confirmed' => Booking::whereHas('site', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->confirmed()->count(),
                'cancelled' => Booking::whereHas('site', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->where('status', 'cancelled')->count(),
                'rejected' => Booking::whereHas('site', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->where('status', 'rejected')->count(),
            ];

        return view('site-manager.bookings.index', compact('bookings', 'stats'));
    }

    /**
     * Display the specified booking
     */
    public function show(Booking $booking)
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation appartient à un site de ce gestionnaire
        if ($booking->site->user_id !== $user->id && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        $booking->load(['site', 'user']);
        return view('site-manager.bookings.show', compact('booking'));
    }

    /**
     * Update the booking status
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation appartient à un site de ce gestionnaire
        if ($booking->site->user_id !== $user->id && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,cancelled,completed,rejected',
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update([
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        $statusLabels = [
            'pending' => 'en attente',
            'confirmed' => 'confirmée',
            'cancelled' => 'annulée',
            'completed' => 'terminée',
            'rejected' => 'refusée',
        ];

        return redirect()->back()
            ->with('success', "Réservation marquée comme {$statusLabels[$request->status]} avec succès !");
    }

    /**
     * Get bookings for a specific site
     */
    public function siteBookings(Site $site)
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que le site appartient à ce gestionnaire
        if ($site->user_id !== $user->id && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        $bookings = $site->bookings()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('site-manager.bookings.site-bookings', compact('bookings', 'site'));
    }

    /**
     * Approve a booking
     */
    public function approve(Booking $booking)
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation appartient à un site de ce gestionnaire
        if ($booking->site->user_id !== $user->id && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation peut être approuvée
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Cette réservation ne peut pas être approuvée.');
        }

        $booking->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Réservation approuvée avec succès !');
    }

    /**
     * Reject a booking
     */
    public function reject(Request $request, Booking $booking)
    {
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est un gestionnaire de site
        if (!$user->isSiteManager() && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation appartient à un site de ce gestionnaire
        if ($booking->site->user_id !== $user->id && !$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation peut être refusée
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Cette réservation ne peut pas être refusée.');
        }

        $validator = Validator::make($request->all(), [
            'rejection_reason' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update([
            'status' => 'rejected',
            'notes' => 'Réservation refusée : ' . $request->rejection_reason,
        ]);

        return redirect()->back()->with('success', 'Réservation refusée avec succès !');
    }
}
