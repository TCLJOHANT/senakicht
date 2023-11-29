<div >
    <link rel="stylesheet" href="{{ asset('css/app/livewire/detalleProduct.css')}}">
    <!-- Card product-->
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
                        <a  wire:click.prevent="openModalDetalle()" href="#" class="fas fa-eye" id="loca"></a>
                    </div>
                </div>
            </div>
        </form>
        <div class="image">
            <img src="{{$ImgCard}}" alt=""> 
        </div>
        <div class="content">
            <h3>{{substr($product->name, 0, 20)}}</h3>
            <p>{{substr($product->description, 0, 100)}}...</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$ {{ $product->price }} <span>cop</span></div>
        </div>
    </div> 



    <!--detalles de producto-->
    <x-modificados-jet.modal wire:model="openModalDetailProduct" maxWidth="full" >
            <div class="contDetalle">
                    <!--imagenes del producto-->
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
                    <!--seccion de detalle texto-->
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
                                <p class="text-green-600 dark:text-green-300 ">{{$product->quantity}} en existencia</p>
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
