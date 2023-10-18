<div>
    {{-- {{print_r($users)}} --}}
    {{-- @livewire('crud', ['fields' => [
    ["name" => "name", "type" => "text"],
    ["name" => "profile_photo_path", "type" => "file"],
    ["name" => "email", "type" => "email"],
    ["name" => "password", "type" => "password"],
], 
 'items' => $users,
 'titleModal' => "Gestión de Usuario",
 'modelName' => "users"]
 )  --}}
 @vite(['resources/css/app.css', 'resources/js/app.js'])
 @livewireStyles
 <div class="card">
    <div class="px-6 py-4 flex items-center">
        <x-input type="text" class="flex-1 mr-4" wire:model.live="search" placeholder="Buscar"/>
        @livewire('admin.create-comment')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($comments->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" wire:click="order('description')" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th colspan="2"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($comments as $comment)
                            <tr >
                            <td class="px-6 py-6">{{$comment->description}}</td>
                                <td class="p-0">
                                    <button wire:click="editItemData({{$comment}})"  data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success btn-sm">  
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> 
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
                No Existe el  Comentario
            </div>
            @endif
        </div>

    </div>
    <div class="card-footer">
        {{-- {{$users->links()}} --}}
    </div>
 </div>
</div>
<script>
    livewire.on('alert',function(){
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'gh',
        showConfirmButton: false,
        timer: 1500
        })
    })
</script>