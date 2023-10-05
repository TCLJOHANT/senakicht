
<x-layouts.admin >
  <x-admin.admin-modal
   title="Gestion de Usuario" 
   {{-- :nameInputs="['name', 'profile_photo_path,', 'email','password']" --}}
   :fields='[
    ["name" => "name", "type" => "text"],
    ["name" => "profile_photo_path", "type" => "file"],
    ["name" => "email", "type" => "email"],
    ["name" => "password", "type" => "password"],
  ]'
   modelName="users">
  </x-admin.admin-modal>
  
    <x-slot name="title">Lista de usuarios</x-slot>
      
    <x-admin.admin-table :items="$users" 
     :columns="['name', 'profile_photo_url', 'email']"
      modelName="users"
     >
    </x-admin.admin-table>
</x-layouts.admin>
