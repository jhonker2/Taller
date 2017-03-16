@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-empleado.css')!!} 
@endsection
@section('content')
  <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empleados</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="/welcomeAdmin/crear_reporte_productos/1" class="moverGenerarFactura  btn btn-success" id="GuardarFactura" name="GuardarFactura">Imprimir</a>
                      </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Administración de Empleados
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>FOTO</th>
                          <th>EMPLEADO</th>
                          <th>CÉDULA</th>
                          <th>FECHA DE CONTRATACIÓN</th>
                          <th>SUELDO</th>
                          <th>OPCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
          	@foreach($empleados as $emple) 
    					<tr>
                          <td>{{$emple->id}}</td>
                          <td><img class="foto_empleado" src="{{asset($emple->foto)}}" alt=""></td>
                          <td>{{$emple->nombre.' '.$emple->apellidoPaterno}}</td>
                          <td>{{$emple->cedula}}</td>
                          <td>{{$emple->fechaContratacion}}</td>
                          <td>{{$emple->salario}}</td>
                          
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a href="/welcomeAdmin/Empleados/{{$emple->cedula}}/edit" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarEmpleado({{$emple->id}})" href="#">Eliminar</a>
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

@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8" >
	function cargar_datos_empleados(id){
		var route="http://localhost:8000/welcomeAdmin/Empleados/"+id+"/edit";
    $.get(route,function(res){
        window.location="http://localhost:8000/welcomeAdmin/Empleados/editar";

    	$("#ciudadA").val(res.ciudad);
    	$("#idciudad").val(res.id);
    });
	}

  function EliminarEmpleado(id){
    var route="http://localhost:8000/welcomeAdmin/Empleados/"+id+"";
    var token  =$("#token").val();
    swal({
                  title: "Esta seguro de Eliminar Maquinaria?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Empleado Eliminado Correctamente", "", "success");
                   $.ajax({
                    url: route,
                    headers :{'X-CSRF-TOKEN': token},
                    type: 'delete',
                    dataType:'json',
                    success:function(res){
                      if(res.sms=='ok'){
                        window.location="http://localhost:8000/welcomeAdmin/Empleados";
                      }          
                    } 
                });
            });
  }
</script>
@endsection

