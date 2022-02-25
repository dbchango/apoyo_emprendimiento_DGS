<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 @livewireStyles
</head>
<body>





<div id="app">

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

          <h1 class="logo"><a href="{{ url('/')}} ">Emprender<span>.</span></a></h1>

                <nav id="navbar" class="navbar">
                    @if (Route::has('login'))

                    @auth()
                    <ul class="navbar-nav mr-auto">
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item">
                            <a href="{{ url('/negocios') }}" class="nav-link">Negocios</a> 
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Emprendedor</a> 
                        </li>
                    </ul>
                    @endauth()
                        <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                              <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
                    @endif
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>

        </div>
      </header><!-- End Header -->
    <main class="py-2">
        @yield('content')
    </main>
</div>
@livewireScripts
<script type="text/javascript">
window.livewire.on('closeModal', () => {
    $('#exampleModal').modal('hide');
});
</script>

</body>
</html>