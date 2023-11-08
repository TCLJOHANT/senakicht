<div>
    <div class="search-form">
        <input wire:model.live="search" type="search" id="search-box" placeholder="Que estas buscando...">
        <label for="search-box" class="fas fa-search"></label>
    </div>
    <div class="absolute bg-gray-200 rounded-md shadow-lg z-50 m-5 ">
            {{json_encode($items)}}
    </div>
</div>
