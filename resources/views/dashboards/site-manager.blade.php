@extends('layouts.site-manager')

@section('title', 'Dashboard Gestionnaire - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Dashboard Gestionnaire</h2>
                    <p class="text-muted mb-0">Gérez vos sites touristiques et réservations</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('sites.manager.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Nouveau Site
                    </a>
                    <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-calendar-check me-2"></i>Réservations
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <x-site-manager.stats-cards :stats="$stats" />

    <!-- Contenu principal -->
    <div class="row">
        <!-- Réservations récentes -->
        <div class="col-lg-8">
            <x-site-manager.recent-bookings :bookings="$recentBookings" />
        </div>

        <!-- Actions rapides -->
        <div class="col-lg-4">
            <x-site-manager.quick-actions />
        </div>
    </div>

    <!-- Sites récents -->
    <div class="row mt-4">
        <div class="col-12">
            <x-site-manager.recent-sites :sites="$recentSites" />
        </div>
    </div>
</div>
@endsection