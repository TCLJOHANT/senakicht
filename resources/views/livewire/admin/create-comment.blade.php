
<div>
    <x-danger-button wire:click="$set('open', true)">Crear Comentario</x-danger-button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear un nuevo Comentario
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Comentario"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model.live="description"></textarea>
                <x-input-error for='description'></x-input-error>
                <x-label value="Ranting"></x-label>
                <x-input type="number" wire:model.live="ranting"></x-input>
                <x-input-error for='ranting'></x-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('open', false)">Cancelar</x-secondary-button>
            <x-danger-button wire:loading.remove wire:click="save()">Crear Comentario</x-danger-button>
            <span wire:loading wire:target="save()">cargando ...</span>
        </x-slot>
    </x-dialog-modal>
</div>
