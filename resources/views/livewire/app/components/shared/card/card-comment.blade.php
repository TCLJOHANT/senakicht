<div class="box">
        <img src="images/quote-img.png" alt="" class="quote">
        <p>{{ $comment->description }}</p>
        <img src="{{ $comment->user->profile_photo_url}}" class="user-img" alt="">
        <h3>{{ $comment->user->name }}</h3>
        <div class="stars">
        @for($i=1; $i<=$comment->rating; $i++)
        <label for="star{{$i}}" class="star-label"><i class="fas fa-star"></i></label>
        @endfor 

        @if($comment->user_id === auth()->user()->id)
        <!-- Mostrar opciones de edición -->
        <button id="modal-btn" class="styled-button">Comentar</button>
        @endif
        
        </div>
</div>
