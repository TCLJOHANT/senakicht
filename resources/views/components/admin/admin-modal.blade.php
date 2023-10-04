<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModal Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                @if(Auth::check())
                <form action="{{route('admin.' . $modelName . '.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach($fields as $field)
                    <label for="{{$field['name']}}">{{$field['name']}}</label>
                    <div class="form-group">
                        @switch($field['type'])
                            @case('textarea')
                                <textarea rows="2" cols="50" class="form-control" placeholder="{{$field['name']}}" name="{{$field['name']}}">{{ old($field['name']) }}</textarea>
                                @break
                            @case('file')
                                <input class="form-control" name="{{$field['name']}}" type="file" accept="image/*" value="{{ old($field['name']) }}">
                                @break
                            @case('password')
                                <input class="form-control" name="{{$field['name']}}" type="password" placeholder="{{$field['name']}}" value="{{ old($field['name']) }}">
                                @break
                            @case('email')
                                <input class="form-control" name="{{$field['name']}}" type="email" placeholder="{{$field['name']}}" value="{{ old($field['name']) }}">
                                @break
                            @case('select')
                                {{-- @foreach ($categories as $category)
                                    <option value="{{$category->value}}">{{$category->label}}</option>
                                @endforeach --}}
                                <select class="form-control" name="{{$field['name']}}">
                                    <option value="opcion1">Opción 1</option>
                                    <option value="opcion2">Opción 2</option>
                                </select>
                                @break
                            @case('number')
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                        <input class="form-control" name="{{$field['name']}}" type="number" placeholder="0" min="0" value="{{ old($field['name']) }}">
                                    </div>
                                </div>
                                @break
                            @default
                                <input class="form-control" name="{{$field['name']}}" type="text" placeholder="{{$field['name']}}" value="{{ old($field['name']) }}">
                        @endswitch
                        @error($field['name'])
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @endforeach
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- para data old y dta update --}}
{{--  <input class="form-control" name="{{$field['name']}}" type="text" value="{{ old($field['name'], $userData[$field['name']]) }}"> --}}