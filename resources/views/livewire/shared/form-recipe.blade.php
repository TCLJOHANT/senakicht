<div>
    <x-danger-button wire:click="$set('openModal', true)">Crear</x-danger-button>
    
    
    <x-modificados-jet.modal wire:model="openModal" maxWidth="full" >
        
        {{json_encode($cont)}}
   </x-modificados-jet.modal>
    {{-- <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            {{$titleModal}}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                @if ($images)
                    @if ($btnModal === "Actualizar" )
                    <img class="mb-4 img-thumbnail imagen mx-auto" src="{{asset('storage/' . $images)}}" alt="imagen receta" width="100px">
                    @endif
                    @if ($images && is_object($images))
                    <img class="mb-4 img-thumbnail imagen mx-auto" src="{{$images->temporaryUrl()}}" alt="" width="100px"> 
                    @endif
                @endif
                <x-label value="Imagen de la Receta"></x-label>
                <input type="file" wire:model="images" id="{{$identificador}}">
                <x-input-error for='images'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Nombre de Receta"></x-label>
                <x-input class="w-full" type="text"
                wire:model="name"></x-input>
                <x-input-error for='name'></x-input-error>
            </div>
        
            <div class="mb-4">
                <x-label value="Descripción de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="description"></textarea>
                <x-input-error for='description'></x-input-error>
            </div>
            <div class="mb-4">
                <x-label value="Ingredientes de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="ingredients"></textarea>
                <x-input-error for='ingredients'></x-input-error>
            </div>
            <div class="mb-4">   
                <x-label value="Preparación de la Receta"></x-label>
                <textarea name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="" rows="2" wire:model="preparation"></textarea>
                <x-input-error for='preparation'></x-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button  wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            <x-danger-button onclick="alert('success')" class="disabled:opacity-25" wire:loading.attr="disabled" wire:click="createOrUpdate  "  wire:target="createOrUpdate,images">{{$btnModal}}</x-danger-button>
        </x-slot>
    </x-dialog-modal> --}}
</div>
