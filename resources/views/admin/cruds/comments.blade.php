@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Comentarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <button  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar Usuario</button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>usuario_id</th>
                    <th colspan="2">acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->description}}</td>
                        <td>{{$comment->user_id}}</td>
                        <td width="10px">
                            <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Editar</button>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.comments.destroy',$comment)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop