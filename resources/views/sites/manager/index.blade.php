@extends('layouts.site-manager')

@section('title', 'Mes Sites - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-geo-alt me-2"></i>Mes Sites Touristiques
                    </h2>
                    <p class="text-muted mb-0">Gérez vos sites touristiques</p>
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

    <div class="row">
        <div class="col-12">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($sites->count() > 0)
                <div class="row">
                    @foreach($sites as $site)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                @if($site->image)
                                    <img src="{{ asset('storage/' . $site->image) }}" 
                                         class="card-img-top" 
                                         height="200" 
                                         style="object-fit: cover;" 
                                         alt="{{ $site->name }}">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                         style="height: 200px;">
                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title">{{ $site->name }}</h5>
                                        <span class="badge {{ $site->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $site->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </div>

                                    <p class="card-text text-muted small mb-2">
                                        <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}, {{ $site->region }}
                                    </p>

                                    <p class="card-text small">{{ Str::limit($site->description, 100) }}</p>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-primary fw-bold">{{ $site->formatted_price }}</span>
                                        @if($site->average_rating > 0)
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <small>{{ $site->average_rating }}</small>
                                                <small class="text-muted ms-1">({{ $site->rating_count }})</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-auto">
                                        <div class="btn-group w-100" role="group">
                                            <a href="{{ route('sites.manager.show', $site) }}" 
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('sites.manager.edit', $site) }}" 
                                               class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form method="POST" 
                                                  action="{{ route('sites.manager.toggle-status', $site) }}" 
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn {{ $site->is_active ? 'btn-outline-secondary' : 'btn-outline-success' }} btn-sm"
                                                        title="{{ $site->is_active ? 'Désactiver' : 'Activer' }}">
                                                    <i class="bi bi-{{ $site->is_active ? 'pause' : 'play' }}"></i>
                                                </button>
                                            </form>
                                            <form method="POST" 
                                                  action="{{ route('sites.manager.destroy', $site) }}" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce site ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{ $sites->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-geo-alt text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Aucun site créé</h4>
                    <p class="text-muted">Commencez par ajouter votre premier site touristique.</p>
                    <a href="{{ route('sites.manager.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Ajouter un Site
                    </a>
                </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
