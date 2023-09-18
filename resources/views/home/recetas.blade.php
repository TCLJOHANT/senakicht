<x-app-layout title="Recetas">
    <x-slot name="title">Comentarios</x-slot>

   {{-- <link rel="stylesheet" href="{{ asset('css/style.css')}}">  --}}
   <link rel="stylesheet" href="{{ asset('css/home/recetas/recetas.css')}}">

     
  <section class="section-recetas">
   <h1 class="heading"> nuestras <span>recetas </span> </h1>
    <div class="card-container" >
     
      <div class="recetas">
              <div class="receta animacion" >
                  <p class="receta-tiempo">8 min</p>
                  <div class="receta-top">
                      <video muted="">
                          <source src="{{asset('img/Lasaña.mp4')}}" type="video/mp4">
                      </video>
                      <div class="author-img__envoltura receta-autor-img">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                          <path d="M20 6L9 17l-5-5" />
                          </svg>
                          <img class="author-img" src="https://images.pexels.com/photos/1680172/pexels-photo-1680172.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                      </div>
                  </div>
                  <div class="receta-buttom">
                      <p class="receta-autor offline">Andy William</p>
                      <p class="receta-nombre">Básico cómo hacer una lazaña</p>
                      <p class="receta-vistas">54K views<span class="seperate video-seperate"></span>1 week ago</p>
                  </div>
              </div>
              <div class="receta animacion" style="--delay: .5s">
                  <div class="receta-tiempo">5 min</div>
                  <div class="receta-top">
                     
                          <img class="imagen-receta" src="https://cdn.pixabay.com/photo/2020/02/02/15/07/meat-4813261_960_720.jpg" alt="">
                     
                      <div class="author-img__envoltura receta-autor-img">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                          <path d="M20 6L9 17l-5-5" />
                          </svg>
                          <img class="author-img" src="https://images.pexels.com/photos/3370021/pexels-photo-3370021.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                      </div>
                  </div>
                  <div class="receta-buttom">
                      <p class="receta-autor offline">Gerard Bind</p>
                      <p class="receta-nombre">Carne de res a la plancha</p>
                      <p class="receta-vista">42K views<span class="seperate video-seperate"></span>1 week ago</p>
                  </div>
              </div>
              <div class="receta animacion" style="--delay: .6s">
                  <div class="receta-tiempo">7 min</div>
                  <div class="receta-top">
                     <img src="https://cdn.pixabay.com/photo/2017/10/13/19/00/potato-casserole-2848605_960_720.jpg" alt="" class="imagen-receta">
                      <div class="author-img__envoltura receta-autor-img">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                          <path d="M20 6L9 17l-5-5" />
                          </svg>
                          <img class="author-img" src="https://images.pexels.com/photos/1870163/pexels-photo-1870163.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                      </div>
                  </div>
                  <div class="receta-buttom">
                      <p class="receta-autor offline">John Wise</p>
                      <p class="receta-nombre">lazaña </p>
                      <p class="receta-vista">64K views<span class="seperate video-seperate"></span>1 week ago</p>
                  </div>
              </div>
              <div class="receta animacion" style="--delay: .7s">
                  <div class="receta-tiempo">6 min</div>
                  <div class="receta-top">
                      <img src="https://cdn.pixabay.com/photo/2012/02/29/12/14/fried-18967_960_720.jpg" alt="" class="imagen-receta">
                      <div class="author-img__envoltura receta-autor-img">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                          <path d="M20 6L9 17l-5-5" />
                          </svg>
                          <img class="author-img" src="https://images.pexels.com/photos/2889942/pexels-photo-2889942.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                      </div>
                  </div>
                  <div class="receta-buttom">
                      <p class="receta-autor offline">Budi Hakim</p>
                      <p class="receta-nombre">huevo frito</p>
                      <p class="receta-vista">50K views<span class="seperate video-seperate"></span>1 week ago</p>
                  </div>
              </div>
              <div class="receta animacion" style="--delay: .8s">
                  <div class="receta-tiempo">6 min</div>
                  <div class="receta-top">
                      <img src="https://cdn.pixabay.com/photo/2012/02/29/12/14/fried-18967_960_720.jpg" alt="" class="imagen-receta">
                      <div class="author-img__envoltura receta-autor-img">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                          <path d="M20 6L9 17l-5-5" />
                          </svg>
                          <img class="author-img" src="https://images.pexels.com/photos/2889942/pexels-photo-2889942.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                      </div>
                  </div>
                  <div class="receta-buttom">
                      <p class="receta-autor offline">Budi Hakim</p>
                      <p class="receta-nombre">huevo frito</p>
                      <p class="receta-vista">50K views<span class="seperate video-seperate"></span>1 week ago</p>
                  </div>
              </div>                  
      </div>
    </div>
    
  </section>


  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/jm.js') }}"></script>
</x-app-layout>