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
                      
                          <td>{{$pe->id}}</td>
                          <td>{{$pe->fechaPedido}}</td>
                          <td>{{$pe->fechaEntrega}}</td>
                          <td>{{$pe->elaboradoPor}}</td>
                          <td>{{$pe->encargadoBodega}}</td>
                          <td>{{$pe->idEmpleado}}</td>
                          <td>
                          <p>Entregado</p>
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

		</script>


@endsection