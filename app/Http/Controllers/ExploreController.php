<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display the specified site for exploration
     */
    public function show(Site $site)
    {
        // Vérifier que le site est actif
        if (!$site->is_active) {
            abort(404, 'Site non disponible');
        }

        // Charger les relations
        $site->load('user');

        // Sites similaires (même région, excluant le site actuel)
        $similarSites = Site::active()
            ->where('region', $site->region)
            ->where('id', '!=', $site->id)
            ->with('user')
            ->limit(3)
            ->get();

        return view('explore.show', compact('site', 'similarSites'));
    }
}
