<x-app-layout>
    <x-slot name="title">Menu</x-slot>
    <link rel="stylesheet" href="{{ asset ('css/menu.css') }}">
    <section class="menu" id="menu">
    <h1 class="heading " > nuestros <span>Platos</span> </h1> 
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="box-container">
                    @foreach($products as $plato)
                        @livewire('app.components.shared.card.card-plato', ['plato' => $plato])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
</x-app-layout>


