<div>
    <div class="box">
        <div class="image">
               <img src="{{$imgRecipeCard}}" alt="">
          </div>
          <div class="content">
            <a href="#" class="title">{{substr($recipe->name, 0, 20)}}</a>
            <span>by Daniel García / 21 mayo, 2022</span>
            <p >{{substr($recipe->description, 0, 100)}}...</p> 
            <a href="{{route ('verRecetas',$recipe) }}" class="btn">leer mas</a>
          </div>
    </div>
</div>
