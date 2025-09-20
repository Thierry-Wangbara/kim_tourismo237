<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Statistiques générales
        $stats = [
            'total_bookings' => Booking::count(),
            'total_revenue' => Booking::where('status', 'confirmed')->sum('total_price'),
            'active_sites' => Site::where('is_active', true)->count(),
            'total_users' => User::count(),
            'site_managers' => User::where('account_type', 'site_manager')->count(),
            'tourists' => User::where('account_type', 'tourist')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'cancelled_bookings' => Booking::where('status', 'cancelled')->count(),
            'rejected_bookings' => Booking::where('status', 'rejected')->count(),
        ];

        // Réservations récentes
        $recentBookings = Booking::with(['user', 'site'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Sites récents
        $recentSites = Site::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Utilisateurs récents
        $recentUsers = User::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Statistiques par mois (pour les graphiques)
        $monthlyStats = $this->getMonthlyStats();

        // Top sites par réservations
        $topSites = Site::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->limit(5)
            ->get();

        // Top gestionnaires par sites
        $topManagers = User::where('account_type', 'site_manager')
            ->withCount('sites')
            ->orderBy('sites_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentBookings',
            'recentSites',
            'recentUsers',
            'monthlyStats',
            'topSites',
            'topManagers'
        ));
    }

    /**
     * Get monthly statistics for charts
     */
    private function getMonthlyStats()
    {
        $currentYear = now()->year;
        
        $monthlyBookings = Booking::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(total_price) as revenue')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlySites = Site::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyUsers = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'bookings' => $monthlyBookings,
            'sites' => $monthlySites,
            'users' => $monthlyUsers,
        ];
    }

    /**
     * Get booking statistics by status
     */
    public function getBookingStats()
    {
        $stats = Booking::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        return response()->json($stats);
    }

    /**
     * Get revenue statistics
     */
    public function getRevenueStats()
    {
        $revenue = Booking::where('status', 'confirmed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_price) as revenue')
            )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($revenue);
    }
}