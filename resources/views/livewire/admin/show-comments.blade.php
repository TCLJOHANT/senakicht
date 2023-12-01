<div>
<div class="card">
    <div class="px-6 py-4 flex items-center">
        <div class="flex items-center">
            <span>mostrar</span>
            <select wire:model.live="cantidadRegistros"   class="mx-2  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ">
                <option value="10">5</option>
                <option value="10">10</option>
            </select>
            <span>entradas</span>
        </div>
        <x-input type="text" class="flex-1 mx-4" wire:model.live="search" placeholder="Buscar"/>
        @livewire('shared.form-comment')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($comments->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center">Mensaje</th>
                            <th scope="col"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center">Calificación</th>
                            <th colspan="2"  class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($comments as $comment)
                        <tr >
                            <td class="px-6 py-6">{{$comment->description}}</td>
                           
                            <td class="px-6 py-6 text-center">
                                @for($i=1; $i<=$comment->rating; $i++)
                                    <label for="star{{$i}}" class="star-label"><i class="fas fa-star"></i></label>
                                @endfor 
                            </td> 
                            <td class="px-6 py-6 flex items-center">
                               
                                <button class="ml-2 font-bold text-white p-2 rounded cursor-pointer  bg-blue-500" wire:click="emitComment({{$comment}})" >  
                                    <i class="fas fa-pencil-alt"></i>
                                </button> 
                                <button wire:click="destroyComment({{$comment}})" class="ml-2 font-bold text-white p-2 rounded cursor-pointer bg-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{-- si tiene al menos dos paginas se mostrata si no se oculta --}}
                 @if ($comments->hasPages())
                 <div class="px-6 py-3">
                     {{$comments->links()}}
                 </div>
             @endif
            @else
            <div class="px-6 py-4">
                No Existe el  Comentario
            </div>
            @endif
        </div>
    </div>
 </div>
    <script>
         document.addEventListener('livewire:initialized', () => {
            @this.on('show-toast', (event) => {
                toastr[event.type](event.message);
            });
        });
    </script>
</div> 


