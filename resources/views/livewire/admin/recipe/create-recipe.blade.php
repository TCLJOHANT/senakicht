<div>
    <x-danger-button wire:click="$set('open', true)">Crear Receta</x-danger-button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear un nueva Receta
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="images" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se procece.</span>
              </div>
            <div class="mb-4">
                <x-label value="Nombre de Receta"></x-label>
                <x-input type="text" wire:model.live="name"></x-input>
                <x-input-error for='name'></x-input-error>
            </div>
            @if ($images)
                <img class="mb-4 " src="{{$images->temporaryUrl()}}" alt="" width="100px">
            @endif
            <div class="mb-4">
                <x-label value="Imagen de la Receta"></x-label>
                <input type="file" wire:model="images" id="{{$identificador}}">
                <x-input-error for='images'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Descripción de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model.live="description"></textarea>
                <x-input-error for='description'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Ingredientes de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model.live="ingredients"></textarea>
                <x-input-error for='ingredients'></x-input-error>
            </div>
            <div class="mb-4">   
                <x-label value="Preparación de la Receta"></x-label>
                <textarea name="" class="form-control w-full" id="" rows="6" wire:model.live="preparation"></textarea>
                <x-input-error for='preparation'></x-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('open', false)">Cancelar</x-secondary-button>
            <x-danger-button class="disabled:opacity-25" wire:loading.attr="disabled" wire:click="save"  wire:target="save,images">Crear Receta</x-danger-button>


        </x-slot>
    </x-dialog-modal>
</div>
