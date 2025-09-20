@extends('layouts.app')

@section('title', 'Planifier une visite - ' . $site->name)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- En-tête -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-primary mb-3">
                    <i class="bi bi-calendar-plus me-3"></i>Planifier une visite
                </h1>
                <p class="lead text-muted">Réservez votre visite pour <strong>{{ $site->name }}</strong></p>
            </div>

            <div class="row">
                <!-- Formulaire de réservation -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-4">
                            <h4 class="card-title mb-0">
                                <i class="bi bi-info-circle me-2 text-primary"></i>Détails de la réservation
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('bookings.store', $site) }}" method="POST">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="visit_date" class="form-label fw-bold">
                                            <i class="bi bi-calendar me-2"></i>Date de visite *
                                        </label>
                                        <input type="date" 
                                               class="form-control @error('visit_date') is-invalid @enderror" 
                                               id="visit_date" 
                                               name="visit_date" 
                                               value="{{ old('visit_date') }}" 
                                               min="{{ date('Y-m-d') }}" 
                                               required>
                                        @error('visit_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="visit_time" class="form-label fw-bold">
                                            <i class="bi bi-clock me-2"></i>Heure de visite
                                        </label>
                                        <input type="time" 
                                               class="form-control @error('visit_time') is-invalid @enderror" 
                                               id="visit_time" 
                                               name="visit_time" 
                                               value="{{ old('visit_time') }}">
                                        @error('visit_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Optionnel - Laissez vide si vous n'avez pas de préférence</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="visitors_count" class="form-label fw-bold">
                                            <i class="bi bi-people me-2"></i>Nombre de visiteurs *
                                        </label>
                                        <select class="form-select @error('visitors_count') is-invalid @enderror" 
                                                id="visitors_count" 
                                                name="visitors_count" 
                                                required>
                                            <option value="">Sélectionnez le nombre</option>
                                            @for($i = 1; $i <= 50; $i++)
                                                <option value="{{ $i }}" {{ old('visitors_count') == $i ? 'selected' : '' }}>
                                                    {{ $i }} {{ $i == 1 ? 'personne' : 'personnes' }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('visitors_count')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">
                                            <i class="bi bi-currency-exchange me-2"></i>Prix total
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-calculator"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control bg-light" 
                                                   id="total_price_display" 
                                                   readonly 
                                                   value="Calculé automatiquement">
                                        </div>
                                        <div class="form-text">Prix par personne : {{ $site->formatted_price }}</div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="special_requests" class="form-label fw-bold">
                                        <i class="bi bi-chat-text me-2"></i>Demandes spéciales
                                    </label>
                                    <textarea class="form-control @error('special_requests') is-invalid @enderror" 
                                              id="special_requests" 
                                              name="special_requests" 
                                              rows="4" 
                                              placeholder="Avez-vous des demandes particulières ? (accessibilité, guide, etc.)">{{ old('special_requests') }}</textarea>
                                    @error('special_requests')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Maximum 1000 caractères</div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('explore.show', $site) }}" class="btn btn-outline-secondary me-md-2">
                                        <i class="bi bi-arrow-left me-2"></i>Retour
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-calendar-check me-2"></i>Confirmer la réservation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Informations du site -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 2rem;">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Informations du site
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($site->image)
                                <img src="{{ asset('storage/' . $site->image) }}" 
                                     class="img-fluid rounded mb-3" 
                                     style="height: 200px; width: 100%; object-fit: cover;" 
                                     alt="{{ $site->name }}">
                            @else
                                <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif

                            <h6 class="fw-bold mb-2">{{ $site->name }}</h6>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}
                            </p>
                            <p class="card-text small">{{ Str::limit($site->description, 150) }}</p>

                            <div class="border-top pt-3 mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Prix par personne :</span>
                                    <span class="fw-bold text-primary">{{ $site->formatted_price }}</span>
                                </div>
                                
                                @if($site->opening_hours)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small">Horaires :</span>
                                        <span class="small">{{ $site->opening_hours }}</span>
                                    </div>
                                @endif

                                @if($site->contact_phone)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted small">Contact :</span>
                                        <a href="tel:{{ $site->contact_phone }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-telephone me-1"></i>Appeler
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const visitorsCountSelect = document.getElementById('visitors_count');
    const totalPriceDisplay = document.getElementById('total_price_display');
    const sitePrice = {{ $site->price ?? 0 }};

    function updateTotalPrice() {
        const visitorsCount = parseInt(visitorsCountSelect.value) || 0;
        const totalPrice = sitePrice * visitorsCount;
        
        if (totalPrice > 0) {
            totalPriceDisplay.value = new Intl.NumberFormat('fr-FR', {
                style: 'currency',
                currency: 'XAF',
                minimumFractionDigits: 0
            }).format(totalPrice).replace('XAF', 'FCFA');
        } else {
            totalPriceDisplay.value = 'Gratuit';
        }
    }

    visitorsCountSelect.addEventListener('change', updateTotalPrice);
    
    // Calculer le prix initial
    updateTotalPrice();
});
</script>
@endpush
