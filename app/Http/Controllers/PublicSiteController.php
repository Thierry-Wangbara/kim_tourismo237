<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class PublicSiteController extends Controller
{
    /**
     * Display a listing of all active sites
     */
    public function index()
    {
        $sites = Site::active()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // Grouper les sites par région
        $sitesByRegion = $sites->groupBy('region');

        $regions = [
            'Centre' => 'Centre',
            'Ouest' => 'Ouest',
            'Sud' => 'Sud',
            'Sud-Ouest' => 'Sud-Ouest',
            'Extrême-Nord' => 'Extrême-Nord',
            'Littoral' => 'Littoral',
            'Nord' => 'Nord',
            'Adamaoua' => 'Adamaoua',
            'Est' => 'Est',
            'Nord-Ouest' => 'Nord-Ouest'
        ];

        return view('sites', compact('sitesByRegion', 'regions'));
    }
}
