<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function __construct()
    {
        // Pas de middleware dans le constructeur
    }

    /**
     * Check if user is authorized to manage sites
     */
    private function checkSiteManagerAccess()
    {
        if (!Auth::user()->isSiteManager() && !Auth::user()->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkSiteManagerAccess();
        
        $sites = Site::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('sites.manager.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkSiteManagerAccess();
        
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

        return view('sites.manager.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkSiteManagerAccess();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'region' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable|string',
            'access_info' => 'nullable|string',
            'features' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Handle main image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sites', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('sites/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Site::create($data);

        return redirect()->route('sites.manager.index')
            ->with('success', 'Site créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        $this->checkSiteManagerAccess();
        $this->authorize('view', $site);
        return view('sites.manager.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        $this->checkSiteManagerAccess();
        $this->authorize('update', $site);
        
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

        return view('sites.manager.edit', compact('site', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        $this->checkSiteManagerAccess();
        $this->authorize('update', $site);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'region' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable|string',
            'access_info' => 'nullable|string',
            'features' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($site->image) {
                Storage::disk('public')->delete($site->image);
            }
            $data['image'] = $request->file('image')->store('sites', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $gallery = $site->gallery ?? [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('sites/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $site->update($data);

        return redirect()->route('sites.manager.index')
            ->with('success', 'Site mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        $this->checkSiteManagerAccess();
        $this->authorize('delete', $site);

        // Delete images
        if ($site->image) {
            Storage::disk('public')->delete($site->image);
        }
        if ($site->gallery) {
            foreach ($site->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $site->delete();

        return redirect()->route('sites.manager.index')
            ->with('success', 'Site supprimé avec succès !');
    }

    /**
     * Toggle site status
     */
    public function toggleStatus(Site $site)
    {
        $this->checkSiteManagerAccess();
        $this->authorize('update', $site);
        
        $site->update(['is_active' => !$site->is_active]);
        
        $status = $site->is_active ? 'activé' : 'désactivé';
        return redirect()->back()
            ->with('success', "Site {$status} avec succès !");
    }
}
