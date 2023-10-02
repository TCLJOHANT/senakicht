<x-layouts.admin >
    <x-slot name="title">Lista de Productos</x-slot>

      <x-admin.admin-table :items="$products"  :columns="['name', 'price', 'image']" modelName="products"/>
</x-layouts.admin>
