<x-layouts.admin >
    <x-slot name="title">Lista de usuarios</x-slot>
      <x-admin.admin-table :items="$users"  :columns="['name', 'profile_photo_url', 'email']" modelName="users"/>
    <x-admin.table/>
    </x-layouts.admin>
