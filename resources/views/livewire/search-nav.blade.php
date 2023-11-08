<div>
    <style>
        .cont-results-search{
            position: absolute;
            right: 10%;
            display: flex;
            align-items: center;
            color: aqua;
            width:1500px;
            background-color: red
        }
    </style>
    {{-- <div class="search-form">
        <input wire:model="search" type="search" id="search-box" placeholder="Que estas buscando...">
        <label for="search-box" class="fas fa-search"></label>
    </div> --}}
    <input type="text" class="inline-flex rounded-md" wire:model.live="search" placeholder="buscar">
    <div class="cont-results-search">
        <p>casa</p>
            {{json_encode($items)}}
    </div>
</div>
