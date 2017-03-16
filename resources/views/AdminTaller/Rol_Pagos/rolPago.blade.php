@extends('Layouts.AdminMain')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Rol de Pago</h3>
    </div>
	<div class="title_right">
    	<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        	<div class="input-group">
                <input type="text" class="form-control" id="cedula" placeholder="Número de Cédula...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="btn_buscar_empleado">Buscar</button>
            </span>
        	</div>
    	</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<div class="x_title">
        		<h2>Empleado</h2>
          			<ul class="nav navbar-right panel_toolbox">
            			<li><a class="collapse-link"><i id="icon_up" class="fa fa-chevron-down"></i></a>
            			</li>
          			</ul>
        		<div class="clearfix">  </div>
      		</div><!-- fin del x_titel -->
      	<div class="x_content" id="content" style="display: none;">
      	<div class="row">
      		<div class="col-md-4 col-xs-6">
        		<div class="form-group">
          			<label>Empleado:</label>
          			<label id="empleado_lb">usuario</label>
        		</div>
        		<div class="form-group">
          			<label>Sueldo:</label>
          			<label id="sueldo_lb">sueldo</label>
        		</div>
      		</div>
      		<div class="col-md-4 col-xs-6">
        		<div class="form-group">
          			<label>Cargo:</label>
          			<label id="cargo_lb">Cargo</label>
        		</div>
      		</div>
      		<div class="col-md-2 col-xs-12">
        		<div class="form-group" style="border: 3px solid #3e41a0;">
          			<img id='foto_empleado' src="" alt="" style=" width: 90px; margin-left: 20%;">
        		</div>
        		
      		</div>
      	</div>
      	</div><!-- fin del x_content -->
    	</div>
  	</div> 
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		
      		<div class="x_content">
        {!!Form::open(['id'=>'FormRol'])!!}
        <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
        <input  type="hidden" name="cedula2" id="cedula2"> 
        <input  type="hidden" name="sueldo2" id="sueldo2"> 
        <input  type="hidden" name="sueldo3" id="sueldo3"> 


      	<div class="row">
      		<div class="col-md-4 col-xs-12">
        		<div class="form-group">
          			<label>Mes:</label>
          			<select id="meses" name="meses"class="form-control" required>
              			<option value="">Mes..</option>
			             <option value="Enero">Enero</option>
			             <option value="Febrero">Febrero</option>
			             <option value="Marzo">Marzo</option>
			             <option value="Abril">Abril</option>
			             <option value="Mayo">Mayo</option>
			             <option value="Junio">Junio</option>
			             <option value="Julio">Julio</option>
			             <option value="Agosto">Agosto</option>
			             <option value="Septiembre">Septiembre</option>
			             <option value="Octubre">Octubre</option>
			             <option value="Noviembre">Noviembre</option>
			             <option value="Diciembre">Diciembre</option>
            		</select>
        		</div>
        		<div class="form-group">
          			<label>Hora Extras:</label>
          			<input type="text" name="horaEx" class="form-control" value="0" placeholder="Horas Extras">
        		</div>
        		<div class="form-group">
          			<label>Comisiones:</label>
          			<input type="text" name="comisiones" class="form-control" value="0" placeholder="Comisiones">
        		</div>
      		</div>
      		<div class="col-md-4 col-xs-12">
      			<div class="form-group">
          			<label>Aportaciones:</label>
          			<input type="text" name="aportaciones" id="aportaciones" value="9.45" class="form-control" placeholder="Aportaciones">
        		</div>
        		<div class="form-group">
          			<label>Total Descuento:</label>
          			<input type="text" name="Descuento"  id="descuento" class="form-control" placeholder="Descuento">
        		</div>
      		</div>

      		<div class="col-md-4">
      			<div class="form-group">
          			<label>Sueldo Total:</label>
          			<input type="text" name="sueltoT" id="sueltoT" class="form-control" style="height: 100px;font-size: xx-large;text-align: center;background-color: aliceblue;">
        		</div>
      		</div>
      		
      	</div>
		{!!Form::close()!!}
      	</div><!-- fin del x_content -->
    	</div>
  	</div> 
