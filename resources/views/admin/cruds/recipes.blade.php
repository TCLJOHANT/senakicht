<x-admin.admin-modal
 id="myModal" title="Gestion de Receta" 
 :nameInputs="['Nombre', 'Imagen,','category','preparacion.','ingredientes.']"
 modelName="recipes">

</x-admin.admin-modal>



<x-layouts.admin >
    <x-slot name="title">Lista de Recetas</x-slot>
      <x-admin.admin-table :items="$recipes"  :columns="['name', 'ingredients', 'description']" modelName="recipes"/>
</x-layouts.admin>
