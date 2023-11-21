<div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <div class="">
        <div class="card-header">
            <x-button wire:click="exportar()" class="btn btn-success">Exportar</x-button>
            {{-- <x-button class="btn btn-info">Importar</x-button> --}}
        </div>
        <div class="px-6 py-4 flex items-center">
            <x-input type="text" class="flex-1 mr-4" wire:model.live="search" placeholder="Buscar"/>
           @livewire('shared.form-recipe')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($recipes->isEmpty())
                    <div class="px-6 py-4">
                        @if ($this->search)
                            No Existe la Receta
                        @else
                            Usted no tiene Recetas creadas actualmente <b> pero puedes crear una ahora.</b>
                        @endif
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Imagen</th>
                                <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                                <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ingredientes</th>
                                <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Preparacion</th>
                                <th colspan="2"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($recipes as $recipe)
                                <tr >
                                    <td class="px-6 py-6">{{$recipe->name}}</td>
                                    <td class="px-6 py-6" >
                                        @foreach($recipe->multimedia as $imagenes)
                                            {{stripslashes($imagenes->ruta)}}
                                                {{-- <img src="{{ asset('storage/' . $imagenes->ruta) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
                                            
                                        @endforeach
                                      
                                    </td>
                                    <td class="px-6 py-6">{{$recipe->description}}</td>
                                    <td class="px-6 py-6"></td>
                                    <td class="px-6 py-6">{{$recipe->preparation}}</td>
                                    <td class="px-6 py-6 flex items-center">
                                        <button class="ml-2 font-bold text-white py-2 px-4 rounded cursor-pointer " style="background-color: #16a34a;" wire:click="emitirReceta({{$recipe}})" >  
                                            <i class="fas fa-pencil-alt"></i>
                                        </button> 
                                        <button onclick="alert('error')" wire:click="destroyRecipe({{$recipe}})" class="ml-2 font-bold text-white py-2 px-4 rounded cursor-pointer" style="background-color:#ef4444">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{-- si tiene al menos dos paginas se mostrata si no se oculta --}}
                        @if ($recipes->hasPages())
                        <div class="px-6 py-3">
                            {{$recipes->links()}}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
