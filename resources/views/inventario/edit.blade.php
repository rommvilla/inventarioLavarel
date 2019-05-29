@extends('layouts.app')
@section('content')
<div class="content">
<form action="{{'/inventario/'.$produc->id}}" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}
{{method_field('PATCH')}}
@include('inventario.form',['modo'=>'editar'])







</form>
</div>
@endsection