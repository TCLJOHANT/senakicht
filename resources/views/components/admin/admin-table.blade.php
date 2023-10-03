
<link rel="stylesheet" href="{{ asset ('css/shared/codelab_ui/table1.css') }}"> 
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Agregar</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="tabla table-hover text-center">
                <thead class="thead-primary">
                    <tr>
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($items as $item)
                        <tr >
                            @foreach ($columns as $column)
                                <td class="p-0">
                                    {{-- Verificar si es una URL válida para mostrar una imagen --}}
                                    @if (filter_var($item->$column, FILTER_VALIDATE_URL))
                                        <img src="{{ $item->$column }}" alt="{{ $item->$column }}" class="img-thumbnail rounded-circle" width="50">
                                    @else
                                        {{ $item->$column }}
                                    @endif
                                </td>
                            @endforeach
                            <td class="p-0">
                                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                <form action="{{route('admin.' . $modelName . '.destroy',$item)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            {{-- <td>
                                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-warning btn-sm">Editar</button>
                                <form action="{{route('admin.' . $modelName . '.destroy',$item)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="btn_Eliminar" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


