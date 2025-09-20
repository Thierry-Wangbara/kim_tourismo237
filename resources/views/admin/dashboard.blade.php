@extends('layouts.admin')

@section('title', 'Dashboard Admin - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard Administrateur</h2>
                <div class="btn-group">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-download me-2"></i>Exporter
                    </button>
                    <button class="btn btn-outline-success">
                        <i class="bi bi-plus-circle me-2"></i>Nouveau
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <x-admin.dashboard :stats="$stats" />

    <!-- Onglets de gestion -->
    <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button" role="tab">
                <i class="bi bi-calendar-check me-2"></i>Réservations
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sites-tab" data-bs-toggle="tab" data-bs-target="#sites" type="button" role="tab">
                <i class="bi bi-geo-alt me-2"></i>Sites Touristiques
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="hotels-tab" data-bs-toggle="tab" data-bs-target="#hotels" type="button" role="tab">
                <i class="bi bi-building me-2"></i>Hôtels
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="vehicles-tab" data-bs-toggle="tab" data-bs-target="#vehicles" type="button" role="tab">
                <i class="bi bi-car-front me-2"></i>Véhicules
            </button>
        </li>
    </ul>

    <div class="tab-content" id="adminTabsContent">
        <!-- Onglet Réservations -->
        <div class="tab-pane fade show active" id="bookings" role="tabpanel">
            <x-admin.booking-management :bookings="$recentBookings" />
        </div>

        <!-- Onglet Sites Touristiques -->
        <div class="tab-pane fade" id="sites" role="tabpanel">
            <x-admin.sites-management :sites="$recentSites" />
        </div>

        <!-- Onglet Hôtels -->
        <div class="tab-pane fade" id="hotels" role="tabpanel">
            <x-admin.hotels-management :hotels="[
                [
                    'name' => 'Hôtel Mont Fébé',
                    'description' => 'Hôtel 4 étoiles avec vue panoramique',
                    'location' => 'Yaoundé, Centre',
                    'image' => 'images/hotel-yaounde.jpg',
                    'stars' => 4,
                    'price' => '45,000',
                    'rooms_available' => 15,
                    'total_rooms' => 25,
                    'status' => 'active'
                ],
                [
                    'name' => 'Hôtel Sawa',
                    'description' => 'Hôtel moderne au cœur de Douala',
                    'location' => 'Douala, Littoral',
                    'image' => 'images/hotel-douala.jpg',
                    'stars' => 3,
                    'price' => '35,000',
                    'rooms_available' => 8,
                    'total_rooms' => 40,
                    'status' => 'active'
                ],
                [
                    'name' => 'Hôtel des Chutes',
                    'description' => 'Hôtel de charme face à l\'océan',
                    'location' => 'Kribi, Sud',
                    'image' => 'images/hotel-kribi.jpg',
                    'stars' => 4,
                    'price' => '28,000',
                    'rooms_available' => 0,
                    'total_rooms' => 20,
                    'status' => 'maintenance'
                ]
            ]" />
        </div>

        <!-- Onglet Véhicules -->
        <div class="tab-pane fade" id="vehicles" role="tabpanel">
            <x-admin.vehicles-management :vehicles="[
                [
                    'name' => 'Toyota Land Cruiser',
                    'description' => 'Véhicule tout-terrain pour safaris',
                    'type' => '4x4',
                    'capacity' => 7,
                    'price' => '80,000',
                    'image' => 'images/4x4-toyota.jpg',
                    'available' => true,
                    'status' => 'active'
                ],
                [
                    'name' => 'Minibus Mercedes',
                    'description' => 'Minibus confortable pour groupes',
                    'type' => 'Minibus',
                    'capacity' => 16,
                    'price' => '60,000',
                    'image' => 'images/minibus.jpg',
                    'available' => true,
                    'status' => 'active'
                ],
                [
                    'name' => 'Toyota Camry',
                    'description' => 'Berline de luxe pour déplacements urbains',
                    'type' => 'Berline',
                    'capacity' => 4,
                    'price' => '45,000',
                    'image' => 'images/sedan.jpg',
                    'available' => false,
                    'status' => 'rented'
                ]
            ]" />
        </div>
    </div>
</div>
@endsection
