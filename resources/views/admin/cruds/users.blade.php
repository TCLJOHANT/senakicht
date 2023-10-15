
<x-layouts.admin >
  <x-slot name="title">Lista de usuarios</x-slot>
  {{-- @livewire('admin.users-index') --}}

  @livewire('crud', ['fields' => [
     ["name" => "profile_photo_path", "type" => "file"],
    ["name" => "name", "type" => "text"],
    ["name" => "email", "type" => "email"],
    // ["name" => "roles", "type" => "text"]
], 
 'items' => $users,
 'titleModal' => "Usuario",
 'modelName' => "users"]
 ) 

</x-layouts.admin>
