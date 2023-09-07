<x-app-layout title="Opiniones">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <section class="review" id="review">

        <h1 class="heading"> su <span>opinion</span> </h1>

        <button id="modal-btn" class="styled-button">Comentar</button>


        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="titl">Escribir  opinion</h2><br>
                <div class="line"></div>   
                @if(Auth::check())
                <form action="{{route('comentarios.store')}}" method="POST">
                    @csrf
                    <div>
                    <img src="{{ Auth::user()->avatar }}" class="imagh" alt="avatar">
                    <input  value="{{ Auth::user()->username }}" readonly class="plain-input">
                    </div>
                    <div class="line"></div>     
                    <div>
                    <label for="">Deja tu comentario</label><br>
                    <input type="text" name="description">
                    <input type="hidden" name="idUser" value="{{Auth::user()->id}}"> 
                    </div>
                    <br>
                    <button type="submit">Enviar</button>

                </form>
                
                @endif

            </div>
        </div>


        <div class="box-container">
        @forelse($comentarios as $row )
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>{{ $row->description }}</p>
                <img src="{{ $row->user->avatar }}" class="user" alt="">
                <h3>{{ $row->user->username }}</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            @empty
            no hay comentarios
            @endforelse
        </div>
   
   
        <br>
</section>
    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>