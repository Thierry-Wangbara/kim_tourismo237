<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Pas de middleware dans le constructeur - il est appliqué au niveau des routes
    }

    /**
     * Display the tourist dashboard
     */
    public function tourist()
    {
        $user = Auth::user();
        
        // Statistiques des réservations
        $totalBookings = $user->bookings()->count();
        $pendingBookings = $user->bookings()->pending()->count();
        $confirmedBookings = $user->bookings()->confirmed()->count();
        $completedBookings = $user->bookings()->where('status', 'completed')->count();
        
        // Réservations récentes (5 dernières)
        $recentBookings = $user->bookings()
            ->with('site')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Prochaines visites (réservations confirmées à venir)
        $upcomingVisits = $user->bookings()
            ->with('site')
            ->where('status', 'confirmed')
            ->where('visit_date', '>=', now()->toDateString())
            ->orderBy('visit_date', 'asc')
            ->limit(4)
            ->get();

        return view('dashboards.tourist', compact(
            'totalBookings',
            'pendingBookings', 
            'confirmedBookings',
            'completedBookings',
            'recentBookings',
            'upcomingVisits'
        ));
    }

    /**
     * Display the site manager dashboard
     */
    public function siteManager()
    {
        $user = Auth::user();
        
        // Statistiques des sites
        $totalSites = $user->sites()->count();
        $activeSites = $user->sites()->active()->count();
        
        // Réservations pour les sites de ce gestionnaire
        $totalBookings = Booking::whereHas('site', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        
        $pendingBookings = Booking::whereHas('site', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->pending()->count();
        
        // Sites récents
        $recentSites = $user->sites()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        // Réservations récentes
        $recentBookings = Booking::whereHas('site', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with(['site', 'user'])
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        // Statistiques pour les cartes
        $stats = [
            'total_sites' => $totalSites,
            'active_sites' => $activeSites,
            'total_bookings' => $totalBookings,
            'pending_bookings' => $pendingBookings,
        ];

        return view('dashboards.site-manager', compact(
            'stats',
            'recentSites',
            'recentBookings'
        ));
    }
}
