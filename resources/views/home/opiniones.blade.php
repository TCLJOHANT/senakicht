<x-app-layout>
    <x-slot name="title">Comentarios</x-slot>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css')}}"> --}}
     <link rel="stylesheet" href="{{ asset('css/shared/opinion.css')}}"> 
    <section class="review" id="review">

        <h1 class="heading"> su <span>opinion</span> </h1>

        <button id="modal-btn" class="styled-button">Comentar</button>


        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="titl">Escribe su opinion</h2><br>
                <div class="line"></div>   
                @if(Auth::check())
                <form action="{{route('comentarios.store')}}" method="POST">
                    @csrf
                    <div>
                        @if(strpos(Auth::user()->profile_photo_path, 'http') === 0)
                        <img src="{{Auth::user()->profile_photo_path }}" class="imagh" alt="avatar">
                    @else
                        <img src="{{Auth::user()->profile_photo_url }}" class="imagh" alt="avatar">
                    @endif
                        <input  value="{{ Auth::user()->name }}" readonly class="plain-input">
                    </div>
                    <div class="line"></div>     
                    <div>
                    <label for="">Deja tu comentario</label><br>
                    <input type="text" name="description">
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1"></label>
                      </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
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
                <img src="{{ $row->user->profile_photo_url}}" class="user" alt="">
                <h3>{{ $row->user->name }}</h3>
                <div class="stars">
                @for($i=1; $i<=$row->rating; $i++)
                <label for="star{{$i}}" class="star-label"><i class="fas fa-star"></i></label>
                @endfor 
                </div>
            </div>
            @empty
            no hay comentarios
            @endforelse
        </div>
</div>
   
        <br>
</section>
    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>