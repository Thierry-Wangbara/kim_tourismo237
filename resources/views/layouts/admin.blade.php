<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('description', 'Administration TOURISM237')">
  <title>@yield('title', 'Admin - TOURISM237')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-orange: #FF7D1A;
      --orange-light: #FFF1E8;
      --dark-charcoal: #1A1D21;
      --dark-gray: #2D3036;
      --medium-gray: #5C6066;
      --light-gray: #F7F8F9;
      --white: #FFFFFF;
      --text-dark: #1F2329;
      --text-light: #656D76;
      --border-color: #EAECF0;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--text-dark);
      background-color: var(--light-gray);
      line-height: 1.6;
    }

    /* Navigation */
    .navbar {
      background-color: var(--white) !important;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--border-color);
    }

    .navbar-brand {
      font-weight: 600;
      color: var(--dark-charcoal) !important;
      font-size: 1.25rem;
      display: flex;
      align-items: center;
    }

    .navbar-brand span {
      color: var(--primary-orange);
    }

    .nav-link {
      color: var(--medium-gray) !important;
      font-weight: 500;
      transition: all 0.2s ease;
      font-size: 0.9rem;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary-orange) !important;
    }

    /* Dropdown menu */
    .dropdown-menu {
      border: 1px solid var(--border-color);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border-radius: 8px;
      padding: 0.5rem;
    }

    .dropdown-item {
      border-radius: 6px;
      padding: 0.5rem 0.75rem;
      transition: all 0.2s;
      font-size: 0.9rem;
    }

    .dropdown-item:hover {
      background-color: var(--orange-light);
      color: var(--primary-orange);
    }

    /* Cards */
    .card {
      border: 1px solid var(--border-color);
      border-radius: 10px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
      transition: box-shadow 0.2s ease;
      background-color: var(--white);
    }

    .card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }

    .card-header {
      background-color: var(--white);
      border-bottom: 1px solid var(--border-color);
      font-weight: 600;
      padding: 1rem 1.25rem;
      color: var(--text-dark);
    }

    .card-body {
      padding: 1.25rem;
    }

    /* Buttons */
    .btn {
      font-weight: 500;
      border-radius: 8px;
      padding: 0.5rem 1rem;
      transition: all 0.2s;
      font-size: 0.9rem;
    }

    .btn-primary {
      background-color: var(--primary-orange);
      border-color: var(--primary-orange);
    }

    .btn-primary:hover {
      background-color: #E56E0D;
      border-color: #E56E0D;
    }

    .btn-outline-primary {
      color: var(--primary-orange);
      border-color: var(--primary-orange);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary-orange);
      border-color: var(--primary-orange);
    }

    /* Sidebar */
    .sidebar {
      min-height: calc(100vh - 72px);
      background-color: var(--white);
      border-right: 1px solid var(--border-color);
      padding: 1.5rem 0;
    }

    .sidebar .nav-link {
      color: var(--text-dark) !important;
      padding: 0.7rem 1.25rem;
      border-radius: 8px;
      margin: 0.1rem 0.75rem;
      display: flex;
      align-items: center;
      transition: all 0.2s ease;
    }

    .sidebar .nav-link:hover {
      background-color: var(--orange-light);
      color: var(--primary-orange) !important;
    }

    .sidebar .nav-link.active {
      background-color: var(--primary-orange);
      color: var(--white) !important;
    }

    .sidebar .nav-link i {
      margin-right: 0.75rem;
      font-size: 1rem;
      width: 20px;
      text-align: center;
    }

    /* Main content */
    main {
      padding: 1.5rem 0;
      background-color: var(--light-gray);
    }

    /* Section headers */
    .section-header {
      margin-bottom: 1.5rem;
    }

    .section-header h2 {
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.25rem;
      font-size: 1.5rem;
    }

    .section-header p {
      color: var(--text-light);
      margin-bottom: 0;
      font-size: 0.95rem;
    }

    /* Tables */
    .table {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
      background-color: var(--white);
    }

    .table th {
      background-color: var(--light-gray);
      color: var(--text-dark);
      font-weight: 600;
      padding: 0.875rem;
      border-bottom: 1px solid var(--border-color);
      font-size: 0.9rem;
    }

    .table td {
      padding: 0.875rem;
      vertical-align: middle;
      border-color: var(--border-color);
      font-size: 0.9rem;
    }

    .table tr:hover {
      background-color: #fafafa;
    }

    /* Badges */
    .badge {
      padding: 0.35rem 0.65rem;
      border-radius: 6px;
      font-weight: 500;
      font-size: 0.75rem;
    }

    .badge-success {
      background-color: #ECFDF3;
      color: #067647;
    }

    .badge-warning {
      background-color: #FFFAEB;
      color: #B54708;
    }

    .badge-danger {
      background-color: #FEF3F2;
      color: #B42318;
    }

    .badge-primary {
      background-color: var(--orange-light);
      color: var(--primary-orange);
    }

    /* Stats cards */
    .stats-card {
      background: var(--white);
      color: var(--text-dark);
      border-radius: 10px;
      border-left: 3px solid var(--primary-orange);
    }

    .stats-card .card-title {
      color: var(--text-light);
      font-size: 0.85rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }

    .stats-card .card-value {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    .stats-card .icon-wrapper {
      background-color: var(--orange-light);
      width: 44px;
      height: 44px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-orange);
      font-size: 1.25rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .sidebar {
        min-height: auto;
        padding: 1rem 0;
      }
      
      .stats-card {
        margin-bottom: 1rem;
      }
      
      .sidebar .nav-link {
        margin: 0.1rem 0.5rem;
        padding: 0.6rem 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
        <i class="bi bi-geo-alt me-2"></i>TOURISM<span>237</span>
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sites') }}">
              <i class="bi bi-globe me-1"></i>Voir le site
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle me-2"></i>
              <span>Administrateur</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">
                <i class="bi bi-person me-2"></i>Mon Profil
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
              <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
                <i class="bi bi-speedometer2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#bookings">
                <i class="bi bi-calendar-check"></i>Réservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sites">
                <i class="bi bi-geo-alt"></i>Sites Touristiques
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#hotels">
                <i class="bi bi-building"></i>Hôtels
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#vehicles">
                <i class="bi bi-car-front"></i>Véhicules
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#clients">
                <i class="bi bi-people"></i>Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#reports">
                <i class="bi bi-graph-up"></i>Rapports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#settings">
                <i class="bi bi-gear"></i>Paramètres
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