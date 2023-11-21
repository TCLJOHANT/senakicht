<div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <x-danger-button wire:click="$set('openModal', true)">Crear</x-danger-button>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <x-modificados-jet.modal wire:model="openModal" maxWidth="full" >
        <section class="text-gray-700 body-font  bg-white">
            <div class="container px-5 py-24 mx-auto">
              <div class="lg:w-4/5 mx-auto flex flex-wrap">
                
                  <img alt="img" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="">

                  <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <!-- title receta -->
                    <div class="mb-2">
                        <h2 class=" title-font text-gray-600 tracking-widest mb-1">Titulo de la Receta</h2>
                        <x-input></x-input>
                    </div>
                      <!-- time preparation -->
                    <div class="mb-2">
                        <h2 class="title-font text-gray-600 tracking-widest mb-1">Tiempo de preparación</h2>
                        <i class="fas fa-clock fa-sw "></i>
                        <x-input placeholder="HH:MM:SS"></x-input>
                    </div>
                      <!-- descripcion -->
                    <div class="mb-2">
                        <h2 class="title-font text-gray-600 tracking-widest mb-1">Descripción</h2>
                       <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" cols="6" rows="6">     
                       </textarea>
                    </div>
                  <!-- Ingredients -->
                    <div class="mb-2">
                        <h2 class="title-font text-gray-600 tracking-widest mb-1">Ingredientes</h2>
                        <div>
                            @foreach($ingredientes as $index => $ingrediente)
                                <div class="flex flex-col md:flex-row md:items-center mb-2">
                                    <input type="text" wire:model="ingredientes.{{ $index }}.nombre" placeholder="Nombre del ingrediente" class="border rounded px-2 py-1 mb-2 md:mb-0 md:mr-2">
                                    <input type="text" wire:model="ingredientes.{{ $index }}.cantidad" placeholder="Cantidad" class="border rounded px-2 py-1 mb-2 md:mb-0 md:mr-2" style="width: 80px;">
                                    <input type="text" wire:model="ingredientes.{{ $index }}.medida" placeholder="Medida" class="border rounded px-2 py-1 mb-2 md:mb-0 md:mr-2" style="width: 80px;">
                                    <button type="button" wire:click="eliminarIngrediente({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded mb-2 md:mb-0">Eliminar</button>
                                </div>
                            @endforeach
                            <button type="button" wire:click="agregarIngrediente()" class="bg-blue-500 text-white px-2 py-1 rounded">Agregar Ingrediente</button>
                        </div>
                    </div>

                    <div class="mb-2">
                        <h2 class="title-font text-gray-600 tracking-widest mb-1">Preparación</h2>
                        <div>
                            @foreach($pasos as $index => $paso)
                                <div class="flex flex-col md:flex-row md:items-center mb-2">
                                    <textarea wire:model="pasos.{{ $index }}" placeholder="Paso {{ $index + 1 }}" class="border rounded px-2 py-1 mr-2"></textarea>
                                    <button type="button" wire:click="eliminarPaso({{ $index }})" class=" bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                                </div>
                            @endforeach

                            <button type="button" wire:click="agregarPaso" class="bg-blue-500 text-white px-2 py-1 rounded">Agregar Paso</button>
                        </div>
                    </div>
                    
                
                    {{-- <div class="flex">
                        <h1>Tiempo de preparación:</h1>
                        <div class="flex ml-auto">
                          <i class="fas fa-clock fa-sw m-1"></i>
                          <b >1:56:67</b>
                        </div>
                    </div> --}}
                 
                    <!--boton generar pdf-->
                    <div class="flex">
                      <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">guardar</button> 
                    </div>
                </div>
              </div>
            </div>
            <!---->  
      </section>
     
   </x-modificados-jet.modal>
    {{-- <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            {{$titleModal}}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                @if ($images)
                    @if ($btnModal === "Actualizar" )
                    <img class="mb-4 img-thumbnail imagen mx-auto" src="{{asset('storage/' . $images)}}" alt="imagen receta" width="100px">
                    @endif
                    @if ($images && is_object($images))
                    <img class="mb-4 img-thumbnail imagen mx-auto" src="{{$images->temporaryUrl()}}" alt="" width="100px"> 
                    @endif
                @endif
                <x-label value="Imagen de la Receta"></x-label>
                <input type="file" wire:model="images" id="{{$identificador}}">
                <x-input-error for='images'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Nombre de Receta"></x-label>
                <x-input class="w-full" type="text"
                wire:model="name"></x-input>
                <x-input-error for='name'></x-input-error>
            </div>
        
            <div class="mb-4">
                <x-label value="Descripción de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="description"></textarea>
                <x-input-error for='description'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Ingredientes de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="ingredients"></textarea>
                <x-input-error for='ingredients'></x-input-error>
            </div>
            <div class="mb-4">   
                <x-label value="Preparación de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="preparation"></textarea>
                <x-input-error for='preparation'></x-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            <x-danger-button onclick="alert('success')" class="disabled:opacity-25" wire:loading.attr="disabled" wire:click="createOrUpdate  "  wire:target="createOrUpdate,images">{{$btnModal}}</x-danger-button>
        </x-slot>
    </x-dialog-modal> --}}
</div>
