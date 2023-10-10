<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/CSS/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <title>Document</title>
</head>
<body>
<div class="container-title">
            <i class="fas fa-utensils"></i>{{ $recetas->name }}
        </div>
        

		<main>
			<div class="container-img">
            <img src="{{ asset('storage/' . $recetas->images) }}" >
			</div>
			<div class="container-info-product">
				<div class="container-description">
                    <div class="title-description">
                        <h4><i class="fas fa-star"></i> Descripcion</h4>
                    </div>
                    <div class="text-description">
                        <ol>
                            <h4>{{ $recetas->description }}</h4>
                        </ol>
                    </div>
                </div>

				<div class="container-description">
                    <div class="title-description">
                        <h4><i class="fas fa-utensils"></i> Lista de ingredientes</h4>
                    </div>
                    <div class="text-description">
                        <ul>
                            <li>{{ $recetas->ingredients }}</li>
                            <li>Ingrediente 2</li>
                            <li>Ingrediente 3</li>
                            <li>Ingrediente 4</li>
                            <!-- Añade más ingredientes según sea necesario -->
                        </ul>
                    </div>
                </div>
                

				<div class="container-description">
                    <div class="title-description">
                        <h4><i class="fas fa-list-alt"></i> Pasos para preparar</h4>
                    </div>
                    <div class="text-description">
                        <ol>
                            <li><i class="fas fa-hand-sparkles"></i>{{ $recetas->preparation }} </li>
                            <li><i class="fas fa-cut"></i> Cortar los ingredientes en trozos pequeños.</li>
                            <li><i class="fas fa-utensil-spoon"></i> Cocinar a fuego medio durante 20 minutos.</li>
                            <li><i class="fas fa-leaf"></i> Agregar hierbas frescas y mezclar bien.</li>
                        </ol>
                    </div>
                </div>
			</div>
		</main>
        <a href="{{ route('recetas.pdf', ['id' => $recetas->id]) }}" class="btn btn-download">
            <i class="fas fa-download"></i> Descargar PDF
          </a>
          
</body>
</html>