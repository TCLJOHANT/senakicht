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

 <div class="card">
    <div class="card-header">
        <input class="form-control" type="text" placeholder="Buscar">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="tabla table-hover text-center">
                <thead class="thead-primary">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Gmail</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($users as $user)
                        <tr >
                            <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                            <td class="p-0">
                                <button wire:click="editItemData({{$user}})"  data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success btn-sm">  
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
        </div>

    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>
 </div>
</div>
