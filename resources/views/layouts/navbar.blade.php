@php
  $countUnreadNotifications = 0;
  if(Auth::user()){
    $countUnreadNotifications = Auth::user()->unreadNotifications->count();
  }
@endphp

<nav class="navbar navbar-expand-md navbar-dark p-2 bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{asset(app_setting('app_logo_white','img/default-logo-white.svg'))}}" class="img-fluid" alt="{{ config('app.name', 'Laravel') }}" style="height:25px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="https://sanbenito.gob.ar" class="nav-link"><i class="fa fa-globe"></i> Sitio Web</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('objectives') }}" class="nav-link"><i class="fas fa-fw fa-bullseye"></i> Objetivos</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reports') }}" class="nav-link"><i class="far fa-fw fa-copy"></i> Reportes</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('events.upcoming') }}" class="nav-link"><i class="far fa-fw fa-calendar-alt"></i> Eventos</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('about.general') }}" class="nav-link"><i class="fas fa-fw fa-question-circle"></i> ¿Cómo funciona?</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Login') }}</a>
        </li>

        {{--
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>&nbsp;{{ __('Register') }}</a>
        </li>
        @endif
        --}}
        @else
        @if( $countUnreadNotifications > 0 )
        <li class="nav-item">
          <a class="nav-link" href="{{ route('panel.notifications.unread') }}"><i class="fas fa-bell"></i>&nbsp;<span class="badge badge-danger badge-pill">{{ $countUnreadNotifications }}</span></a>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @include('utils.avatar',['avatar' => Auth::user()->avatar, 'size' => 20]) {{ Auth::user()->name }} <span
              class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @hasRole('admin')
            <a class="dropdown-item" href="{{ route('admin.index') }}">
              <i class="fas fa-cog"></i>&nbsp;Administración
            </a>
            @endhasRole
            <a class="dropdown-item" href="{{ route('panel.index') }}">
              <i class="fas fa-columns"></i>&nbsp;Mi panel
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
