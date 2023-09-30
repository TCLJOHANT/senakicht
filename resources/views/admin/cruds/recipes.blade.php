<x-layouts.admin >
    <x-slot name="title">Lista de Recetas</x-slot>

      <x-admin.admin-table :items="$recipes"  :columns="['name', 'ingredients', 'description']" modelName="recipes"/>
</x-layouts.admin>
