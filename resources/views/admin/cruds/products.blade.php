@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de productos</h1>
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
                    <th>Nombre</th>
                    <th>Ingrediente</th>
                    <th>Descripcion</th>
                    <th colspan="2">acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $recipe)
                    <tr>
                        <td>{{$recipe->name}}</td>
                       
                        <td>{{$recipe->price}}</td>
                        <td>{{$recipe->image}}</td>
                        <td width="10px">
                            <a href="{{route('admin.recipes.edit',$recipe)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.recipes.destroy',$recipe)}}" method="post">
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