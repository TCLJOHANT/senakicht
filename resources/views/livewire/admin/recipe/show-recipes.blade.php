<div>
 <div class="card">
    <div class="card-header">
        <x-button wire:click="exportar()" class="btn btn-success">Exportar</x-button>
        {{-- <x-button class="btn btn-info">Importar</x-button> --}}
    </div>
    <div class="px-6 py-4 flex items-center">
        <x-input type="text" class="flex-1 mr-4" wire:model.live="search" placeholder="Buscar"/>
        <x-danger-button wire:click="abrirModal()">Crear Receta</x-danger-button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($recipes->count())
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
                                    @if ($recipe['images'] )
                                      <img src="{{ asset('storage/' . $recipe->images) }}"  class="h-13 w-16 object-cover  imagen" width="60">
                                    @endif
                                </td>
                                <td class="px-6 py-6">{{$recipe->description}}</td>
                                <td class="px-6 py-6">{{$recipe->ingredients}}</td>
                                <td class="px-6 py-6">{{$recipe->preparation}}</td>
                                <td class="px-6 py-6 flex items-center">
                                    <button class="ml-2 font-bold text-white py-2 px-4 rounded cursor-pointer " style="background-color: #16a34a;" wire:click="modalEdit({{$recipe}})" >  
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> 
                                    <button wire:click="destroyRecipe({{$recipe}})" class="ml-2 font-bold text-white py-2 px-4 rounded cursor-pointer" style="background-color:#ef4444">
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
                  @else
                  <div class="px-6 py-4">
                      No Existe la receta
                  </div>
                  @endif
        </div>
    </div>
 </div>








{{-- Modal --}}

<x-dialog-modal wire:model="openModal">
    <x-slot name="title">
        {{$titleModal}}
    </x-slot>
    <x-slot name="content">
        <div wire:loading wire:target="images" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Imagen Cargando!</strong>
            <span class="block sm:inline">Espere un momento hasta que la imagen se procece.</span>
          </div>
        <div class="mb-4">
            <x-label value="Nombre de Receta"></x-label>
            <x-input class="w-full" type="text" wire:model.live="name"></x-input>
            <x-input-error for='name'></x-input-error>
        </div>
        @if ($images)
            @if ($btnModal === "Actualizar" )
                <img class="mb-4 " src="{{asset('storage/' . $images)}}" alt="imagen receta" width="100px">
            @endif
            @if ($images && is_object($images))
                <img class="mb-4 " src="{{$images->temporaryUrl()}}" alt="" width="100px"> 
            @endif
        @endif
        <div class="mb-4">
            <x-label value="Imagen de la Receta"></x-label>
            <input type="file" wire:model="images" id="{{$identificador}}">
            <x-input-error for='images'></x-input-error>
        </div>
        <div class="mb-4">
            <x-label value="Descripción de la Receta"></x-label>
            <textarea name="" class="form-control w-full" id="" rows="2" wire:model.live="description"></textarea>
            <x-input-error for='description'></x-input-error>
        </div>
        <div class="mb-4">
            <x-label value="Ingredientes de la Receta"></x-label>
            <textarea name="" class="form-control w-full" id="" rows="2" wire:model.live="ingredients"></textarea>
            <x-input-error for='ingredients'></x-input-error>
        </div>
        <div class="mb-4">   
            <x-label value="Preparación de la Receta"></x-label>
            <textarea name="" class="form-control w-full" id="" rows="2" wire:model.live="preparation"></textarea>
            <x-input-error for='preparation'></x-input-error>
        </div>

    </x-slot>
    <x-slot name="footer">
        <x-secondary-button  wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
        <x-danger-button class="disabled:opacity-25" wire:loading.attr="disabled" wire:click="save"  wire:target="save,images">{{$btnModal}}</x-danger-button>


    </x-slot>
</x-dialog-modal>
</div>
