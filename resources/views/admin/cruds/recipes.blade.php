{{-- <x-admin.admin-modal
 id="myModal" title="Gestion de Receta" 
 :fields='[
  ["name" => "name", "type" => "text"],
  ["name" => "images", "type" => "file"],
  ["name" => "description", "type" => "textarea"],
  ["name" => "ingredients", "type" => "textarea"],
  ["name" => "preparation", "type" => "textarea"],
]'
 modelName="recipes">

</x-admin.admin-modal>
 --}}


<x-layouts.admin >
    <x-slot name="title">Lista de Recetas</x-slot>
    @livewire('crud', ['fields' => [
      ["name" => "name", "type" => "text"],
      ["name" => "images", "type" => "file"],
      ["name" => "ingredients", "type" => "textarea"],
      ["name" => "description", "type" => "textarea"],
      ["name" => "preparation", "type" => "textarea"],
  ], 'items' => $recipes, 'titleModal' => "Gestión de Receta", 'modelName' => "recipes"])
    
      {{-- <x-admin.admin-table :items="$recipes"  :columns="['name', 'images','ingredients', 'description', 'preparation']" modelName="recipes"/> --}}
</x-layouts.admin>
