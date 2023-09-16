@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 titleForm" id="staticBackdropLabel">Crear Artista</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="formulario-artista">
                <div class="modal-body">
                            <label for="id"></label>
                            <input type="hidden" id="id" name="id" >
                            <label for="name">Nombre Artista:</label>
                            <input type="text" id="nombre" name="nombre" required class="form-control" autofocus>
                            <label for="mail">Genero:</label>
                            <input type="text" id="genero" name="genero" required class="form-control" autofocus>
                            <label for="bio">Descripción</label>
                            <textarea name="descripcion" id="descripcion" cols="10" rows="5" required class="form-control" autofocus></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button  id="boton" class="btn btn-primary stringBotonForm" onclick="actualizar_Crear()" type="button">Crear</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <button  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar Usuario</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th colspan="2">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <img src="{{$user->profile_photo_url}}" alt="" width="50px">
                            </td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.users.destroy',$user)}}" method="post">
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
@stop
