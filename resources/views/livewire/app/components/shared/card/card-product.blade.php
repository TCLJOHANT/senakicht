<div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/app/livewire/detalleProduct.css')}}">
    <div class="box">
        <form action="{{ route('cart.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $product->id }}" id="id" name="id">
            <input type="hidden" value="{{ $product->name }}" id="name" name="name">
            <input type="hidden" value="{{ $product->price }}" id="price" name="price">
            <input type="hidden" value="{{ $product->image }}" id="img" name="img">
            <input type="hidden" value="1" id="quantity" name="quantity">
            <div class="card-footer">
                <div class="row">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <!--evita el comportamiento predeterminado del clic en este caso en un link-->
                        <a  wire:click.prevent="openModalDetalle()" href="#" class="fas fa-eye"></a>
                    </div>
                </div>
            </div>
        </form>
        <div class="image">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach($product->multimedia as $imagenes)
                        <div class="hidden duration-500 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $imagenes->ruta) }}" class="  h-full absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 " alt="..." >
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    @foreach($product->multimedia as $index => $imagen)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="content">
            <h3>{{substr($product->name, 0, 20)}}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            
            <div class="modal-frame">
                <div class="modal-body">
                    <div class="modal-inner">
                        <button id="close" class="close"><i class="fas fa-times"></i></button>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Image">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="modal-overlay"></div>
            </div>  
            <div class="price">{{ $product->price }} <span>{{ $product->price }}</span></div>
        </div>
    </div> 
    <!--detalles de producto-->
    <x-modificados-jet.modal wire:model="openModalDetailProduct" maxWidth="full" >
            <div class="contDetalle">
                    {{-- <div class="imgs">
                        <div class="imgMain">
                            <img src="https://i.postimg.cc/PqYpFTfy/pexels-melvin-buezo-2529148.jpg" alt="" 
                                class="object-cover">  
                        </div>
                        <div class="imgsPrevs">
                            <div class="sticky top-0 z-50 overflow-hidden ">
                                <div class="flex-wrap hidden md:flex ">
                                    <div class="w-1/2 p-2 sm:w-1/4">
                                        <a href="#"
                                            class="block border border-blue-300 dark:border-transparent dark:hover:border-blue-300 hover:border-blue-300">
                                            <img src="https://i.postimg.cc/PqYpFTfy/pexels-melvin-buezo-2529148.jpg" alt=""
                                                class="object-cover w-full lg:h-20">
                                        </a>
                                    </div>
                                    <div class="w-1/2 p-2 sm:w-1/4">
                                        <a href="#"
                                            class="block border border-transparent dark:border-transparent dark:hover:border-blue-300 hover:border-blue-300">
                                            <img src="https://i.postimg.cc/PqYpFTfy/pexels-melvin-buezo-2529148.jpg" alt=""
                                                class="object-cover w-full lg:h-20">
                                        </a>
                                    </div>
                                    <div class="w-1/2 p-2 sm:w-1/4">
                                        <a href="#"
                                            class="block border border-transparent dark:border-transparent dark:hover:border-blue-300 hover:border-blue-300">
                                            <img src="https://i.postimg.cc/PqYpFTfy/pexels-melvin-buezo-2529148.jpg" alt=""
                                                class="object-cover w-full lg:h-20">
                                        </a>
                                    </div>
                                  
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <div class="imgs">
                        <div class="imgMain">
                            <img src="{{ $mainImage }}" alt="" class="object-cover">
                        </div>
                        <div class="imgsPrevs">
                            <div class="sticky top-0 z-50 overflow-hidden">
                                <div class="flex-wrap hidden md:flex">
           
                                    @foreach ($previewImages as $image)
                                        <div class="w-1/2 p-2 sm:w-1/4">
                                            <a href="#" wire:click="changeMainImage('{{ $image }}')"
                                                class="block border border-blue-300 dark:border-transparent dark:hover:border-blue-300 hover:border-blue-300">
                                                <img src="{{asset('storage/' . $image) }}" alt="" class="object-cover w-full lg:h-20">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--seccion de -->
                    <div class="descriptionProduct">
                        <div class="flex">
                            <x-danger-button class="flex ml-auto"  wire:click="$set('openModalDetailProduct', false)">X</x-danger-button>
                        </div>
                        <div class="lg:pl-20">
                            <div class="mb-8 ">
                                <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                                {{$product->name}}
                                </h2>
                                <div class="flex items-center mb-6">
                                    <ul class="flex mr-2">
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="w-4 mr-1 text-red-500 dark:text-gray-400 bi bi-star "
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="w-4 mr-1 text-red-500 dark:text-gray-400 bi bi-star "
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="w-4 mr-1 text-red-500 dark:text-gray-400 bi bi-star "
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="w-4 mr-1 text-red-500 dark:text-gray-400 bi bi-star "
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="text-xs dark:text-gray-400 ">(2 customer reviews)</p>
                                </div>
                                <p class="max-w-md mb-8 text-gray-700 dark:text-gray-400">
                                   {{$product->desription}}
                                </p>
                                <p class="inline-block mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400 ">
                                    <span>${{$product->price}}</span>
                                    <span
                                        class="text-base font-normal text-gray-500 line-through dark:text-gray-400">$1500.99</span>
                                </p>
                                <p class="text-green-600 dark:text-green-300 ">7 en existencia</p>
                            </div>

                            <div class="mb-4">
                                <label for=""
                                class="w-full text-xl font-sm mb-2 text-gray-700 dark:text-gray-400">Descripción</label>
                                <p>{{$product->description}}</p>
                            </div>

                            <div class="w-32 mb-8 ">
                                <label for=""
                                    class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">Quantity</label>
                                <div class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg">
                                    <button
                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                                        <span class="m-auto text-2xl font-thin">-</span>
                                    </button>
                                    <input type="number"
                                        class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black"
                                        placeholder="1">
                                    <button
                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center -mx-4 ">
                                <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                                    <button
                                        class="flex items-center justify-center w-full p-4  rounded-md dark:text-gray-200  bg-green-600 border-blue-600 text-gray-100 ">
                                        Agregar al Carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </x-modificados-jet.modal>
</div>
