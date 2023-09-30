

<x-admin.admin-modal id="myModal" title="Título del Modal">
    <!-- Contenido del modal para CRUD -->
    <h2>Título del Modal</h2>
    <p>Este es el contenido del modal para tu CRUD.</p>

    <!-- Puedes agregar botones, formularios u otros elementos aquí -->
</x-admin.admin-modal>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Agregar</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            @foreach ($columns as $column)
                                <td>
                                    {{-- Verificar si es una URL válida para mostrar una imagen --}}
                                    @if (filter_var($item->$column, FILTER_VALIDATE_URL))
                                        <img src="{{ $item->$column }}" alt="{{ $item->$column }}" class="img-thumbnail" width="50">
                                    @else
                                        {{ $item->$column }}
                                    @endif
                                </td>
                            @endforeach
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-warning btn-sm">Editar</button>
                                <form action="{{route('admin.' . $modelName . '.destroy',$item)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="btn_Eliminar" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


