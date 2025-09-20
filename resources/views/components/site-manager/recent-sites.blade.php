@props(['sites' => []])

<div class="card">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                <i class="bi bi-geo-alt me-2 text-primary"></i>Mes Sites Récents
            </h5>
            <a href="{{ route('sites.manager.index') }}" class="btn btn-outline-primary btn-sm">
                Voir tous <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if(count($sites) > 0)
            <div class="row g-3 p-3">
                @foreach($sites as $site)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            @if($site->image)
                                <img src="{{ asset('storage/' . $site->image) }}"
                                     class="card-img-top"
                                     height="150"
                                     style="object-fit: cover;"
                                     alt="{{ $site->name }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                     style="height: 150px;">
                                    <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title">{{ $site->name }}</h6>
                                <p class="card-text text-muted small mb-2">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}
                                </p>
                                <p class="card-text flex-grow-1 small">{{ Str::limit($site->description, 80) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-primary fw-bold">{{ $site->formatted_price }}</span>
                                    <span class="badge {{ $site->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $site->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>{{ $site->created_at->format('d/m/Y') }}
                                    </small>
                                    <a href="{{ route('sites.manager.show', $site) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye me-1"></i>Voir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-geo-alt text-muted" style="font-size: 3rem;"></i>
                <h5 class="text-muted mt-3">Aucun site</h5>
                <p class="text-muted">Vous n'avez pas encore créé de sites touristiques.</p>
                <a href="{{ route('sites.manager.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Créer mon premier site
                </a>
            </div>
        @endif
    </div>
</div>
