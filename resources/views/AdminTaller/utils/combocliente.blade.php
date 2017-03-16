<select class="js-example-basic-single " id="idCliente" name="idCliente"  placeholder="Nombre de Cliente">
	<option> Seleccione Cliente</option>
		@foreach($Clientes as $clie)
			<option value="{{$clie->id}}">{{$clie->nombre}}</option>
		@endforeach
</select >
<script>
	
	$(".js-example-basic-single").select2();
</script>