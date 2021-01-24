<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('change-pass') }}" class="dropdown-item has-icon">
                    <i class="fas fa-lock"></i> Ubah Kata Sandi
                </a>
                <a href="/" class="dropdown-item has-icon">
                    <i class="fas fa-envelope"></i> Ubah Email
                </a>
              @endif

              @if(auth()->user()->hasRole('user'))
                <a href="{{ route('user-transaksi.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-lock"></i> Ubah Kata Sandi
                </a>
                <a href="/" class="dropdown-item has-icon">
                    <i class="fas fa-envelope"></i> Ubah Email
                </a>
              @endif
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
