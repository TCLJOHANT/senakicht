<x-admin.admin-modal
 id="myModal" title="Gestion de Usuario" 
 :nameInputs="['name', 'profile_photo_path,', 'email','password']"
 modelName="users">

</x-admin.admin-modal>

<x-layouts.admin >
    <x-slot name="title">Lista de usuarios</x-slot>
      <x-admin.admin-table :items="$users"  :columns="['name', 'profile_photo_url', 'email']" modelName="users"/>
    {{-- <x-admin.table/> --}}
    {{-- <x-admin.table   :columns="[  'email','profile_photo_url','name']" :items="$users" /> --}}
</x-layouts.admin>
