<x-layouts.admin >
    <x-slot name="title">Lista de Recetas</x-slot>
    @livewire('crud', ['fields' => [
      ["name" => "name", "type" => "text"],
  ], 'items' => $roles, 'titleModal'=>'Rol', 'modelName' => "roles"])
</x-layouts.admin>