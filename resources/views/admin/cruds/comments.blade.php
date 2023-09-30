<x-layouts.admin >
    <x-slot name="title">Lista de Comentarios</x-slot>
    
      <x-admin.admin-table :items="$comments"  :columns="['description', 'user_id']"/>
</x-layouts.admin>
