<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div  class="Login-box">
                {{-- <x-validation-errors class="mb-4" /> --}}
                <img class="avatar" src="img/elsena.png" alt="Logo de Fazt">
                <h1>SENAKITCH</h1>
                <div class="input-control">
                    @error('email')
                    <small class="small">{{ $message }}</small>
                    @enderror
                    <x-label for="email" value="{{ __('Correo electrónico') }}" />
                    <x-input id="email" placeholder="correo electronico" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4 input-control">
                    @error('password')
                    <small class="small">{{ $message }}</small>
                    @enderror
            
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    {{-- recordar loghin --}}
                    {{-- <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label> --}}
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                            {{ __('continuar') }}
                    </x-button>
                    <a href="" class="login-button">Continuar con Google</a>
                    @if (Route::has('password.request'))
                        <a class="a" href="{{ route('password.request') }}">
                            {{ __('olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    <br>
                    <a  class="a" href="{{route('register')}}">¿No tienes cuenta?</a> <br>
                </div>
        </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
