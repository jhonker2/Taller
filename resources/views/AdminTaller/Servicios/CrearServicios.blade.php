@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Servicios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i></a>
                        
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Administración de Servicios
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>servicios</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                     	@foreach($servicios as $ser) 
    					<tr>
                          <td>{{$ser->id}}</td>
                          <td>{{$ser->servicio 	}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$ser->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarServicios" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarServicios({{$ser->id}})" href="#">Eliminar</a>
                        				</li>
                      				</ul>
                    		</div>	
                    	  </td>
                        </tr> 
    					@endforeach                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevos Servicios</h4>
      </div>
      <div class="modal-body">
        	
         		{!!Form::open(array('url'=>'','class'=>'frmServicios','method'=>'POST'))!!}
        
         		<input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
         		{!!Form::label('Nombre de Servicio:')!!}
				    {!!Form::text('servicio',null,['id'=>'servicio', 'class'=>'form-control','placeholder'=>'Ingrese el nombre del Servicio','required'=>''])!!}
         		
         {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_Servicio', 'class'=>'btn btn-success btn-guardar'], $secure= null)!!}
      </div>
    </div>
  </div>
</div>

<!-- ACTUALIZAR SERVICIOS EN ADMINISTRADOR -->

<div class="modal fade" id="myModal_ActualizarServicios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevos Servicios</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmServicios','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
            <input  type="hidden" name="" value="" id="IdServi">
            {!!Form::label('Nombre de Servicio:')!!}
            
        {!!Form::text('servicio',null,['id'=>'servicio_A', 'class'=>'form-control','placeholder'=>'Ingrese el nombre del Servicio','required'=>''])!!}
            
         {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Servicio', $attributes =['id'=>'btn_ActualizarServicio', 'class'=>'btn btn-success btn-actualizar'], $secure= null)!!}
      </div>
    </div>
  </div>
</div>           


<!-- FIN EN ACTUALIZAR SERVICIOS EN ADMINISTRADOR -->

@endsection

@section('scripts')
    <script>
   		$(document).ready(function() {
			$("#btn_Servicio").click(function() {
			//var data=$(".frmRazas").serialize();
			var servicio=$('#servicio').val();
			var token=$("#token").val();
			$.ajax({
				type 	:'post',
				url		:'{!!URL::route('saveServios')!!}',
				headers :{'X-CSRF-TOKEN': token},
				data 	:{servicio:servicio},
				success:function(data){
					swal("Servicio Registrado Correctamente..!!", "", "success");
					$('#myModal').modal('hide');
					window.location='http://localhost:8000/welcomeAdmin/Servicios/create';
				},error:function(){
					
				}	
			});
			$('.frmServicios')[0].reset();
			});
		});

    function cargar_datos(id){
    var route="http://localhost:8000/servicioid/" +id+"";
    $.get(route,function(res){
      $("#IdServi").val(res.id);
      $("#servicio_A").val(res.servicio);
    })
    }

  function Actualizar_Servicios(){
  var id =$("#IdServi").val();
  var Servicio =$("#servicio_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/Servicios/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data:{servicio:Servicio},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarServicios').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/Servicios/create";
            swal("Servicio Actualizado Correctamente..!!", "", "success");
          }else{
            alert('no se pudo');
               }
          }
  });
}

$(document).ready(function() {
            $("#btn_ActualizarServicio").click(function() {
            Actualizar_Servicios();
            });
            });


function EliminarServicios(id){

    var route  ="http://localhost:8000/welcomeAdmin/Servicios/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/Servicios";
            swal({
                  title: "Esta seguro de Eliminar Servicio?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Servicio Eliminado Correctamente", "Servicios", "success");
                });
          }          
        }
  });
}
    </script>


@endsection