
<div class="form-group">
	
	<label for="Nombre" class="control-label">{{'Nombre'}} </label>	 

<input class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" type="text" name="Nombre" id="Nombre" 

value="{{isset($produc->Nombre)?$produc->Nombre:old('Nombre')}}">

{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">
<label class="form-label" for="Foto">{{'Foto'}}</label>
@if(isset($produc->Foto))
<br>
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$produc->Foto}}" alt="" width="200">
<br>
@endif
 <input class="form-control {{$errors->has('Foto')?'is-invalid':''}}" type="file" name="Foto" id="Foto" >
{!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
 <br>
</div>


<input class="btn btn-succes" type="submit" value="{{	$modo=='crear' ? 'Agregar':'Modificar' }}">	
<a class="btn btn-primary" href="{{url('inventario')}}">Home	</a>