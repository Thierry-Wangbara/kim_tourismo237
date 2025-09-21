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
      --primary-orange: #FF7D1A;
      --orange-light: #FFA057;
      --orange-lighter: #FFE3D1;
      --dark-blue: #1A1A2E;
      --dark-gray: #2D2D3A;
      --medium-gray: #6B7280;
      --light-gray: #F3F4F6;
      --white: #FFFFFF;
      --text-dark: #1F2937;
      --text-light: #6B7280;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-dark);
      background-color: var(--light-gray);
      line-height: 1.6;
    }

    /* Navigation */
    .navbar {
      background-color: var(--white) !important;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
      padding: 0.8rem 0;
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary-orange) !important;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
    }

    .nav-link {
      color: var(--medium-gray) !important;
      font-weight: 500;
      transition: all 0.2s ease;
      position: relative;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary-orange) !important;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: var(--primary-orange);
      border-radius: 2px;
    }

    /* Dropdown menu */
    .dropdown-menu {
      border: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
      padding: 0.5rem;
    }

    .dropdown-item {
      border-radius: 6px;
      padding: 0.5rem 1rem;
      transition: all 0.2s;
    }

    .dropdown-item:hover {
      background-color: var(--orange-lighter);
      color: var(--primary-orange);
    }

    /* Cards */
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: var(--white);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      font-weight: 600;
      padding: 1rem 1.25rem;
    }

    .card-body {
      padding: 1.25rem;
    }

    /* Buttons */
    .btn {
      font-weight: 500;
      border-radius: 8px;
      padding: 0.5rem 1.25rem;
      transition: all 0.2s;
    }

    .btn-primary {
      background-color: var(--primary-orange);
      border-color: var(--primary-orange);
    }

    .btn-primary:hover {
      background-color: var(--orange-light);
      border-color: var(--orange-light);
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(255, 125, 26, 0.2);
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
      min-height: calc(100vh - 76px);
      background-color: var(--white);
      border-right: 1px solid rgba(0, 0, 0, 0.05);
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.03);
      padding: 1.5rem 0;
    }

    .sidebar .nav-link {
      color: var(--text-dark) !important;
      padding: 0.75rem 1.25rem;
      border-radius: 8px;
      margin: 0.15rem 0.75rem;
      display: flex;
      align-items: center;
    }

    .sidebar .nav-link:hover {
      background-color: var(--orange-lighter);
      color: var(--primary-orange) !important;
    }

    .sidebar .nav-link.active {
      background-color: var(--primary-orange);
      color: var(--white) !important;
    }

    .sidebar .nav-link i {
      margin-right: 0.75rem;
      font-size: 1.1rem;
    }

    /* Main content */
    main {
      padding: 2rem 0;
      background-color: var(--light-gray);
    }

    /* Stats cards */
    .stats-card {
      background: linear-gradient(135deg, var(--white) 0%, var(--white) 100%);
      color: var(--text-dark);
      border-radius: 12px;
      border-left: 4px solid var(--primary-orange);
    }

    .stats-card .card-title {
      color: var(--medium-gray);
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }

    .stats-card .card-value {
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    .stats-card .icon-wrapper {
      background-color: var(--orange-lighter);
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-orange);
      font-size: 1.5rem;
    }

    /* Tables */
    .table {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .table th {
      background-color: var(--orange-lighter);
      color: var(--text-dark);
      font-weight: 600;
      padding: 1rem;
      border-bottom: none;
    }

    .table td {
      padding: 1rem;
      vertical-align: middle;
      border-color: rgba(0, 0, 0, 0.05);
    }

    .table tr:hover {
      background-color: rgba(255, 125, 26, 0.03);
    }

    /* Badges */
    .badge {
      padding: 0.5rem 0.75rem;
      border-radius: 6px;
      font-weight: 500;
    }

    .badge-success {
      background-color: rgba(72, 187, 120, 0.15);
      color: #48BB78;
    }

    .badge-warning {
      background-color: rgba(246, 173, 85, 0.15);
      color: #F6AD55;
    }

    .badge-danger {
      background-color: rgba(245, 101, 101, 0.15);
      color: #F56565;
    }

    /* Tabs */
    .nav-tabs {
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .nav-tabs .nav-link {
      border: none;
      color: var(--text-light);
      font-weight: 500;
      padding: 0.75rem 1.25rem;
      border-radius: 8px;
      margin-right: 0.5rem;
    }

    .nav-tabs .nav-link:hover {
      background-color: var(--light-gray);
      color: var(--primary-orange);
    }

    .nav-tabs .nav-link.active {
      background-color: var(--primary-orange);
      color: var(--white);
    }

    .tab-content {
      background-color: var(--white);
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      margin-top: 1rem;
    }

    /* Section headers */
    .section-header {
      margin-bottom: 1.5rem;
    }

    .section-header h2 {
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.5rem;
    }

    .section-header p {
      color: var(--text-light);
      margin-bottom: 0;
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
        margin: 0.15rem 0.5rem;
        padding: 0.6rem 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard.site-manager') }}">
        <i class="bi bi-geo-alt me-2"></i>TOURISM237
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle me-2"></i>
              <span>{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
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
                <i class="bi bi-speedometer2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('site-manager/bookings*') ? 'active' : '' }}" href="{{ route('site-manager.bookings.index') }}">
                <i class="bi bi-calendar-check"></i>Réservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('sites/manager*') ? 'active' : '' }}" href="{{ route('sites.manager.index') }}">
                <i class="bi bi-geo-alt"></i>Mes Sites
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sites.manager.create') }}">
                <i class="bi bi-plus-circle"></i>Nouveau Site
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#analytics">
                <i class="bi bi-graph-up"></i>Analytiques
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