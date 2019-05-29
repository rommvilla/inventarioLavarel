@extends('layouts.app')
@section('content')
<div class="container">
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			
			{{$error}}
		</li>
		@endforeach
	</ul>



</div>
@endif
<form class="form-horizontal" action="{{ url('/inventario')}}" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

@include('inventario.form',['modo'=>'crear'])

</form>
</div>
@endsection