 <div>
    {{-- TABLA--}}
    <link rel="stylesheet" href="{{ asset ('css/shared/codelab_ui/table1.css') }}"> 
    <div class="card">
        <div class="card-header">
            <button  wire:click="editItemData('vaciar')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Agregar</button>
            <button class="btn btn-success">Exportar</button>
            <button class="btn btn-info">Importar</button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="tabla table-hover text-center">
                    <thead class="thead-primary">
                        <tr>
                            @foreach ($fields as $field)
                                <th>{{$field['name']}}</th>
                            @endforeach
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($items as $loopItem)
                            <tr >
                                @foreach ($fields as $field)
                                <td class="p-0">
                                    @if ($field['type'] === "file")
                                    @if(strpos($loopItem[$field['name']], 'http') === 0)
                                        <img src="{{$loopItem[$field['name']]}}" alt="{{$loopItem[$field['name']] }}" class="img-thumbnail rounded-circle imagen" width="60">
                                    @elseif (file_exists(public_path('storage/' . $loopItem[$field['name']])))
                                            <img src="{{ asset('storage/' . $loopItem[$field['name']]) }}" alt="{{ $loopItem[$field['name']] }}" class="img-thumbnail rounded-circle imagen" width="60">
                                    @endif 
                                        
                                    @else
                                        {{ $loopItem[$field['name']] }}
                                    @endif
                                </td>
                                @endforeach
                                <td class="p-0">
                                    <button wire:click="editItemData({{$loopItem}})"  data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success btn-sm">  
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> 
                                    <form action="{{route('admin.' . $modelName . '.destroy',$loopItem)}}" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModal Label">{{ $titleModal }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if(Auth::check()) 
                    <form action="{{ $editItem !='vaciar' ? route('admin.' . $modelName . '.update',$editItem['id']) : route('admin.' . $modelName . '.store') }}"  method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        @if ($editItem != 'vaciar')
                            @method('PUT')
                        @endif
                        @foreach($fields as $field)
                        <label for="{{$field['name']}}">{{$field['name']}}</label>
                        <div class="form-group">
                            @switch($field['type'])
                            
                                @case('textarea')
                                    <textarea rows="2" cols="50" class="form-control" placeholder="{{$field['name']}}" name="{{$field['name']}}">{{ $editItem !='vaciar' ? $editItem[$field['name']] : old($field['name'])}}</textarea>
                                    @break
                                @case('file')
                                    @if ($editItem !='vaciar')
                                    <div class="text-center">    
                                        <img src="{{ asset('storage/' . $editItem[$field['name']]) }}" alt="img" class="img-thumbnail imagen mx-auto" width="100">
                                    </div>
                                    @endif
                                    <input class="form-control" name="{{$field['name']}}" type="file" accept="image/*" value="{{ $editItem !='vaciar' ? $editItem[$field['name']] : old($field['name'])}}">
                                    @break
                                @case('password')
                                    <input class="form-control"type="password" >
                                    @break
                                @case('email')
                                    <input class="form-control" name="{{$field['name']}}" type="email" placeholder="{{$field['name']}}" value="{{ $editItem !='vaciar' ? $editItem[$field['name']] : old($field['name'])}}">
                                    @break
                                @case('select')
                                    <select class="form-control" name="{{$field['name']}}">
                                        <option value="opcion1">Opción 1</option>
                                        <option value="opcion2">Opción 2</option>
                                    </select>
                                    @break
                                @case('number')
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">$</span>
                                            <input class="form-control" name="{{$field['name']}}" type="number" placeholder="0" min="0" value="{{ $editItem !='vaciar' ? $editItem[$field['name']] : old($field['name'])}}">
                                        </div>
                                    </div>
                                    @break
                                @default
                            
                                    <input  class="form-control" name="{{$field['name']}}" type="text" placeholder="{{$field['name']}}" value="{{ $editItem !='vaciar' ? $editItem[$field['name']] : old($field['name'])}}" >
                            @endswitch
                            @error($field['name'])
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @endforeach
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">{{ $editItem != 'vaciar' ? 'Actualizar' : 'Crear' }}</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> 