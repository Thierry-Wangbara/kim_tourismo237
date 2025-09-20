@props(['hotels' => []])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Gestion des Hôtels</h5>
        <button class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-2"></i>Ajouter un Hôtel
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Localisation</th>
                        <th>Étoiles</th>
                        <th>Prix/Nuit</th>
                        <th>Chambres</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hotels as $hotel)
                        <tr>
                            <td>
                                <img src="{{ $hotel['image'] ?? 'images/default-hotel.jpg' }}" 
                                     class="rounded" 
                                     width="50" 
                                     height="50" 
                                     style="object-fit: cover;" 
                                     alt="{{ $hotel['name'] ?? 'Hôtel' }}">
                            </td>
                            <td>
                                <div class="fw-bold">{{ $hotel['name'] ?? 'Nom de l\'hôtel' }}</div>
                                <small class="text-muted">{{ $hotel['description'] ?? 'Description courte' }}</small>
                            </td>
                            <td>
                                <i class="bi bi-geo-alt me-1"></i>{{ $hotel['location'] ?? 'Localisation' }}
                            </td>
                            <td>
                                @for($i = 0; $i < ($hotel['stars'] ?? 4); $i++)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endfor
                            </td>
                            <td class="fw-bold">{{ $hotel['price'] ?? '45,000' }} FCFA</td>
                            <td>
                                <span class="badge bg-info">{{ $hotel['rooms_available'] ?? '0' }}/{{ $hotel['total_rooms'] ?? '25' }}</span>
                            </td>
                            <td>
                                @php
                                    $status = $hotel['status'] ?? 'active';
                                    $statusClasses = [
                                        'active' => 'bg-success',
                                        'inactive' => 'bg-danger',
                                        'maintenance' => 'bg-warning'
                                    ];
                                    $statusLabels = [
                                        'active' => 'Actif',
                                        'inactive' => 'Inactif',
                                        'maintenance' => 'Maintenance'
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
                                    <button type="button" class="btn btn-outline-info" title="Gérer les chambres">
                                        <i class="bi bi-door-open"></i>
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
                                <i class="bi bi-building display-4 d-block mb-2"></i>
                                Aucun hôtel trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
