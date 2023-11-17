<x-app-layout>
    <x-slot name="title">Productos</x-slot>
    <link rel="stylesheet" href="{{ asset('css/shared/productos.css')}}">
    <section class="products" id="products">

        <h1 class="heading"> nuestros <span>productos</span> </h1>
        <div class="box-container">

            @foreach($productos as $row)
            <div class="box">
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $row->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $row->name }}" id="name" name="name">
                    <input type="hidden" value="{{ $row->price }}" id="price" name="price">
                    <input type="hidden" value="{{ $row->image }}" id="img" name="img">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <div class="card-footer">
                        <div class="row">
                            <div class="icons">
                                <button type="submit" class="fas fa-shopping-cart"></button>
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-eye modal-popup"></a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="image">
                    @foreach($row->multimedia as $imagenes)
                        <img src="{{ asset('storage/' . $imagenes->ruta) }}" alt="">
                     @endforeach
                </div>
                <div class="content">
                    <h3>{{substr($row->name, 0, 20)}}</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    {{-- detalle --}}
                    <div class="modal-frame">
                        <div class="modal-body">
                            <div class="modal-inner">
                                <button id="close" class="close"><i class="fas fa-times"></i></button>
                                <img src="{{ asset('storage/' . $row->image) }}" alt="Image">
                                <p>{{ $row->description}}</p>
                            </div>
                        </div>
                        <div class="modal-overlay"></div>
                    </div> 
                    <div class="price">{{ $row->price }} <span>{{ $row->price }}</span></div>
                </div>
            </div>
            @endforeach
        </div>


    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/modalDetalle.js') }}"></script>

</x-app-layout>