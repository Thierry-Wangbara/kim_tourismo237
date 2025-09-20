@props(['vehicles' => []])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Gestion des Véhicules</h5>
        <button class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-2"></i>Ajouter un Véhicule
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Capacité</th>
                        <th>Prix/Jour</th>
                        <th>Disponibilité</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr>
                            <td>
                                <img src="{{ $vehicle['image'] ?? 'images/default-vehicle.jpg' }}" 
                                     class="rounded" 
                                     width="50" 
                                     height="50" 
                                     style="object-fit: cover;" 
                                     alt="{{ $vehicle['name'] ?? 'Véhicule' }}">
                            </td>
                            <td>
                                <div class="fw-bold">{{ $vehicle['name'] ?? 'Nom du véhicule' }}</div>
                                <small class="text-muted">{{ $vehicle['description'] ?? 'Description courte' }}</small>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $vehicle['type'] ?? '4x4' }}</span>
                            </td>
                            <td>
                                <i class="bi bi-people me-1"></i>{{ $vehicle['capacity'] ?? '7' }} personnes
                            </td>
                            <td class="fw-bold">{{ $vehicle['price'] ?? '80,000' }} FCFA</td>
                            <td>
                                @php
                                    $available = $vehicle['available'] ?? true;
                                @endphp
                                @if($available)
                                    <span class="badge bg-success">Disponible</span>
                                @else
                                    <span class="badge bg-danger">Indisponible</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $status = $vehicle['status'] ?? 'active';
                                    $statusClasses = [
                                        'active' => 'bg-success',
                                        'inactive' => 'bg-danger',
                                        'maintenance' => 'bg-warning',
                                        'rented' => 'bg-info'
                                    ];
                                    $statusLabels = [
                                        'active' => 'Actif',
                                        'inactive' => 'Inactif',
                                        'maintenance' => 'Maintenance',
                                        'rented' => 'En location'
                                    ];
                                @endphp
                                <span class="badge {{ $statusClasses[$status] }}">
                                    {{ $statusLabels[$status] }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-info" title="Calendrier">
                                        <i class="bi bi-calendar"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" title="Supprimer">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="bi bi-car-front display-4 d-block mb-2"></i>
                                Aucun véhicule trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
