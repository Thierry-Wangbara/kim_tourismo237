@props(['sites' => []])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Gestion des Sites Touristiques</h5>
        <button class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-2"></i>Ajouter un Site
        </button>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($sites as $site)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        @if($site->image)
                            <img src="{{ asset('storage/' . $site->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $site->name }}" 
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ $site->name }}</h6>
                            <p class="card-text small text-muted flex-grow-1">
                                {{ Str::limit($site->description, 100) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}
                                </small>
                                <span class="badge {{ $site->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $site->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-person me-1"></i>{{ $site->user->name }}
                                </small>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('explore.show', $site) }}" class="btn btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('sites.manager.show', $site) }}" class="btn btn-outline-warning" title="Gérer">
                                        <i class="bi bi-gear"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-geo-alt display-1 d-block mb-3"></i>
                    <h5>Aucun site touristique trouvé</h5>
                    <p>Commencez par ajouter votre premier site touristique.</p>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Ajouter un Site
                    </button>
                </div>
            @endforelse
        </div>
    </div>
</div>
