<x-app-layout >
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="title">Recetas</x-slot>
   <link rel="stylesheet" href="{{ asset('css/home/recetas/recetas.css')}}">
   <section class="blogs" id="blogs">
    <h1 class="heading"> nuestras <span>recetas </span> </h1>
    <div class="box-container">
        @foreach($recetas as $recipe)
          @livewire('app.components.shared.card.card-recipe', ['recipe' => $recipe])
        @endforeach
    </div> 
  </section>
</x-app-layout>