<div>
    <div class="box">
        <div class="card">
            @foreach($plato->multimedia as $imagenes)
                <img src="{{ asset('storage/' . $imagenes->ruta) }}" alt="">
            @endforeach
            <div class="card-body">
                <a href=""><h6 class="card-title">{{ $plato->name }}</h6></a>
                <p>este es una descripcion para el plato que decida subir el aptrendiz y darle informacion al comprador uo usuario</p>
                <p class="price">$ {{ $plato->price }} COP</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $plato->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $plato->name }}" id="name" name="name">
                    <input type="hidden" value="{{ $plato->price }}" id="price" name="price">
                    <input type="hidden" value="{{ $plato->image_path }}" id="img" name="img">
                    <!-- <input type="hidden" value="{{ $plato->slug }}" id="slug" name="slug"> -->
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <div class="card-footer">
                          <div class="row">
                            <button >
                                agregar al carrito
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
