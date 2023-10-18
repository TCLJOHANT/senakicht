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
                        @foreach ($recipes as $recipe)
                            <tr >
                                <td class="px-6 py-6">{{$recipe->name}}</td>
                                <td class="px-6 py-6">{{$recipe->description}}</td>
                                <td class="px-6 py-6">{{$recipe->ingredients}}</td>
                                <td class="px-6 py-6">{{$recipe->preparation}}</td>
                                <td class="p-0">
                                    <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-green-600 hover:bg-green-500" >  
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
</div>
</div>
