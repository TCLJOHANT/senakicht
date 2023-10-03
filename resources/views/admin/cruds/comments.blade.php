<x-admin.admin-modal
 id="myModal" title="Gestion de Comentarios" 
 :nameInputs="['Comentario']"
 modelName="recipes">

</x-admin.admin-modal>

<x-layouts.admin >
    <x-slot name="title">Lista de Comentarios</x-slot>
    
      <x-admin.admin-table :items="$comments"  :columns="['description', 'user_id']" modelName="comments"/>
</x-layouts.admin>
