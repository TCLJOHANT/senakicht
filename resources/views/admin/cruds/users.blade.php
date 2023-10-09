
<x-layouts.admin >
  <x-slot name="title">Lista de usuarios</x-slot>
  {{-- <x-admin.crud
  titleModal="Gestion de Usuario" 
  :fields='[
   ["name"=>"name","type"=>"text"],
   ["name"=>"profile_photo_path","type"=>"file"],
   ["name"=>"email","type"=>"email"],
   ["name"=>"password","type"=>"password"],
 ]'
  modelName="users"
  :items="$users">
  </x-admin.crud> --}}

  {{-- <x-admin.admin-crud
  titleModal="Gestion de Usuario" 
  :fields='[
   ["name" => "name", "type" => "text"],
   ["name" => "profile_photo_path", "type" => "file"],
   ["name" => "email", "type" => "email"],
   ["name" => "password", "type" => "password"],
 ]'
  modelName="users"
  :items="$users">
  </x-admin.admin-crud>  --}}

  {{-- @livewire('crud', ['fields' => [
    ["name" => "name", "type" => "text"],
    ["name" => "profile_photo_path", "type" => "file"],
    ["name" => "email", "type" => "email"],
    ["name" => "password", "type" => "password"],
], 'items' => $users, 'titleModal' => "Gestión de Usuario", 'modelName' => "users"]) --}}
    <x-admin.admin-modal
   title="Gestion de Usuario" 
   :fields='[
    ["name" => "name", "type" => "text"],
    ["name" => "profile_photo_path", "type" => "file"],
    ["name" => "email", "type" => "email"],
    ["name" => "password", "type" => "password"],
  ]'
   modelName="users">
  </x-admin.admin-modal>
  
     
    <x-admin.admin-table :items="$users" 
     :columns="['name', 'profile_photo_url', 'email']"
      modelName="users"
     >
    </x-admin.admin-table> 
</x-layouts.admin>
