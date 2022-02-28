<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
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
                <form method="POST" action="{{ route('register') }}">
                @csrf
                  <div class="form-outline mb-3">
                    <label class="form-label" for="name">Nombre de usuario</label>
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  </div>

                  <div class="form-outline mb-3">
                        <label class="form-label" for="email">Correo electronico</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                  </div>
                  <div class="form-outline mb-3">
                        <label class="form-label" for="password">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                  </div>
                  <div class="form-outline mb-3">
                        <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                  </div>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </label>
                        </div>
                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-dark">{{ __('Registrarme') }}</button>
                        
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Ya estas registrado?') }}
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