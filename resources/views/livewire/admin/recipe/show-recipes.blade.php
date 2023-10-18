<div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
 @livewireStyles
 <div class="card">
    <div class="px-6 py-4 flex items-center">
        <x-input type="text" class="flex-1 mr-4" wire:model.live="search" placeholder="Buscar"/>
        @livewire('admin.recipe.create-recipe')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($recipes->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ingredientes</th>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Preparacion</th>
                            <th colspan="2"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($recipes as $item)
                            <tr >
                                <td class="px-6 py-6">{{$item->name}}</td>
                                <td class="px-6 py-6">{{$item->description}}</td>
                                <td class="px-6 py-6">{{$item->ingredients}}</td>
                                <td class="px-6 py-6">{{$item->preparation}}</td>
                                <td class="p-0">
                                    <a wire:click="edit({{$item}})" class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-red-600 hover:bg-red-500" >  
                                        <i class="fas fa-edit"></i>
                                    </a> 
                                    <form action="" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="px-6 py-4">
                No Existe la Receta
            </div>
            @endif
        </div>

    </div>
    <div class="card-footer">
        {{-- {{$users->links()}} --}}
    </div>
 </div>








    <x-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Crear un nueva Receta
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="images" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se procece.</span>
            </div>
            <div class="mb-4">
                <x-label value="Nombre de Receta"></x-label>
                <x-input type="text" wire:model="recipe.name"></x-input>
                <x-input-error for='name'></x-input-error>
            </div>
            @if ($images)
                <img class="mb-4 " src="{{$images->temporaryUrl()}}" alt="" width="100px">
            @endif
            <div class="mb-4">
                <x-label value="Imagen de la Receta"></x-label>
                <input type="file" wire:model="images" id="{{$identificador}}">
                <x-input-error for='images'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Descripción de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model="description"></textarea>
                <x-input-error for='description'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Ingredientes de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model="ingredients"></textarea>
                <x-input-error for='ingredients'></x-input-error>
            </div>
            <div class="mb-4">   
                <x-label value="Preparación de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model="preparation"></textarea>
                <x-input-error for='preparation'></x-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('open_edit', false)">Cancelar</x-secondary-button>
            <x-danger-button class="disabled:opacity-25" wire:loading.attr="disabled" wire:click="save"  wire:target="save,images">Crear Receta</x-danger-button>


        </x-slot>
    </x-dialog-modal>
</div>
