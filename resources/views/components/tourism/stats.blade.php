@props(['background' => 'bg-primary', 'textColor' => 'text-white'])

<section class="py-5 {{ $background }}">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="{{ $textColor }}">
                    <i class="bi bi-geo-alt display-4 mb-3"></i>
                    <h3 class="fw-bold">50+</h3>
                    <p class="mb-0">Sites Touristiques</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="{{ $textColor }}">
                    <i class="bi bi-building display-4 mb-3"></i>
                    <h3 class="fw-bold">100+</h3>
                    <p class="mb-0">Hôtels Partenaires</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="{{ $textColor }}">
                    <i class="bi bi-car-front display-4 mb-3"></i>
                    <h3 class="fw-bold">200+</h3>
                    <p class="mb-0">Véhicules Disponibles</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="{{ $textColor }}">
                    <i class="bi bi-people display-4 mb-3"></i>
                    <h3 class="fw-bold">5000+</h3>
                    <p class="mb-0">Voyageurs Satisfaits</p>
                </div>
            </div>
        </div>
    </div>
</section>
