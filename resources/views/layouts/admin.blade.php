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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #FF7D1A;
      --secondary-color: #2FAB73;
      --dark-color: #1A1A2E;
      --light-color: #F8F9FA;
      --text-color: #333333;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-color);
      background-color: var(--light-color);
    }

    .navbar {
      background-color: var(--dark-color) !important;
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
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: #E56E0D;
      border-color: #E56E0D;
    }

    .table th {
      background-color: var(--light-color);
      border-top: none;
      font-weight: 600;
    }

    .badge {
      font-size: 0.75rem;
    }

    .sidebar {
      min-height: calc(100vh - 56px);
      background-color: #f8f9fa;
      border-right: 1px solid #dee2e6;
    }

    .sidebar .nav-link {
      color: var(--text-color) !important;
      padding: 0.75rem 1rem;
      border-radius: 0.375rem;
      margin-bottom: 0.25rem;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: var(--primary-color);
      color: white !important;
    }

    @media (max-width: 768px) {
      .sidebar {
        min-height: auto;
      }
    }
  </style>
</head>

<body>
  <x-admin.navbar />

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#bookings">
                <i class="bi bi-calendar-check me-2"></i>Réservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sites">
                <i class="bi bi-geo-alt me-2"></i>Sites Touristiques
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#hotels">
                <i class="bi bi-building me-2"></i>Hôtels
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#vehicles">
                <i class="bi bi-car-front me-2"></i>Véhicules
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#clients">
                <i class="bi bi-people me-2"></i>Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#reports">
                <i class="bi bi-graph-up me-2"></i>Rapports
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
