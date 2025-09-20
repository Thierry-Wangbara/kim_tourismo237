@props(['image', 'name', 'type', 'description', 'capacity', 'price', 'features' => [], 'available' => true])

<div class="col-md-4 mb-4">
    <div class="card h-100 {{ !$available ? 'opacity-75' : '' }}">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $name }}" style="height: 200px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h5 class="card-title">{{ $name }}</h5>
                @if(!$available)
                    <span class="badge bg-danger">Non disponible</span>
                @else
                    <span class="badge bg-success">Disponible</span>
                @endif
            </div>
            
            <div class="mb-2">
                <span class="badge bg-secondary">{{ $type }}</span>
            </div>
            
            <p class="card-text flex-grow-1">{{ $description }}</p>
            
            <div class="mb-2">
                <small class="text-muted">
                    <i class="bi bi-people me-1"></i>Capacité : {{ $capacity }} personnes
                </small>
            </div>
            
            @if($features)
                <div class="mb-3">
                    @foreach($features as $feature)
                        <span class="badge bg-light text-dark me-1 mb-1">
                            <i class="bi bi-{{ $feature['icon'] ?? 'check' }} me-1"></i>{{ $feature['name'] }}
                        </span>
                    @endforeach
                </div>
            @endif
            
            <div class="d-flex justify-content-between align-items-center">
                <div class="h5 text-primary mb-0">{{ $price }}</div>
                @if($available)
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-calendar-plus me-1"></i>Réserver
                    </a>
                @else
                    <button class="btn btn-secondary" disabled>
                        <i class="bi bi-x-circle me-1"></i>Indisponible
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
