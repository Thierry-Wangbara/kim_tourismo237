@auth
  <a href="{{ 
    auth()->user()->isAdmin() ? route('admin.dashboard') : 
    (auth()->user()->isSiteManager() ? route('dashboard.site-manager') : route('dashboard.tourist')) 
  }}" class="btn btn-primary btn-lg">
    <i class="bi bi-speedometer2 me-2"></i>MON DASHBOARD
  </a>
  <a href="{{ url('/sites') }}" class="btn btn-outline-orange btn-lg">
    <i class="bi bi-geo-alt-fill me-2"></i>NOS SITES
  </a>
@else
  <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
    <i class="bi bi-person-plus me-2"></i>COMMENCER L'AVENTURE
  </a>
  <a href="{{ url('/sites') }}" class="btn btn-outline-orange btn-lg">
    <i class="bi bi-geo-alt-fill me-2"></i>NOS SITES
  </a>
@endauth
