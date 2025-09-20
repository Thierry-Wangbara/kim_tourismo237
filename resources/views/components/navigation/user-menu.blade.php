@auth
  <!-- Menu utilisateur connecté -->
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-fill me-2"></i>{{ auth()->user()->name }}
      <x-auth.account-badge :type="auth()->user()->account_type" size="sm" />
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li>
        <a class="dropdown-item" href="{{ route('profile') }}">
          <i class="bi bi-person me-2"></i>Mon Profil
        </a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ 
          auth()->user()->isAdmin() ? route('admin.dashboard') : 
          (auth()->user()->isSiteManager() ? route('dashboard.site-manager') : route('dashboard.tourist')) 
        }}">
          <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </a>
      </li>
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
  </div>
@else
  <!-- Boutons pour utilisateur non connecté -->
  <div class="btn-group">
    <a class="btn btn-outline-primary" href="{{ route('login') }}">
      <i class="bi bi-box-arrow-in-right me-2"></i>Connexion
    </a>
    <a class="btn btn-primary" href="{{ route('register') }}">
      <i class="bi bi-person-plus me-2"></i>Inscription
    </a>
  </div>
@endauth
