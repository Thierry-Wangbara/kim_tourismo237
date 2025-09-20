@props(['image', 'title', 'description', 'location', 'price', 'rating', 'features' => []])

<div class="col-md-4 mb-4">
    <div class="card h-100">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}" style="height: 250px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h5 class="card-title">{{ $title }}</h5>
                <div class="d-flex align-items-center">
                    <i class="bi bi-star-fill text-warning me-1"></i>
                    <span class="text-muted">{{ $rating }}</span>
                </div>
            </div>
            
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                <small class="text-muted">{{ $location }}</small>
            </div>
            
            <p class="card-text flex-grow-1">{{ $description }}</p>
            
            @if($features)
                <div class="mb-3">
                    @foreach($features as $feature)
                        <span class="badge bg-light text-dark me-1 mb-1">{{ $feature }}</span>
                    @endforeach
                </div>
            @endif
            
            <div class="d-flex justify-content-between align-items-center">
                <div class="h5 text-primary mb-0">{{ $price }}</div>
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-eye me-1"></i>Voir détails
                </a>
            </div>
        </div>
    </div>
</div>
