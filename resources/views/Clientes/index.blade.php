@extends('layouts.app')

@section('content')
<div class="container-fluid">


  @if(Session::has('mensaje'))
  <div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje')}}
 <button type="button" class="close" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times</span>
</button>
</div>
@endif



<table class="table">
  <thead class="thead-dark">
    <tr>

    <h1 class="text-center">Gestion de Nuestros Clientes</h1>
    <a href="{{ url('clientes/create')}}" class="btn btn-dark" >  Registrar Nuevo Cliente</a>
    <br>
    <br>
        <hr> 
      
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Localidad</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Trabajo</th>
            <th scope="col">Telefono</th>
            
            
            <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($clientes as $cliente) 
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>
            <img class="img-fluid img-thumbnail" src="{{ asset('storage'. '/' . $cliente->Foto )}}" width="100" height="100" alt="">  
            </td>
            <td>{{ $cliente->Nombre }}</td>
            <td>{{ $cliente->Apellido }}</td>
            <td>{{ $cliente->Localidad}}</td>
            <td>{{ $cliente->Fecha_de_Nacimiento }}</td>
            <td>{{ $cliente->Trabajo }}</td>
            <td>{{ $cliente->Telefono }}</td>
            <td>
              
            <a href="{{ url('/clientes/'. $cliente->id.'/edit ')}}"class="btn btn-warning"> Editar</a>

             |
             
            <form action="{{ url('/clientes/'. $cliente->id)}}" class="d-inline"  method="post">
            @csrf
            {{ method_field('DELETE')}}
            
            <input type="submit" class="btn btn-danger "onclick="return confirm('¿Seguro que quieres borrar un cliente?')" value="Borrar">
          
          </form>

            </td>
      
        </tr>
        @endforeach
    </tr>
  </tbody>
</table>
{!! $clientes->links()!!}
</div>
@endsection


