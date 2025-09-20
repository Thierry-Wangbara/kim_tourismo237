@extends('layouts.site-manager')

@section('title', 'Réservation #' . $booking->id . ' - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-calendar-check me-2"></i>Réservation #{{ $booking->id }}
                    </h2>
                    <p class="text-muted mb-0">Détails de la réservation</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">

            <div class="row">
                <!-- Détails de la réservation -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-0 py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">
                                    <i class="bi bi-info-circle me-2 text-primary"></i>Informations de la réservation
                                </h4>
                                <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                    {{ $booking->status_badge['label'] }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Date de visite</h6>
                                    <p class="fw-bold">
                                        <i class="bi bi-calendar me-2"></i>
                                        {{ $booking->visit_date->format('d/m/Y') }}
                                    </p>
                                </div>

                                @if($booking->visit_time)
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-muted mb-2">Heure de visite</h6>
                                        <p class="fw-bold">
                                            <i class="bi bi-clock me-2"></i>
                                            {{ $booking->visit_time->format('H:i') }}
                                        </p>
                                    </div>
                                @endif

                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Nombre de visiteurs</h6>
                                    <p class="fw-bold">
                                        <i class="bi bi-people me-2"></i>
                                        {{ $booking->visitors_count }} {{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Prix total</h6>
                                    <p class="fw-bold text-primary fs-5">
                                        <i class="bi bi-currency-exchange me-2"></i>
                                        {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                    </p>
                                </div>

                                @if($booking->special_requests)
                                    <div class="col-12 mb-3">
                                        <h6 class="text-muted mb-2">Demandes spéciales du client</h6>
                                        <div class="alert alert-info">
                                            <i class="bi bi-chat-text me-2"></i>{{ $booking->special_requests }}
                                        </div>
                                    </div>
                                @endif

                                @if($booking->notes)
                                    <div class="col-12 mb-3">
                                        <h6 class="text-muted mb-2">Vos notes</h6>
                                        <div class="alert alert-warning">
                                            <i class="bi bi-sticky me-2"></i>{{ $booking->notes }}
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <h6 class="text-muted mb-2">Date de réservation</h6>
                                    <p class="mb-0">
                                        <i class="bi bi-calendar-plus me-2"></i>
                                        {{ $booking->created_at->format('d/m/Y à H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations du site -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Site concerné
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @if($booking->site->image)
                                        <img src="{{ asset('storage/' . $booking->site->image) }}" 
                                             class="img-fluid rounded" 
                                             style="height: 150px; width: 100%; object-fit: cover;" 
                                             alt="{{ $booking->site->name }}">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                             style="height: 150px;">
                                            <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h6 class="fw-bold">{{ $booking->site->name }}</h6>
                                    <p class="text-muted mb-2">
                                        <i class="bi bi-geo-alt me-1"></i>{{ $booking->site->location }}
                                    </p>
                                    <p class="small">{{ Str::limit($booking->site->description, 200) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">{{ $booking->site->formatted_price }}</span>
                                        <a href="{{ route('sites.manager.show', $booking->site) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Voir le site
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Informations du client -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-person-circle me-2 text-primary"></i>Informations du client
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px;">
                                    <i class="bi bi-person-fill text-primary" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                            <h6 class="mb-1">{{ $booking->user->name }}</h6>
                            <p class="text-muted small mb-3">{{ $booking->user->email }}</p>
                            
                            @if($booking->user->phone)
                                <div class="mb-2">
                                    <a href="tel:{{ $booking->user->phone }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="bi bi-telephone me-2"></i>{{ $booking->user->phone }}
                                    </a>
                                </div>
                            @endif
                            
                            <div class="mb-2">
                                <a href="mailto:{{ $booking->user->email }}" class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-envelope me-2"></i>Envoyer un email
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h6 class="card-title mb-3">
                                <i class="bi bi-lightning me-2 text-warning"></i>Actions
                            </h6>
                            <div class="d-grid gap-2">
                                @if($booking->status === 'pending')
                                    <form method="POST" action="{{ route('site-manager.bookings.approve', $booking) }}" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success w-100" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir approuver cette réservation ?')">
                                            <i class="bi bi-check-circle me-2"></i>Approuver la réservation
                                        </button>
                                    </form>
                                    <button class="btn btn-danger" onclick="showRejectModal()">
                                        <i class="bi bi-x-circle me-2"></i>Refuser la réservation
                                    </button>
                                @endif
                                
                                @if($booking->status === 'confirmed')
                                    <button class="btn btn-info" onclick="updateStatus('completed')">
                                        <i class="bi bi-flag me-2"></i>Marquer comme terminée
                                    </button>
                                @endif
                                
                                <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Historique des modifications -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-clock-history me-2 text-primary"></i>Historique
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Réservation créée</h6>
                                        <small class="text-muted">{{ $booking->created_at->format('d/m/Y à H:i') }}</small>
                                    </div>
                                </div>
                                
                                @if($booking->updated_at != $booking->created_at)
                                    <div class="timeline-item">
                                        <div class="timeline-marker bg-warning"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Dernière modification</h6>
                                            <small class="text-muted">{{ $booking->updated_at->format('d/m/Y à H:i') }}</small>
                                        </div>
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

<!-- Modal de mise à jour du statut -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Modifier le statut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="statusForm" method="POST" action="{{ route('site-manager.bookings.update-status', $booking) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Nouveau statut</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Annulée</option>
                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Terminée</option>
                            <option value="rejected" {{ $booking->status === 'rejected' ? 'selected' : '' }}>Refusée</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (optionnel)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Ajoutez des notes pour le client...">{{ $booking->notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de refus de réservation -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Refuser la réservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('site-manager.bookings.reject', $booking) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Attention :</strong> Cette action refusera définitivement la réservation. Veuillez expliquer la raison du refus au client.
                    </div>
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">Raison du refus *</label>
                        <textarea class="form-control @error('rejection_reason') is-invalid @enderror" 
                                  id="rejection_reason" 
                                  name="rejection_reason" 
                                  rows="4" 
                                  placeholder="Expliquez pourquoi cette réservation est refusée..." 
                                  required></textarea>
                        @error('rejection_reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Cette raison sera communiquée au client.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-circle me-2"></i>Refuser la réservation
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

.timeline-content h6 {
    margin-bottom: 5px;
    font-size: 0.9rem;
}
</style>
@endpush

@push('scripts')
<script>
function updateStatus(status) {
    document.getElementById('status').value = status;
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

// Afficher le modal de refus
function showRejectModal() {
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    modal.show();
}
</script>
@endpush
