@extends('layouts.app')
@section('content')
<div class="content">
@if(Session::has('mensaje'))
<div class="alert alert-succes" role="alert">
	
{{Session::get('mensaje')}}
</div>




@endif


<a href="{{url('inventario/create')}}" class="btn btn-success">Agregar</a><br><br>
<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>No</th>
			<th>Nombre</th>
			<th>Foto</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
		@foreach($productos as $producto)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$producto->Nombre}}</td>
			<td>

			<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->Foto}}" alt="" width="150">
			</td>
			<td>

				<a class="btn btn-warning" href="{{ url('/inventario/'.$producto->id.'/edit') }}">Modificar</a>


				|
			<form style="display: inline;" action="{{'/inventario/'.$producto->id}}" class="" method="POST">
					
			{{csrf_field()}}

			{{method_field('DELETE')}}
			<button class="btn btn-danger"  type="submit" onclick="return confirm('Si elimina este elemnto no podra ser recuperado')">Eliminar</button>
			</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</div>
@endsection