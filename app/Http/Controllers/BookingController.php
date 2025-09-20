<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function __construct()
    {
        // Pas de middleware dans le constructeur - il est appliqué au niveau des routes
    }

    /**
     * Show the form for creating a new booking
     */
    public function create(Site $site)
    {
        // Vérifier que l'utilisateur est un touriste
        if (!Auth::user()->isTourist()) {
            return redirect()->back()->with('error', 'Seuls les touristes peuvent planifier des visites.');
        }

        // Vérifier que le site est actif
        if (!$site->is_active) {
            return redirect()->back()->with('error', 'Ce site n\'est pas disponible pour les réservations.');
        }

        return view('bookings.create', compact('site'));
    }

    /**
     * Store a newly created booking
     */
    public function store(Request $request, Site $site)
    {
        // Vérifier que l'utilisateur est un touriste
        if (!Auth::user()->isTourist()) {
            return redirect()->back()->with('error', 'Seuls les touristes peuvent planifier des visites.');
        }

        // Vérifier que le site est actif
        if (!$site->is_active) {
            return redirect()->back()->with('error', 'Ce site n\'est pas disponible pour les réservations.');
        }

        $validator = Validator::make($request->all(), [
            'visit_date' => 'required|date|after_or_equal:today',
            'visit_time' => 'nullable|date_format:H:i',
            'visitors_count' => 'required|integer|min:1|max:50',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Calculer le prix total
        $totalPrice = $site->price ? $site->price * $request->visitors_count : 0;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'site_id' => $site->id,
            'visit_date' => $request->visit_date,
            'visit_time' => $request->visit_time,
            'visitors_count' => $request->visitors_count,
            'total_price' => $totalPrice,
            'special_requests' => $request->special_requests,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Votre demande de réservation a été envoyée avec succès !');
    }

    /**
     * Display the specified booking
     */
    public function show(Booking $booking)
    {
        // Vérifier que l'utilisateur peut voir cette réservation
        if (Auth::user()->id !== $booking->user_id && !Auth::user()->isAdmin() && !Auth::user()->isSiteManager()) {
            abort(403, 'Accès non autorisé');
        }

        $booking->load(['site', 'user']);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Display a listing of the user's bookings
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()
            ->with('site')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Cancel a booking
     */
    public function cancel(Booking $booking)
    {
        // Vérifier que l'utilisateur peut annuler cette réservation
        if (Auth::user()->id !== $booking->user_id) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier que la réservation peut être annulée
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return redirect()->back()->with('error', 'Cette réservation ne peut pas être annulée.');
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }
}
