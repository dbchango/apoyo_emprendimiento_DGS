<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
<x-guest-layout>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="align-items-center" align="center">
                  <img src="https://www.emprender.com.co/Imagenes/Logos/logogrande.png" style="width: 185px;" alt="logo">
                </div>
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-outline mb-4">
                    <x-jet-label for="email" value="{{ __('Correo electronico') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                  </div>

                  <div class="form-outline mb-4">
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    
                  </div>
                  <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                        </label>
                    </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                    <x-jet-button class="ml-4">
                        {{ __('Ingresar') }}
                    </x-jet-button></br>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Has olvidado tu contraseña?') }}
                        </a>
                    @endif
                  </div>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">No tengo una cuenta?</p>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Registrarme') }}
                        </a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Sistema de apoyo al emprendimiento</h4>
                <p class="small mb-0">Buscamos impulsar el emprendimiento, es por eso que te ofresemos un servicio de apoyo al proceso de avance de tus actas legales para abrir tu negocio .</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</x-guest-layout>