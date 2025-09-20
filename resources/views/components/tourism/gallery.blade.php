@props(['images', 'title' => 'Galerie Photos'])

<div class="row">
    <div class="col-12">
        <h3 class="text-center mb-4">{{ $title }}</h3>
    </div>
</div>

<div class="row g-3">
    @foreach($images as $index => $image)
        <div class="col-md-4 col-sm-6">
            <div class="card h-100">
                <img src="{{ $image['src'] }}" 
                     class="card-img-top" 
                     alt="{{ $image['alt'] ?? 'Image' }}" 
                     style="height: 250px; object-fit: cover;"
                     data-bs-toggle="modal" 
                     data-bs-target="#galleryModal"
                     data-bs-slide-to="{{ $index }}"
                     style="cursor: pointer;">
                <div class="card-body">
                    <h6 class="card-title">{{ $image['title'] ?? '' }}</h6>
                    <p class="card-text small text-muted">{{ $image['description'] ?? '' }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal Gallery -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Galerie Photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image['src'] }}" class="d-block w-100" alt="{{ $image['alt'] ?? 'Image' }}" style="height: 500px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $image['title'] ?? '' }}</h5>
                                    <p>{{ $image['description'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
