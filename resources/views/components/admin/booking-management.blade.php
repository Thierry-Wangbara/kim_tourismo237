@props(['bookings' => []])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Gestion des Réservations</h5>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary btn-sm">Toutes</button>
            <button type="button" class="btn btn-outline-success btn-sm">Confirmées</button>
            <button type="button" class="btn btn-outline-warning btn-sm">En attente</button>
            <button type="button" class="btn btn-outline-danger btn-sm">Annulées</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" 
                                         style="width: 30px; height: 30px;">
                                        <i class="bi bi-person-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $booking->user->name }}</div>
                                        <small class="text-muted">{{ $booking->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">Site</span>
                                <div class="small text-muted">{{ $booking->site->name }}</div>
                            </td>
                            <td>{{ $booking->visit_date->format('d/m/Y') }}</td>
                            <td>{{ $booking->visit_date->format('d/m/Y') }}</td>
                            <td class="fw-bold">{{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}</td>
                            <td>
                                <span class="badge {{ $booking->status_badge['class'] }}">
                                    {{ $booking->status_badge['label'] }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('site-manager.bookings.show', $booking) }}" class="btn btn-outline-primary" title="Voir détails">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @if($booking->status === 'pending')
                                        <form method="POST" action="{{ route('site-manager.bookings.approve', $booking) }}" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-success" title="Confirmer">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                Aucune réservation trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
