@props(['image', 'title', 'description', 'location', 'price', 'rating', 'features' => []])

<div class="col-md-4 mb-4">
    <div class="card h-100">
        <div class="position-relative">
            <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}" style="height: 250px; object-fit: cover;">
            <div class="position-absolute top-0 end-0 m-3">
                <span class="badge bg-warning text-dark">
                    <i class="bi bi-star-fill me-1"></i>{{ $rating }}
                </span>
            </div>
        </div>
        
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $title }}</h5>
            
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                <small class="text-muted">{{ $location }}</small>
            </div>
            
            <p class="card-text flex-grow-1">{{ $description }}</p>
            
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
                <x-tourism.button href="#" variant="primary" icon="eye">
                    Explorer
                </x-tourism.button>
            </div>
        </div>
    </div>
</div>
