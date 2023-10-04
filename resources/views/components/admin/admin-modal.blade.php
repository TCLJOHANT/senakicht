<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                @if(Auth::check())
                <form action="{{route('admin.' . $modelName . '.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach($nameInputs as $Input)
                    <label for="">{{$Input}}</label>
                    <div class="form-group">
                        {{-- valida que input pintar
                            si hay . es textarea y si hay , es file --}}
                        @if (str_contains($Input, '.'))
                            <?php $Input = str_replace('.', '', $Input); ?>
                            <textarea  class="form-control"  placeholder="{{$Input}}" name="{{$Input}}"></textarea>
                            @error($Input)
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        @elseif (str_contains($Input, ','))
                            <?php $Input = str_replace(',', '', $Input); ?>
                            <input  class="form-control" name="{{$Input}}"  type="file" accept="image/*">
                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        @elseif ($Input === 'password' || $Input === 'contraseña')
                            <input class="form-control" name="{{$Input}}" type="password" placeholder="{{$Input}}">
                            @error($Input)
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        @else
                            <input  class="form-control" name="{{$Input}}" type="text" placeholder="{{$Input}}">
                            @error($Input)
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        @endif
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