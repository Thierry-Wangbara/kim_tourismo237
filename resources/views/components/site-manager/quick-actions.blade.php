<div class="card">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="card-title mb-0">
            <i class="bi bi-lightning me-2 text-primary"></i>Actions Rapides
        </h5>
    </div>
    <div class="card-body">
        <div class="d-grid gap-2">
            <a href="{{ route('sites.manager.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Site
            </a>
            <a href="{{ route('sites.manager.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-geo-alt me-2"></i>Gérer Mes Sites
            </a>
            <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-success">
                <i class="bi bi-calendar-check me-2"></i>Gérer Réservations
            </a>
            <button class="btn btn-outline-info">
                <i class="bi bi-graph-up me-2"></i>Voir les Statistiques
            </button>
            <button class="btn btn-outline-warning">
                <i class="bi bi-gear me-2"></i>Paramètres
            </button>
        </div>
    </div>
</div>
