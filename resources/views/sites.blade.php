@extends('layouts.app')

@section('title', 'Sites Touristiques - TOURISM237')

@section('content')
<x-tourism.section 
    title="Sites Touristiques du Cameroun" 
    subtitle="Découvrez les merveilles naturelles et culturelles de l'Afrique en miniature, organisées par région"
    background="bg-light"
    padding="py-5"
>
    <!-- Navigation par région -->
    <x-tourism.region-nav :regions="array_map(function($region) {
        return [
            'name' => $region,
            'slug' => strtolower(str_replace([' ', '-'], ['-', '-'], $region)),
            'icon' => 'building'
        ];
    }, array_keys($regions))" />

    @foreach($sitesByRegion as $region => $sites)
        <div id="region-{{ strtolower(str_replace([' ', '-'], ['-', '-'], $region)) }}" class="mb-5">
            <h3 class="text-primary mb-4">
                <i class="bi bi-geo-alt me-2"></i>Région {{ $region }}
            </h3>
            <div class="row">
                @forelse($sites as $site)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
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
                                <h5 class="card-title">{{ $site->name }}</h5>
                                <p class="card-text text-muted small mb-2">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}
                                </p>
                                <p class="card-text flex-grow-1">{{ Str::limit($site->description, 100) }}</p>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-primary fw-bold">{{ $site->formatted_price }}</span>
                                    @if($site->average_rating > 0)
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-star-fill text-warning me-1"></i>
                                            <small>{{ $site->average_rating }}</small>
                                        </div>
                                    @endif
                                </div>

                                @if($site->features && count($site->features) > 0)
                                    <div class="mb-3">
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach(array_slice($site->features, 0, 3) as $feature)
                                                <span class="badge bg-primary bg-opacity-10 text-primary small">
                                                    {{ ucfirst($feature) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="bi bi-person me-1"></i>{{ $site->user->name }}
                                        </small>
                                        <a href="{{ route('explore.show', $site) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-compass me-1"></i>Explorer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-geo-alt text-muted" style="font-size: 3rem;"></i>
                        <h5 class="text-muted mt-3">Aucun site dans cette région</h5>
                        <p class="text-muted">Aucun site touristique n'est disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endforeach

</x-tourism.section>

<!-- Section Statistiques -->
<x-tourism.stats />

<!-- Section Témoignages -->
<x-tourism.section 
    title="Ce que disent nos voyageurs" 
    subtitle="Découvrez les expériences de nos clients qui ont exploré le Cameroun"
>
    <div class="row">
        <x-tourism.testimonial-card 
            name="Marie Dubois"
            location="Touriste française"
            text="Une expérience incroyable ! TOURISM237 a rendu mon voyage au Cameroun inoubliable avec leur service personnalisé et leurs guides experts."
            image="images/teacher.jpg"
            rating="5"
        />
        
        <x-tourism.testimonial-card 
            name="Jean-Pierre Martin"
            location="Voyageur belge"
            text="Le meilleur organisateur de voyages au Cameroun. Tout était parfaitement planifié et exécuté. Je recommande vivement !"
            image="images/lo.jpg"
            rating="5"
        />
        
        <x-tourism.testimonial-card 
            name="Sarah Manga"
            location="Touriste camerounaise"
            text="Même en tant que camerounaise, j'ai découvert des endroits incroyables grâce à TOURISM237. Un service professionnel et attentionné."
            image="images/sarah.png"
            rating="5"
        />
    </div>
</x-tourism.section>

<!-- Call to Action -->
<x-tourism.cta 
    title="Prêt à explorer les sites du Cameroun ?"
    subtitle="Contactez-nous pour planifier votre visite des plus beaux sites touristiques du pays"
    buttonText="PLANIFIER MA VISITE"
    buttonHref="contact"
/>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Navigation fluide vers les sections
    document.querySelectorAll('a[href^="#region-"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush
