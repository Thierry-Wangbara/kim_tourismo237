<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('description', 'Découvrez les merveilles touristiques du Cameroun, l\'Afrique en miniature')">
  <title>@yield('title', 'TOURISM237 - Découverte du Cameroun')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #FF7D1A;
      --secondary-color: #e4750dff;
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
      background-color: white;
      box-shadow: 0 2px 10px rgba(229, 228, 228, 0.1);
      padding: 15px 0;
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary-color);
      font-size: 1.5rem;
    }

    .nav-link {
      color: var(--text-color);
      font-weight: 500;
      margin: 0 10px;
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: var(--primary-color);
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: var(--primary-color);
      bottom: 0;
      left: 0;
      transition: width 0.3s;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      padding: 10px 25px;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #E56E0D;
      border-color: #E56E0D;
    }

    .btn-outline-primary {
      color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .sarah {
      background-color: #E56E0D;
      padding: 60px 0;
      text-align: center;
      color: white
    }

    .btn-outline-orange:hover {
      background-color: #E56E0D;
    }

    .btn-outline-orange {
      color: white;
      border-color: var(--primary-color);
    }

    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/couche.jpg') no-repeat center center;
      background-size: cover;
      background-position: center;
      color: white;
      padding: 120px 0;
      text-align: center;
    }

    .hero-title {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero-subtitle {
      font-size: 1.2rem;
      margin-bottom: 30px;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .section-title {
      font-weight: 700;
      color: var(--dark-color);
      margin-bottom: 40px;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 50%;
      height: 3px;
      background: var(--primary-color);
      bottom: -10px;
      left: 0;
    }

    .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      margin-bottom: 30px;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .card-title {
      font-weight: 600;
      color: var(--dark-color);
    }

    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 20px;
    }

    .feature-title {
      font-weight: 600;
      margin-bottom: 15px;
    }

    .testimonial-card {
      background: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 20px;
    }

    .testimonial-author {
      font-weight: 600;
    }

    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 60px 0 20px;
    }

    .footer-title {
      font-weight: 600;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
    }

    .footer-title::after {
      content: '';
      position: absolute;
      width: 40px;
      height: 2px;
      background: var(--primary-color);
      bottom: 0;
      left: 0;
    }

    .footer-link {
      color: #ADB5BD;
      text-decoration: none;
      transition: color 0.3s;
      display: block;
      margin-bottom: 10px;
    }

    .footer-link:hover {
      color: white;
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      margin-right: 10px;
      transition: background 0.3s;
    }

    .social-icon:hover {
      background: var(--primary-color);
    }

    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }

      .hero-subtitle {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><i class="bi bi-globe me-2"></i>TOURISM237</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('sites') ? 'active' : '' }}" href="{{ url('/sites') }}">Sites</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('hotel') ? 'active' : '' }}" href="{{ url('/hotel') }}">Hôtels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('vehicule') ? 'active' : '' }}" href="{{ url('/vehicule') }}">Véhicules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('a-propos') ? 'active' : '' }}" href="{{ url('/a-propos') }}">À propos</a>
          </li>
          
          @auth
            <li class="nav-item">
              <a class="nav-link {{ request()->is('dashboard/*') || request()->is('admin/dashboard') || request()->is('profil') ? 'active' : '' }}" href="{{ 
                auth()->user()->isAdmin() ? route('admin.dashboard') : 
                (auth()->user()->isSiteManager() ? route('dashboard.site-manager') : route('dashboard.tourist')) 
              }}">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
              </a>
            </li>
          @endauth
        </ul>

        <div class="d-flex">
          <x-navigation.user-menu />
        </div>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="footer-title">TOURISM237</h5>
          <p>Votre guide ultime pour découvrir les merveilles du Cameroun. Nous nous engageons à vous offrir des
            expériences de voyage exceptionnelles.</p>
          <div class="mt-3">
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-4">
          <h5 class="footer-title">Liens rapides</h5>
          <a href="{{ url('/') }}" class="footer-link">Accueil</a>
          <a href="{{ url('/sites') }}" class="footer-link">Sites</a>
          <a href="{{ url('/hotel') }}" class="footer-link">Hôtels</a>
          <a href="{{ url('/vehicule') }}" class="footer-link">Véhicules</a>
          <a href="{{ url('/contact') }}" class="footer-link">Contact</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="footer-title">Contact</h5>
          <p><i class="bi bi-geo-alt me-2"></i> Emombo-Chapelle, Yaoundé, Cameroun</p>
          <p><i class="bi bi-telephone me-2"></i> +237 640 94 40 68</p>
          <p><i class="bi bi-envelope me-2"></i> kimayesarah96@gmail.com</p>
        </div>
      </div>
    </div>

    <hr class="mt-4 mb-4">

    <div class="row">
      <div class="col-md-6 text-center text-md-start mx-auto">
        <p class="mb-0">&copy; 2025 TOURISM237. Tous droits réservés.</p>
      </div>
    </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
