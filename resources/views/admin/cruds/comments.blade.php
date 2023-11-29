<x-layouts.admin >
    <x-slot name="title">Lista de Comentarios</x-slot>
    {{-- @livewire('crud', ['fields' => [
      ["name" => "description", "type" => "textarea"],
  ], 'items' => $comments, 'titleModal' => "Comentario", 'modelName' => "comments"])
     --}}

    @livewire('admin.show-comment')
      {{-- <x-admin.admin-table :items="$comments"  :columns="['description', 'user_id']" modelName="comments"/> --}}
</x-layouts.admin>