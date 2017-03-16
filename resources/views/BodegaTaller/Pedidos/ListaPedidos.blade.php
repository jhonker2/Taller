@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/js/bootstrapToogle/bootstrap2-toggle.css')!!} 
{!!Html::script('admin/js/bootstrapToogle/bootstrap2-toggle.js')!!} 

@endsection
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pedidos</h2>
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
                      Administración de Clientes
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>FECHA PEDIDO</th>
                          <th>FECHA DE ENTREGA</th>
                          <th>ELABORADO POR</th>
                          <th>ENCARGADO DE BODEGA</th>
                          <th>EMPLEADO</th>
                          <th>ESTADO</th>
                        </tr>
                      </thead>
                      <tbody>
          	@foreach($pedidos as $pe) 
    					<tr>
                      @if($pe->estado==1)
                          
                          @else
                          <td>{{$pe->id}}</td>
                          <td>{{$pe->fechaPedido}}</td>
                          <td>{{$pe->fechaEntrega}}</td>
                          <td>{{$pe->elaboradoPor}}</td>
                          <td>{{$pe->encargadoBodega}}</td>
                          <td>{{$pe->idEmpleado}}</td>
                          <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$pe->id}}" onchange="alerta({{$pe->id}})" data-on="Entregado" data-off="En Espera" data-onstyle="danger">
                            </label> 
                          </div>
                          </td>

                          @endif
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

    <script>
   
    function alerta(id){
      if( $("#toggle-demo"+id).prop('checked')==true){
        swal({ 
          title: "Alerta?",  
           text: "Esta seguro de entregar este pedido!",  
            type: "warning",  
             showCancelButton: true,  
              confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Si, Entregar!",  
                 cancelButtonText: "No, Entregar!",  
                  closeOnConfirm: false, 
                    closeOnCancel: false },
                     function(isConfirm){ 
                       if (isConfirm) {     
                        swal("Pedido!", "entregado al empleado.", "success");
                          numProducto(id);
                           } 
                           else 
                            { 
                                swal("Cancelado", "No se entrega el pedido", "error");
                                $('#toggle-demo'+id).bootstrapToggle('off')
                            }
                             });

     }    
    }
    
  $(document).ready(function() {
    $("#btn_ActualizarClientes").click(function() {
      Actualizar_Clientes();
    });
  });	
      
  function numProducto(id){
    var route="http://localhost:8000/welcomeAdmin/numProducto/" +id+""; 
      $.get(route,function(res){
        if(res.sms=='true'){
          alert('ok');
        }  
      });
  }

  function obtenerID(id){
    var route="http://localhost:8000/welcomeAdmin/IDProducto/" +id+""; 
    $.get(route,function(res){
      
    })
  }
    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/Clientes/" +id+"/edit";	
    $.get(route,function(res){
      $("#IdCliente").val(res.cedula)
      $("#apellidoPaterno_A").val(res.apellidoPaterno);     
      $("#apellidoMaterno_A").val(res.apellidoMaterno);
      $("#nombre_A").val(res.nombre);
      $("#sexo_A").val(res.sexo);
      $("#estadoCivil_A").val(res.estadoCivil);
      $("#fechaNacimiento_A").val(res.fechaNacimiento);
      $("#correo_A").val(res.correo);
      $("#telefono_A").val(res.telefono);
      });
    }

  function Actualizar_Clientes(){

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
            alert('Actualizacion correcta');
          }else{
            alert('no se pudo');
               }
          
        }
  });
}

function EliminarClientes(id){

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
            alert('Eliminacion correcta');
          }          
        }
  });
}
		</script>


@endsection