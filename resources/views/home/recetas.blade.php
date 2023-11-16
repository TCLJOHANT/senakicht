<x-app-layout >
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="title">Recetas</x-slot>
   <link rel="stylesheet" href="{{ asset('css/home/recetas/recetas.css')}}">
   <section class="blogs" id="blogs">
    <h1 class="heading"> nuestras <span>recetas </span> </h1>
    <div class="box-container">
          
    @foreach($recetas as $receta)
    <div class="box">
      <div class="image">
          @foreach($receta->multimedia as $imagenes)
            <img src="{{ asset('storage/' . $imagenes->ruta) }}" alt="">
          @endforeach
        </div>
        <div class="content">
          <a href="#" class="title">{{substr($receta->name, 0, 20)}}</a>
          <span>by Daniel García / 21 mayo, 2022</span>
           <p >{{substr($receta->description, 0, 100)}}...</p> 
          <a href="{{route ('verRecetas',$receta) }}" class="btn">leer mas</a>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/jm.js') }}"></script>
</x-app-layout>