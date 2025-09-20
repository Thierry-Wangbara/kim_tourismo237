@props(['userType' => 'tourist'])

@php
    $dashboards = [
        'tourist' => [
            'title' => 'Espace Touriste',
            'description' => 'Découvrez et réservez vos visites au Cameroun',
            'icon' => 'bi-person',
            'color' => 'primary',
            'route' => 'dashboard.tourist'
        ],
        'site_manager' => [
            'title' => 'Dashboard Gestionnaire',
            'description' => 'Gérez votre site touristique et vos réservations',
            'icon' => 'bi-geo-alt',
            'color' => 'success',
            'route' => 'dashboard.site-manager'
        ],
        'provider' => [
            'title' => 'Dashboard Prestataire',
            'description' => 'Gérez vos services et vos réservations',
            'icon' => 'bi-building',
            'color' => 'warning',
            'route' => 'dashboard.provider'
        ],
        'admin' => [
            'title' => 'Dashboard Administrateur',
            'description' => 'Gérez la plateforme et tous les utilisateurs',
            'icon' => 'bi-shield-check',
            'color' => 'danger',
            'route' => 'admin.dashboard'
        ]
    ];
    
    $currentDashboard = $dashboards[$userType] ?? $dashboards['tourist'];
@endphp

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="bi {{ $currentDashboard['icon'] }} display-1 text-{{ $currentDashboard['color'] }}"></i>
                    </div>
                    
                    <h2 class="mb-3">{{ $currentDashboard['title'] }}</h2>
                    <p class="text-muted mb-4">{{ $currentDashboard['description'] }}</p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="{{ route($currentDashboard['route']) }}" class="btn btn-{{ $currentDashboard['color'] }} btn-lg">
                            <i class="bi bi-arrow-right me-2"></i>Accéder à mon dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