</div>            
<div class="row">
	<div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        	<button type="button" class="btn btn-danger" id="btn_cancelar" disabled="false">Cancelar</button>
            <button type="button" class="btn btn-success" id="btn_guardar" disabled="false">Guarda Pago</button>
        </div>
    </div>
</div>
@endsection


@section('scripts')
	<script type="text/javascript">
	$(document).ready(function(){
		$('#cedula').focus();
	});

	$('#btn_buscar_empleado').click(function(){
		var cedula=$('#cedula').val();
		if(cedula==""){
      swal("El campo cedula esta vacio por favor ingrese una cedulaa")
			}else{
			var ruta="http://localhost:8000/welcomeAdmin/Rol_pago/empleado/"+cedula
		 $.get(ruta,function(res){
		 	if(res.sql_vacio=="vacio"){
        swal("La cedula ingresada no se encuentra registrada");
		 }else{
      		$('#icon_up').removeClass('fa-chevron-down');
      		$('#icon_up').addClass('fa-chevron-up');
      		$('#content').removeAttr("style");

      		$('#empleado_lb').html(res.nombre+' '+res.apellidoPaterno);
      		$('#cargo_lb').html(res.cargo);
      		$('#sueldo_lb').html(res.salario);
      		$('#cedula2').val($("#cedula").val());
          $('#sueldo2').val(res.salario);
      		$('#foto_empleado').attr('src',"http://localhost:8000/"+res.foto);

      		$('#btn_cancelar').removeAttr("disabled");

      		/*Calculo del sueldo */
      		var aportaciones = $("#aportaciones").val()
      		$("#descuento").val(parseFloat(res.salario)*(parseFloat(aportaciones)/100));
      		$('#sueltoT').val("$"+(parseFloat(res.salario)-(parseFloat(res.salario)*(parseFloat(aportaciones)/100))));
      		

          $('#sueldo3').val(parseFloat(res.salario)-(parseFloat(res.salario)*(parseFloat(aportaciones)/100)));
        }
      	});
			
		}
	});

	 /*boton cancelar*/
	 	$('#btn_cancelar').click(function(){
	 		$('#icon_up').removeClass('fa-chevron-up');
      		$('#icon_up').addClass('fa-chevron-down');
      		$('#content').attr("style","display: none");

	 		$('#empleado_lb').html("");
      		$('#cargo_lb').html("");
      		$('#sueldo_lb').html("");

      		$('#btn_cancelar').attr("disabled",'false');
      		$('#foto_empleado').removeAttr('src');


      		$('#cedula').focus();

	 	});

	/*Cambio del combo meses activa el boton guardar*/	 	
	 	$('#meses').change(function(){
	 		$('#btn_guardar').removeAttr("disabled");
	 	});

	 /*boton Guardar*/
	 	$('#btn_guardar').click(function(){
	 		     var Datos=new FormData($("#FormRol")[0]);
            var token=$("#token").val();
            $.ajax({
                url:'{!!URL::route('saveRol')!!}',
             		headers :{'X-CSRF-TOKEN': token},
        				type: 'POST',
                dataType: 'json',
                contentType: false,
                data    : Datos,
                processData: false,
                success:function(data){
                    if(data.registro=='ok'){
                    swal("Pago Registrado Correctamente..!!", "", "success");
                    window.location='http://localhost:8000/welcomeAdmin/Rol_pago';
                  }
               }
            });
	 	});

    $('#aportaciones').blur(function() {
          
          var aportaciones = $("#aportaciones").val()
          $("#descuento").val(parseFloat($('#sueldo2').val())*(parseFloat(aportaciones)/100));
          $('#sueltoT').val("$"+(parseFloat($('#sueldo2').val())-(parseFloat($('#sueldo2').val())*(parseFloat(aportaciones)/100))));

});


	</script>
@endsection