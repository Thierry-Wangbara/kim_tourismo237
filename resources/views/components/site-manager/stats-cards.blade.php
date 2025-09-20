@props(['stats' => []])

<div class="row mb-4">
    <div class="col-md-3 col-6 mb-3">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold">{{ $stats['total_sites'] ?? '0' }}</h3>
                        <p class="mb-0 opacity-75">Mes Sites</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-geo-alt fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card stats-card success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold">{{ $stats['active_sites'] ?? '0' }}</h3>
                        <p class="mb-0 opacity-75">Sites Actifs</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-check-circle fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card stats-card warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold">{{ $stats['total_bookings'] ?? '0' }}</h3>
                        <p class="mb-0 opacity-75">Réservations</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-calendar-check fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-6 mb-3">
        <div class="card stats-card info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold">{{ $stats['pending_bookings'] ?? '0' }}</h3>
                        <p class="mb-0 opacity-75">En Attente</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-hourglass-split fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
