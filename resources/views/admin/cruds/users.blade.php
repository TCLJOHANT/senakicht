@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
      <!-- Modal -->
      <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 titleForm" id="staticBackdropLabel">Crear Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="formulario-artista">
                <div class="modal-body">
                            <label for="id"></label>
                            <input type="hidden" id="id" name="id" >
                            <label for="name">Nombre Usuario:</label>
                            <input type="text" id="nombre" name="nombre" required class="form-control" autofocus>
                            <label for="mail">Genero:</label>
                            <input type="text" id="genero" name="genero" required class="form-control" autofocus>
                            <label for="bio">Descripción</label>
                            <textarea name="descripcion" id="descripcion" cols="10" rows="5" required class="form-control" autofocus></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button  id="boton" class="btn btn-primary stringBotonForm" type="button">Crear</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <button  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">Agregar Usuario</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th colspan="2">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <img src="{{$user->profile_photo_url}}" alt="" width="50px">
                            </td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Editar</button>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.users.destroy',$user)}}" method="post">
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
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
