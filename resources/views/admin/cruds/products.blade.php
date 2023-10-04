<x-admin.admin-modal
 id="myModal" title="Gestion de Producto" 
 :fields='[
  ["name" => "name", "type" => "text"],
  ["name" => "image", "type" => "file"],
  {{-- ["name" => "category", "type" => "select"], --}}
  ["name" => "description", "type" => "textarea"],
  ["name" => "price", "type" => "number"],
]'
 modelName="products">

</x-admin.admin-modal>

<x-layouts.admin >
    <x-slot name="title">Lista de Productos</x-slot>

      <x-admin.admin-table :items="$products"  :columns="['name', 'price', 'image','description']" modelName="products"/>
</x-layouts.admin>
