@props(['regions' => []])

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    <i class="bi bi-geo-alt me-2"></i>Naviguer par Région
                </h5>
                <div class="row">
                    @foreach($regions as $region)
                        <div class="col-md-2 col-sm-4 col-6 mb-2">
                            <a href="#region-{{ $region['slug'] }}" 
                               class="btn btn-outline-primary btn-sm w-100 text-decoration-none">
                                <i class="bi bi-{{ $region['icon'] ?? 'geo-alt' }} me-1"></i>
                                {{ $region['name'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
