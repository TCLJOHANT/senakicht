<div>
    <header class="header">
        <div href="#" class="logo">
            <img src="{{asset('favicons/LogoSenakicht.png')}}" alt="logo">
        </div>
        <nav class="navbar">
            <a class="px-2" href="{{ route('home') }}"><i class="fas fa-home fa-fw"></i> Inicio</a>
            <a class="px-2" href="{{ route('nosotros') }}"><i class="fas fa-info-circle fa-fw"></i> Acerca de</a>
            <a class="px-2" href="{{ route('menu') }}"><i class="fas fa-utensils fa-fw"></i> Platos</a>
            <a class="px-2" href="{{ route('productos') }}"><i class="fas fa-shopping-basket fa-fw"></i> Productos</a>
            <a class="px-2" href="{{ route('recetas') }}"><i class="fas fa-book-open fa-fw"></i> Recetas</a>
            <a class="px-2" href="{{ route('comentarios.index') }}"><i class="fas fa-comments fa-fw"></i> Opiniones</a>
            <a class="px-2" href="{{ route('contactos') }}"><i class="fas fa-envelope fa-fw"></i> Contacto</a>
        </nav>

        <div class="cont-header-iconos" >
            <div  class="fas fa-search " id="search-btn"></div>
                @livewire('search-nav')
                <a class="mx-6" href="{{ route ('cart.index') }}">
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        @if(\Cart::getTotalQuantity() != 0)
                            {{ \Cart::getTotalQuantity() }}
                        @endif
                    </div>
                </a>
                <div class="fas fa-bars mx-4 px-4" id="menu-btn"></div>
                <!--vista auth-->
                @if(auth()->check())
                    <div class="ms-3 mx-4 relative" style="transform: scale(1.1);">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
            
                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
            
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar Cuenta') }}
                                </div>
            
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>
            
                                <!-- url admin -->
                                @can('admin.home')
                                    <x-dropdown-link href="{{ route('admin.home') }}">
                                        {{-- <i class="fas fa-cogs"></i>  --}}
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>                
                                @endcan
            
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif
            
                                <div class="border-t border-gray-200"></div>
            
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
            
                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    
                @else
                    <div class="flex items-center lg:order-2">
                        <x-dropdown width="48">
                            <x-slot name="trigger">
                                <i class="fas fa-fw fa-user"></i>
                            </x-slot>
            
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Bienvenido a Senakitch') }}
                                </div>
                                <x-button class="mx-6 mb-4" wire:click="abrirModalAuth()">Inscribirse</x-button>
                                <div class="border-t border-gray-200"></div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
            
            
        {{-- modal  --}}
        {{-- Modal --}}

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
      
        <x-modal class="px-6" wire:model="openModalAuth" maxWidth="fit">
         
            <div class="md:flex no-wrap">
                <div class="text-black bg-white-200 my-4 p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img src="{{asset('favicons/LogoSenakicht.png')}}" alt="" class="rounded-full h-24 w-24 object-cover  mx-auto">
                    </div>
                    <p class="text-center mb-4">Senakitch</p>
                    <div class="mb-4">
                        <x-label>Correo electrónico</x-label>
                        <x-input wire:model="email"></x-input>

                    </div>
                    <div class="mb-4">
                        <x-label >Contraseña</x-label>
                        <x-input wire:model="password" class="" ></x-input>
                    </div>
                    <button class="flex max-w-ml  ml-auto  text-white bg-green-500 border-0 py-1 px-4 focus:outline-none hover:bg-green-600 rounded">Continuar</button>
                </div>
            </div>
        </x-modal>
        </div>
    </header>
</div>
