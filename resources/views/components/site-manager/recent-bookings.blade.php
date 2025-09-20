@props(['bookings' => []])

<div class="card">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                <i class="bi bi-calendar-check me-2 text-primary"></i>Réservations Récentes
            </h5>
            <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-primary btn-sm">
                Voir toutes <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if(count($bookings) > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">Client</th>
                            <th class="border-0">Site</th>
                            <th class="border-0">Date</th>
                            <th class="border-0">Montant</th>
                            <th class="border-0">Statut</th>
                            <th class="border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" 
                                             style="width: 40px; height: 40px;">
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $booking->user->name }}</div>
                                            <small class="text-muted">{{ $booking->user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <div>
                                        <div class="fw-bold">{{ $booking->site->name }}</div>
                                        <small class="text-muted">{{ $booking->site->location }}</small>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <div>
                                        <div class="fw-bold">{{ $booking->visit_date->format('d/m/Y') }}</div>
                                        @if($booking->visit_time)
                                            <small class="text-muted">{{ $booking->visit_time->format('H:i') }}</small>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3">
                                    <div class="fw-bold text-primary">
                                        {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                    </div>
                                    <small class="text-muted">{{ $booking->visitors_count }} {{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}</small>
                                </td>
                                <td class="py-3">
                                    <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                        {{ $booking->status_badge['label'] }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('site-manager.bookings.show', $booking) }}" class="btn btn-outline-primary" title="Voir">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        @if($booking->status === 'pending')
                                            <form method="POST" action="{{ route('site-manager.bookings.approve', $booking) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline-success" title="Approuver" 
                                                        onclick="return confirm('Êtes-vous sûr de vouloir approuver cette réservation ?')">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                <h5 class="text-muted mt-3">Aucune réservation</h5>
                <p class="text-muted">Vous n'avez pas encore de réservations pour vos sites.</p>
            </div>
        @endif
    </div>
</div>
