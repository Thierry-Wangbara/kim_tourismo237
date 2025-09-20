@props(['userType' => 'tourist', 'userName' => 'Utilisateur'])

@php
    $navItems = [
        'tourist' => [
            ['name' => 'Dashboard', 'route' => 'dashboard.tourist', 'icon' => 'bi-speedometer2'],
            ['name' => 'Mes Réservations', 'route' => '#bookings', 'icon' => 'bi-calendar-check'],
            ['name' => 'Favoris', 'route' => '#favorites', 'icon' => 'bi-heart'],
            ['name' => 'Profil', 'route' => 'profile', 'icon' => 'bi-person'],
        ],
        'site_manager' => [
            ['name' => 'Dashboard', 'route' => 'dashboard.site-manager', 'icon' => 'bi-speedometer2'],
            ['name' => 'Réservations', 'route' => '#bookings', 'icon' => 'bi-calendar-check'],
            ['name' => 'Mon Site', 'route' => '#site', 'icon' => 'bi-geo-alt'],
            ['name' => 'Guides', 'route' => '#guides', 'icon' => 'bi-people'],
            ['name' => 'Statistiques', 'route' => '#stats', 'icon' => 'bi-graph-up'],
        ],
        'admin' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'bi-speedometer2'],
            ['name' => 'Utilisateurs', 'route' => '#users', 'icon' => 'bi-people'],
            ['name' => 'Sites', 'route' => '#sites', 'icon' => 'bi-geo-alt'],
            ['name' => 'Réservations', 'route' => '#bookings', 'icon' => 'bi-calendar-check'],
            ['name' => 'Rapports', 'route' => '#reports', 'icon' => 'bi-graph-up'],
            ['name' => 'Paramètres', 'route' => '#settings', 'icon' => 'bi-gear'],
        ]
    ];
    
    $currentNavItems = $navItems[$userType] ?? $navItems['tourist'];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-globe me-2"></i>TOURISM237
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="userNavbar">
            <ul class="navbar-nav me-auto">
                @foreach($currentNavItems as $item)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}" 
                           href="{{ route($item['route']) }}">
                            <i class="{{ $item['icon'] }} me-1"></i>{{ $item['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>{{ $userName }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="bi bi-person me-2"></i>Profil
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i>Paramètres
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}">
                            <i class="bi bi-house me-2"></i>Site Public
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                        </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
