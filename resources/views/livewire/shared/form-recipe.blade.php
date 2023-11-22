<div>
    <link rel="stylesheet" href="{{asset('css/app/livewire/formRecipe.css')}}">
    <x-danger-button wire:click="$set('openModal', true)">Crear Receta</x-danger-button>
    <x-modificados-jet.modal wire:model="openModal" maxWidth="full" >
        <div class="cont_form_recipe">
            <!--Imagenes-->
            <div class="grid grid-cols-2 gap-1 imgs">
                    {{--  <!-- Input para seleccionar imágenes -->
                    <input class="w-full" type="file" wire:model="images" multiple />
    
                    <div class="grid grid-cols-2 gap-2 imgs">
                        @foreach($images as $index => $image)
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="{{ $image->temporaryUrl() }}" alt=""> 
                                <button wire:click="removeImage({{ $index }})">Eliminar</button> 
                            </div>
                        @endforeach
                    </div>  --}}
                    {{-- <div class="">
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div> --}}

                    <div class="h-auto ">
                        <img class="h-auto  max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto  max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto  max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                    </div>
            </div> 
            
            <form class="form_recipe">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Información de la Receta</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Digite toda la informacion que se pide por favor.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!--titulo receta-->
                        <div class="sm:col-span-full">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Titulo de la Receta</label>
                            <div class="mt-2">
                              <input  wire:model="name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              <x-input-error for="name"></x-input-error>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Tiempo</label>
                            <input wire:model="preparation_time" id="time" name="time" type="text" class="mt-1 p-2 border rounded-md w-full" placeholder="HH:MM" pattern="[0-9]{2}:[0-9]{2}" />
                            <x-input-error for='preparation_time'></x-input-error>
                        </div>
                        
                        
                  
                        <div class="sm:col-span-2">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Dificultad</label>
                            <div class="mt-2">
                              <select wire:model="difficulty" name="difficulty" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>Selecciona Dificultad</option>
                                <option value="fácil" {{ old('difficulty') == 'fácil' ? 'selected' : '' }}>Fácil</option>
                                <option value="medio" {{ old('difficulty') == 'medio' ? 'selected' : '' }}>Medio</option>
                                <option value="difícil" {{ old('difficulty') == 'difícil' ? 'selected' : '' }}>Difícil</option>
                              </select>
                              <x-input-error for="difficulty"></x-input-error>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Categoria</label>
                            <div class="mt-2">
                              <select  wire:model="category_id" id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>Selecciona Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                              <x-input-error for="category_id"></x-input-error>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                            <div class="mt-2">
                                <x-input-error for="description"></x-input-error>
                              <textarea wire:model="description" id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                              <p class="mt-3 text-sm leading-6 text-gray-600">Describe un poco tu receta.</p>
                            </div>
                        </div>
                  
                          <!-- Ingredients -->
                        <div class="col-span-full">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Ingredientes</label>
                                <div>
                                    @foreach($ingredientes as $index => $ingrediente)
                                        <div class="flex flex-col md:flex-row md:items-center mb-2">
                                            <input type="text" wire:model="ingredientes.{{ $index }}.nombre" placeholder="ingrediente" class="block w-sm rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" wire:model="ingredientes.{{ $index }}.cantidad" placeholder="Cantidad" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" wire:model="ingredientes.{{ $index }}.medida" placeholder="Medida" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                            <button type="button" wire:click="eliminarIngrediente({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded mb-2 md:mb-0"> <i class="fas fa-trash"></i></button>
                                        </div>
                                    @endforeach
                                    <button type="button" wire:click="agregarIngrediente()" class="bg-blue-500 text-white px-2 py-1 rounded">Agregar Ingrediente</button>
                                </div>
                        </div>
        
                        <div class="col-span-full">
                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Preparación</label>
                                <div>
                                    @foreach($pasos as $index => $paso)
                                            <div class="mt-2">
                                              <textarea  wire:model="pasos.{{ $index }}" placeholder="Paso {{ $index + 1 }}" id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                              <button type="button" wire:click="eliminarPaso({{ $index }})" class=" bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                                            </div>
                                    @endforeach
        
                                    <button type="button" wire:click="agregarPaso" class="bg-blue-500 text-white px-2 py-1 rounded">Agregar Paso</button>
                                </div>
                        </div>
        
                        <!--boton guardar-->
                        <div class="flex">
                            <x-danger-button class="flex ml-auto " wire:click="createOrUpdate()">{{$btnModal}}</x-danger-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   </x-modificados-jet.modal>
</div>
