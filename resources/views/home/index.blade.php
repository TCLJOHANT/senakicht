<x-app-layout title="Senakicth">
    <section class="home" id="home">
        <link rel="stylesheet" href="{{ asset ('css/home/index/home.css') }}">
    
        <div class="content">
            <h3>conoce acerca  </h3>
            <h3>de nosotros</h3>
            <p>averigua todos los productos y recetas</p>
            <p>que el sena tiene para ofrecerte.</p>
            <a href="#" class="btn">adquierelo ya!</a>
        </div>
    
    </section>
    
    <section class="about" id="about">
    
        <h1 class="heading"> <span>acerca</span> de </h1>
    
        <div class="row">
    
            <div class="image">
                <img src="images/academia.jpg" alt="">
            </div>
    
            <div class="content">
                <h3>que hace que senakitch sea especial?</h3>
                <p>debes saber que ademas de mostrar gran variedades de productos el sena cuenta con grandiosos  aprendices de desarrollo y cocina que hace posible que disfrutes de nuestra web</p>
                <p>lo que nos hace especial es que trabajando en equipo podemos llegar a lograr grandes cosas y romper barreras</p>
                <a href="<?php echo e(route('nosotros')); ?>" class="btn">Aprende más</a>
            </div>
    
        </div>
    
    </section>
    
    <section class="menu" id="menu">
    
        <h1 class="heading"> nuestro <span>menu</span> </h1>
    
        <div class="box-container">
            @foreach ($menus as $menu)
                <div class="box">
                     {{-- si no tien / usa images si no storage --}}
                     @if (strpos($menu->image_path, '/') === false)
                        <img src="/images/{{ $menu->image_path }}" alt="{{ $menu->image_path }}">
                    @else
                        <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}">
                    @endif
                    <h3>{{$menu->name}}</h3>
                    <div class="price">{{$menu->price}}<span>{{$menu->price}}</span></div>
                    <a href="#" class="btn">añadir al carrito</a>
                </div>
            @endforeach
        </div>
    
    </section>
    
    
    <section class="products" id="products">
    
        <h1 class="heading"> nuestros  <span>productos</span> </h1>
        <div class="box-container">
            @foreach ($products as $product)
                <div class="box">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye" ></a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="">
                    </div>
                    <div class="content">
                        <h3>{{$product->name}}</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="price">{{ $product->price }}<span>{{ $product->price }}</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    
    </section>
    
    
    {{-- seccion de comentarios --}}
    <section class="review" id="review">
        <h1 class="heading"> su <span>opinion</span> </h1>
        <div class="box-container">
    
            @foreach ($comments as $comment)
                <div class="box">
                    <img src="images/quote-img.png" alt="" class="quote">
                    <p>{{ $comment->description }}</p>
                    <img src="{{ $comment->user->profile_photo_url}}" class="user" alt="">
                    <h3>{{ $comment->user->name }}</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    
    
    <section class="contact" id="contact">
    
        <h1 class="heading"> <span>tu</span> contacto </h1>
    
        <div class="row">
    
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63778.38370428024!2d-76.6349534824848!3d2.4574702446796857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e300311c028d47d%3A0x880bd67f0987a54e!2zUG9wYXnDoW4sIENhdWNh!5e0!3m2!1ses-419!2sco!4v1668640132821!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
            <form action="">
                <h3>contactanos</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="nombre">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="email">
                </div>
                <div class="inputBox">
                    <span class="fas fa-phone"></span>
                    <input type="number" placeholder="numero">
                </div>
                <input type="submit" value="contacta ahora" class="btn">
            </form>
    
        </div>
    
    </section>
    
    
        {{-- seccion de recetas --}}
    <section class="blogs" id="blogs">
        <h1 class="heading"> nuestras <span>recetas </span> </h1>
        <div class="box-container">
            @foreach ($recipes as $recipe)
            <div class="box">
                <div class="image">
                    <img src="{{ asset('storage/' . $recipe->images) }}" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">{{$recipe->name}}</a>
                    <span>by  Daniel García / 21 mayo, 2022</span>
                    <p>{{$recipe->description }}</p>
                    <a href="{{route ('verRecetas',$recipe) }}" class="btn">leer mas</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
