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
    
            <div class="box">
                <img src="images/sirloin.png" alt="">
                <h3>sirloin con salsa de chiplote</h3>
                <div class="price">$14,900 <span>21,000</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
            <div class="box">
                <img src="images/tomate..png" alt="">
                <h3>tomate acordeon</h3>
                <div class="price">$16,300 <span>17,300</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
            <div class="box">
                <img src="images/menu-3.png" alt="">
                <h3>cafe soluble de colombia</h3>
                <div class="price">$8,000 <span>13,900</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
            <div class="box">
                <img src="images/rollo.png" alt="">
                <h3>rollo de carne relleno de jamon y queso</h3>
                <div class="price">$18,000 <span>20,900</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
            <div class="box">
                <img src="images/pastel.png" alt="">
                <h3>Pastel con buttercream de chocolate</h3>
                <div class="price">$32,000 <span>46,100</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
            <div class="box">
                <img src="images/picada.png" alt="">
                <h3>picada de colombia</h3>
                <div class="price">$15,900 <span>21,000</span></div>
                <a href="#" class="btn">añadir al carrito</a>
            </div>
    
        </div>
    
    </section>
    
    
    <section class="products" id="products">
    
        <h1 class="heading"> nuestros  <span>productos</span> </h1>
    
        <div class="box-container">
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/cafe.png" alt="">
                </div>
                <div class="content">
                    <h3>cafe aguila roja</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">$16,590 <span>$20,900</span></div>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/harina.png" alt="">
                </div>
                <div class="content">
                    <h3>harina doña arepa</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">$3,390 <span>$3,890</span></div>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/milo.png" alt="">
                </div>
                <div class="content">
                    <h3>cereal milo 330gm</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">$7,496 <span>$9,190</span></div>
                </div>
            </div>
    
        </div>
    
    </section>
    
    
    
    <section class="review" id="review">
    
        <h1 class="heading"> su <span>opinion</span> </h1>
    
        <div class="box-container">
    
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>Que meloooo, ojala pudieran haber mas paginas asi tan buenas, ojala las demas paginas puedan tomar ejemplo de paginas asi como estas.</p>
                <img src="images/anuel.jpg" class="user" alt="">
                <h3>la dobleAA</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
    
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>que buena web, puedo encontrar todo lo que busco tanto en recetas como en productos pero creo que le falta algo, aun pueden mejorar sigan asi que bendicion.</p>
                <img src="images/descarga.jpg" class="user" alt="">
                <h3>juan cruz</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>esta muy buena la pagina trae muy buenas cosas pero le faltan algunos cambios y optimizarla pero de resto todo bello todo bonito.</p>
                <img src="images/fuicioso.jpg" class="user" alt="">
                <h3>fabian alberto</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
    
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
    
    
    
    <section class="blogs" id="blogs">
    
        <h1 class="heading"> nuestras <span>recetas </span> </h1>
    
    
        <div class="box-container">
    
            <div class="box">
                <div class="image">
                    <img src="images/blog-1.jpeg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">cafe delicioso y refrescante</a>
                    <span>by  Daniel García / 21 mayo, 2022</span>
                    <p>Nada más delicioso que disfrutar de una deliciosa tacita de café a cualquier hora, puedes estar en la oficina o en la casa.</p>
                    <a href="#" class="btn">leer mas</a>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/empandas.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">empanadas de queso</a>
                    <span>by Ferran Adriá Acosta / 09 agosto, 2022</span>
                    <p>Un clásico de la cocina tradicional colombiana, empanadas de queso. Es una receta super fácil, rápida y quedan increíbles y muy jugosas!.</p>
                    <a href="#" class="btn">leer mas</a>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/raspao.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">cholado del valle del cauca</a>
                    <span>by Joan Roca / 13 septiembre, 2022</span>
                    <p>El Cholado es un cruce entre un postre helado, cóctel de frutas, y una bebida, y es popular en la región de El Valle de Colombia. </p>
                    <a href="#" class="btn">leer mas</a>
                </div>
            </div>
    
        </div>
    
    </section>
</x-app-layout>
