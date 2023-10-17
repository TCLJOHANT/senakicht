<div>
    <x-danger-button wire:click="$set('open', true)">Crear Usuario</x-danger-button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear un nuevo Comentario
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Comentario"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model="comment"></textarea>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('open', false)">Cancelar</x-secondary-button>
            <x-danger-button>Crear Comentario</x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
