@if(count($errors)>0)
 <div class="alert alert-danger" role="alert">
    <ul>
         @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
        @endforeach

    </ul>
</div>
@endif
<h1 class="text-center" style="background-color:indigo -400"> {{$modo}} Cliente </h1>

<div class="form-group col-auto">
<label for="Nombre"> Nombre</label>
<input type="text" class="form-control" value="{{ isset($cliente->Nombre)?$cliente->Nombre:old('Nombre') }}" name="Nombre" id="Nombre">
</div>

<div class="form-group col-auto">
<label for="Apellido"> Apellido</label>
<input type="text" class="form-control" value="{{ isset($cliente->Apellido)?$cliente->Apellido:old('Apellido') }}" name="Apellido" id="Apellido">
</div>

<div class="form-group col-auto">
<label for="Localidad"> Localidad</label>
<input type="text" class="form-control" value="{{ isset($cliente->Localidad)?$cliente->Localidad:old('Localidad') }}" name="Localidad" id="Localidad">
</div>

<div class="form-group col-auto">
<label for="Fecha_de_Nacimiento"> Fecha de Nacimiento</label>
<input type="date" class="form-control" value="{{ isset($cliente->Fecha_de_Nacimiento)?$cliente->Fecha_de_Nacimiento:old('Fecha_de_Nacimiento') }}" name="Fecha_de_Nacimiento" id="Fecha_de_Nacimiento">
</div>

<div class="form-group col-auto">
<label for="Trabajo"> Trabajo</label>
<input type="text" class="form-control" value="{{ isset($cliente->Trabajo)? $cliente->Trabajo:old('Trabajo') }}" name="Trabajo" id="Trabajo">
</div>

<div class="form-group col-auto">
<label for="Telefono"> Telefono</label>
<input type="text" class="form-control" value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono') }}" name="Telefono" id="Telefono">
</div>

<div class="form-group col-auto">
<label for="Foto"> </label>

@if(isset($cliente->Foto))
<img class="img-fluid img-thumbnail" src="{{ asset('storage'. '/' . $cliente->Foto )}}" width="100" height="100" alt="">
@endif
<input class="form-control" type="file" value=""  name="Foto" id="Foto">
</div>

<input class="btn btn-primary" type="submit" value="{{ $modo }} Cliente" >
<a href="{{ url('clientes/')}}"class="btn btn-dark">Regresar</a>
<br>
</div>