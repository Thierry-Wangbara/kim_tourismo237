<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('description', 'Gestionnaire de Site TOURISM237')">
  <title>@yield('title', 'Gestionnaire - TOURISM237')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #FF7D1A;
      --secondary-color: #2FAB73;
      --dark-color: #1A1A2E;
      --light-color: #F8F9FA;
      --text-color: #333333;
      --success-color: #28a745;
      --warning-color: #ffc107;
      --danger-color: #dc3545;
      --info-color: #17a2b8;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-color);
      background-color: var(--light-color);
    }

    .navbar {
      background-color: var(--dark-color) !important;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary-color) !important;
      font-size: 1.5rem;
    }

    .nav-link {
      color: #ADB5BD !important;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary-color) !important;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      border-radius: 8px;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #E56E0D;
      border-color: #E56E0D;
    }

    .btn-success {
      background-color: var(--success-color);
      border-color: var(--success-color);
      border-radius: 8px;
    }

    .btn-warning {
      background-color: var(--warning-color);
      border-color: var(--warning-color);
      border-radius: 8px;
    }

    .btn-danger {
      background-color: var(--danger-color);
      border-color: var(--danger-color);
      border-radius: 8px;
    }

    .btn-info {
      background-color: var(--info-color);
      border-color: var(--info-color);
      border-radius: 8px;
    }

    .table th {
      background-color: var(--light-color);
      border-top: none;
      font-weight: 600;
      color: var(--text-color);
    }

    .badge {
      font-size: 0.75rem;
      border-radius: 6px;
    }

    .sidebar {
      min-height: calc(100vh - 56px);
      background-color: #ffffff;
      border-right: 1px solid #e9ecef;
      box-shadow: 2px 0 4px rgba(0,0,0,0.05);
    }

    .sidebar .nav-link {
      color: var(--text-color) !important;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      margin-bottom: 0.25rem;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background-color: #f8f9fa;
      color: var(--primary-color) !important;
    }

    .sidebar .nav-link.active {
      background-color: var(--primary-color);
      color: white !important;
    }

    .stats-card {
      background: linear-gradient(135deg, var(--primary-color) 0%, #ff9a56 100%);
      color: white;
      border-radius: 12px;
    }

    .stats-card.success {
      background: linear-gradient(135deg, var(--success-color) 0%, #34ce57 100%);
    }

    .stats-card.warning {
      background: linear-gradient(135deg, var(--warning-color) 0%, #ffd43b 100%);
    }

    .stats-card.danger {
      background: linear-gradient(135deg, var(--danger-color) 0%, #e74c3c 100%);
    }

    .stats-card.info {
      background: linear-gradient(135deg, var(--info-color) 0%, #20c997 100%);
    }

    .stats-card.secondary {
      background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    }

    .nav-tabs {
      border-bottom: 2px solid #e9ecef;
    }

    .nav-tabs .nav-link {
      border: none;
      color: var(--text-color);
      font-weight: 500;
      padding: 0.75rem 1.5rem;
      border-radius: 8px 8px 0 0;
      margin-right: 0.25rem;
    }

    .nav-tabs .nav-link:hover {
      border-color: transparent;
      background-color: #f8f9fa;
    }

    .nav-tabs .nav-link.active {
      background-color: var(--primary-color);
      color: white;
      border-color: var(--primary-color);
    }

    .tab-content {
      background-color: white;
      border-radius: 0 0 12px 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    @media (max-width: 768px) {
      .sidebar {
        min-height: auto;
      }
      
      .stats-card {
        margin-bottom: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard.site-manager') }}">
        <i class="bi bi-geo-alt me-2"></i>TOURISM237 - Gestionnaire
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('profile') }}">
                <i class="bi bi-person me-2"></i>Mon Profil
              </a></li>
              <li><a class="dropdown-item" href="{{ route('sites') }}">
                <i class="bi bi-globe me-2"></i>Site Public
              </a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                  </button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('dashboard/site-manager') ? 'active' : '' }}" href="{{ route('dashboard.site-manager') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('site-manager/bookings*') ? 'active' : '' }}" href="{{ route('site-manager.bookings.index') }}">
                <i class="bi bi-calendar-check me-2"></i>Réservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('sites/manager*') ? 'active' : '' }}" href="{{ route('sites.manager.index') }}">
                <i class="bi bi-geo-alt me-2"></i>Mes Sites
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sites.manager.create') }}">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Site
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#analytics">
                <i class="bi bi-graph-up me-2"></i>Analytiques
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#settings">
                <i class="bi bi-gear me-2"></i>Paramètres
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
