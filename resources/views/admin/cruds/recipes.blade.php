<x-admin.admin-modal
 id="myModal" title="Gestion de Receta" 
 :fields='[
  ["name" => "name", "type" => "text"],
  ["name" => "images", "type" => "file"],
  ["name" => "category", "type" => "select"],
  ["name" => "description", "type" => "textarea"],
  ["name" => "ingredients", "type" => "textarea"],
  ["name" => "preparation", "type" => "textarea"],
]'
 modelName="recipes">

</x-admin.admin-modal>



<x-layouts.admin >
    <x-slot name="title">Lista de Recetas</x-slot>
      <x-admin.admin-table :items="$recipes"  :columns="['name', 'ingredients', 'description']" modelName="recipes"/>
</x-layouts.admin>
