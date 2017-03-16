@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Administracion de Proveedores</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <ul class="nav navbar-right panel_toolbox">                    
                        <a href="/welcomeAdmin/crear_reporte_proveedores/1" target="bland_" class="moverImprimirFactura  btn btn-success">Imprimir Reporte</a>
                    </ul>
                    </ul>
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
                    
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Nombre de Empresa</th>
                          <th>Ruc</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Correo</th>
                          <th>Representante</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
          	@foreach($Proveedores as $provee) 
    					<tr>
                          <td>{{$provee->id}}</td>
                          <td>{{$provee->nombreEmpresa}}</td>
                          <td>{{$provee->ruc}}</td>
                          <td>{{$provee->direccion}}</td>
                          <td>{{$provee->telefono}}</td>
                          <td>{{$provee->correo}}</td>
                          <td>{{$provee->representante}}</td>

                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$provee->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarProveedores" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarProveedores({{$provee->id}})" href="#">Eliminar</a>
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

<!--  Modal para ACTUALIZAR -->

<div class="modal fade" id="myModal_ActualizarProveedores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Proveedores</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmActualizarProveedores','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdProveedor">  
            
                                {!!Form::label('Nombre de empresa:')!!}
                                {!!Form::text('nombreEmpresa_A',null,['id'=>'nombreEmpresa_A', 'class'=>'form-control','placeholder'=>'Ingrese Nombre de Empresa','required'=>''])!!}

                                {!!Form::label('Ruc:')!!}
                                {!!Form::text('ruc_A',null,['id'=>'ruc_A', 'class'=>'form-control','placeholder'=>'Ingrese Ruc de la empresa','required'=>''])!!}

                                {!!Form::label('Direccion:')!!}
                                {!!Form::text('direccion_A',null,['id'=>'direccion_A', 'class'=>'form-control','placeholder'=>'Ingrese Direccion de la empresa','required'=>''])!!}

                                {!!Form::label('Telefono:')!!}
                                {!!Form::text('telefono_A',null,['id'=>'telefono_A', 'class'=>'form-control','placeholder'=>'Ingrese Telefono de la empresa','required'=>''])!!}

                                {!!Form::label('Correo:')!!}
                                {!!Form::text('correo_A',null,['id'=>'correo_A', 'class'=>'form-control','placeholder'=>'Ingrese Correo de la empresa','required'=>''])!!}

                                {!!Form::label('Representante:')!!}
                                {!!Form::text('representante_A',null,['id'=>'representante_A', 'class'=>'form-control','placeholder'=>'Ingrese Representante de la empresa','required'=>''])!!}
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Usuario', $attributes =['id'=>'btn_ActualizarProveedores', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
         {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>        

<!--  FIN Modal para ACTUALIZAR -->
@endsection

@section('scripts')
    <script>
   	  $(document).ready(function() {
            $("#btn_ActualizarProveedores").click(function() {
            Actualizar_Proveedores();
            });
            });	

    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/Proveedores/" +id+"/edit";	
    $.get(route,function(res){
      $("#IdProveedor").val(res.id)
      $("#nombreEmpresa_A").val(res.nombreEmpresa);     
      $("#ruc_A").val(res.ruc);
      $("#direccion_A").val(res.direccion);
      $("#telefono_A").val(res.telefono);
      $("#correo_A").val(res.correo);
      $("#representante_A").val(res.representante);

      });
    }

  function Actualizar_Proveedores(){

  var id =$("#IdProveedor").val();
  var nombreEmpresa =$("#nombreEmpresa_A").val();
  var ruc =$("#ruc_A").val();
  var direccion =$("#direccion_A").val();
  var telefono =$("#telefono_A").val();
  var correo =$("#correo_A").val();
  var representante =$("#representante_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/Proveedores/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data    :{nombreEmpresa:nombreEmpresa,ruc:ruc,direccion:direccion,telefono:telefono,correo:correo,representante:representante},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarProveedores').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/Proveedores";
            swal("Categoria Producto Actualizada Correctamente..!!", "", "success");
          }else{
            alert('no se pudo');
               }
          
        }
  });
}

function EliminarProveedores(id){

    var route  ="http://localhost:8000/welcomeAdmin/Proveedores/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/Proveedores";
            swal({
                  title: "Esta seguro de Eliminar Proveedor?",
                  
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Proveedor Eliminado Correctamente", "", "success");
                });
          }          
        }
  });
}
		</script>


@endsection