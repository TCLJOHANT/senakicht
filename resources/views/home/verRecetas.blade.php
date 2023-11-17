
<x-app-layout >
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
      <!-- component -->

  <section class="text-gray-700 body-font overflow-hidden bg-white">
      <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
          
          @foreach($recetas->multimedia as $imagenes)
            <img alt="img" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ asset('storage/' . $imagenes->ruta) }}">
          @endforeach
          <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <h2 class="text-sm title-font text-gray-500 tracking-widest">NOMBRE DE LA RECETA</h2>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$recetas->name}}</h1>
            <div class="flex mb-4">
              <span class="flex items-center">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <span class="text-gray-600 ml-3">4 Reseñas</span>
              </span>
              <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                <a class="text-gray-500">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
                <a class="ml-2 text-gray-500">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                  </svg>
                </a>
                <a class="ml-2 text-gray-500">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                  </svg>
                </a>
              </span>
            </div>
            <b><i class="fas fa-clock fa-sw"></i> {{$recetas->preparation_time}}</b>
            <!--description-->
            <div class="mb-4">
                <h2 class=" title-font text-gray-600 tracking-widest">Descripción</h2>
                <p class="leading-relaxed">{{$recetas->description}}</p>
            </div>
            <!-- ingredientes -->
            <div class="mb-4">
                <h2 class=" title-font text-gray-600 tracking-widest">Ingredientes</h2>
                @foreach($recetas->ingredients as $ingredients)
                  <p class="leading-relaxed">{{$ingredients->name}}</p>
                @endforeach
            </div>
            <!--preparacion-->
            <div class="mb-4">
                <h2 class="title-font text-gray-600 tracking-widest">Preparación</h2>
                {{-- @foreach($recetas->preparation_steps as $step)
              
                  <p class="leading-relaxed">{{$step->description_step}}</p>
                @endforeach  --}}
              
            </div>
            <div class="flex">
              <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded"> <a href="{{ route('recetas.pdf', ['id' => $recetas->id]) }}" >Generar PDF</a></button> 
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- component -->
      {{-- <div class="contan-title bg-white">
                  <i class="fas fa-utensils"></i>{{ $recetas->name }}

              <section>
                  <div class="repice-re">
                      <div class="contan-img">
                          <img src="{{ asset('storage/' . $recetas->images) }}" >
                      </div>

                      <div class="contan-product">
                          <div class="container-description">
                              <div class="title-description">
                                  <h4><i class="fas fa-star"></i> Descripcion</h4>
                              </div>
                              <div class="text-description">
                                  <ol>
                                      <h4>{{ $recetas->description }}</h4>
                                  </ol>
                              </div>
                          </div>

                          <div class="container-description">
                              <div class="title-description">
                                  <h4><i class="fas fa-utensils"></i> Lista de ingredientes</h4>
                              </div>
                              <div class="text-description">
                                  <ul>
                                      <li>{{ $recetas->ingredients }}</li>
                                      <li>Ingrediente 2</li>
                                      <li>Ingrediente 3</li>
                                      <li>Ingrediente 4</li>

                                  </ul>
                              </div>
                          </div>


                          <div class="container-description">
                              <div class="title-description">
                                  <h4><i class="fas fa-list-alt"></i> Pasos para preparar</h4>
                              </div>
                              <div class="text-description">
                                  <ol>
                                      <li><i class="fas fa-hand-sparkles"></i>{{ $recetas->preparation }} </li>
                                      <li><i class="fas fa-cut"></i> Cortar los ingredientes en trozos pequeños.</li>
                                      <li><i class="fas fa-utensil-spoon"></i> Cocinar a fuego medio durante 20 minutos.</li>
                                      <li><i class="fas fa-leaf"></i> Agregar hierbas frescas y mezclar bien.</li>
                                  </ol>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <a href="{{ route('recetas.pdf', ['id' => $recetas->id]) }}" class="btn">Generar PDF</a>
      </div>   --}}


  </x-app-layout >