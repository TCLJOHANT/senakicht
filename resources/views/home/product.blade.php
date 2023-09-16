<x-app-layout >
    <x-slot name="title">Productos</x-slot>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <section class="products" id="products">

        <h1 class="heading"> nuestros <span>productos</span> </h1>        
        <div class="box-container">

          @foreach($productos as $row)
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="{{ asset('storage/' . $row->image) }}" alt="">
                </div>
                <div class="content">
                    <h3>{{ $row->name}}</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">{{ $row->price }} <span>{{ $row->price }}</span></div>
                </div>
            </div>
        @endforeach
        </div>

        
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>
