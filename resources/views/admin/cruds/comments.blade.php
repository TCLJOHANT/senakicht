{{-- <x-admin.admin-modal
 id="myModal" title="Gestion de Comentarios" 
 :fields='[
  ["name" => "description", "type" => "textarea"],
]'
 modelName="comments">

</x-admin.admin-modal> --}}

<x-layouts.admin >
    <x-slot name="title">Lista de Comentarios</x-slot>
    @livewire('crud', ['fields' => [
      ["name" => "description", "type" => "textarea"],
  ], 'items' => $comments, 'titleModal' => "Gestión de Comentario", 'modelName' => "comments"])
    
      {{-- <x-admin.admin-table :items="$comments"  :columns="['description', 'user_id']" modelName="comments"/> --}}
</x-layouts.admin>
