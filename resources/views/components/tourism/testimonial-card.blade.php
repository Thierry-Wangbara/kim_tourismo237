@props(['name', 'location', 'text', 'image', 'rating' => 5])

<div class="col-md-4 mb-4">
    <div class="testimonial-card h-100">
        <div class="d-flex mb-3">
            @for($i = 0; $i < $rating; $i++)
                <i class="bi bi-star-fill text-warning me-1"></i>
            @endfor
        </div>
        
        <p class="testimonial-text">"{{ $text }}"</p>
        
        <div class="d-flex align-items-center">
            <img src="{{ $image }}" alt="{{ $name }}" class="rounded-circle me-3" width="50" height="50" style="object-fit: cover;">
            <div>
                <h6 class="testimonial-author mb-0">{{ $name }}</h6>
                <small class="text-muted">{{ $location }}</small>
            </div>
        </div>
    </div>
</div>
