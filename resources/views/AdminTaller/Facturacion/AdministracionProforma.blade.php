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
                    <h2>Administracion de Proformas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i></a>
                        
                      </li>
                      <ul class="nav navbar-right panel_toolbox">
                        <a href="/welcomeAdmin/crear_reporte_Estado_Proformas/1" target="bland_" class="moverGenerarFactura  btn btn-success" id="GuardarFactura" name="GuardarFactura">Imprimir Reporte</a>
                      </ul>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     
                    </p>
                    <table id="tableProformas" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>CLIENTE</th>
                          <th>FECHA</th>
                          <th>SUBTOTAL</th>
                          <th>TOTAL</th>
                          <th>ESTADO DE PROFORMA</th>
                        </tr>
                      </thead>
                      <tbody>
            @foreach($proformas as $profo) 
              <tr>
                      @if($profo->estado_proforma==0)
                          <td>{{$profo->idCliente}}</td>
                          <td>{{$profo->fecha}}</td>
                          <td>{{$profo->subtotal}}</td>
                          <td>{{$profo->totalPagar}}</td>
                          <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$profo->id}}" onchange="alerta({{$profo->id}})" data-on="Realizada" data-off="En Espera"  data-onstyle="danger">
                            </label> 
                          </div>
                          </td>
                      @else
                          <td>{{$profo->idCliente}}</td>
                          <td>{{$profo->fecha}}</td>
                          <td>{{$profo->subtotal}}</td>
                          <td>{{$profo->totalPagar}}</td>
                          <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$profo->id}}" onchange="alerta2({{$profo->id}})" data-on="Realizada" data-off="En Espera" checked data-onstyle="danger">
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




$(document).ready(function(){
    $('#tableProformas').DataTable();
});
   
    function alerta(id){
      if( $("#toggle-demo"+id).prop('checked')==true){
        swal({ 
          title: "Alerta?",  
           text: "Esta seguro de realizar la venta!",  
            type: "warning",  
             showCancelButton: true,  
              confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Si, Realizar!",  
                 cancelButtonText: "No, Realizar!",  
                  closeOnConfirm: false, 
                    closeOnCancel: false },
                     function(isConfirm){ 
                       if (isConfirm) {     
                        swal("Venta!", "Venta Realizada", "success");
                          numRealizarVenta(id);
                          window.location="http://localhost:8000/welcomeAdmin/FacturaProforma/";
                           } 
                           else 
                            { 
                                swal("Cancelado", "No se Realizo la Venta", "error");
                                $('#toggle-demo'+id).bootstrapToggle('off')
                            }
                             });

     }    
    }

    function alerta2(id){
      if( $("#toggle-demo"+id).prop('checked')==true){
        swal({ 
          title: "Alerta?",  
           text: "Esta seguro de Anular la venta!",  
            type: "warning",  
             showCancelButton: true,  
              confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Si, Anular!",  
                 cancelButtonText: "No, Anular!",  
                  closeOnConfirm: false, 
                    closeOnCancel: false },
                     function(isConfirm){ 
                       if (isConfirm) {     
                        swal("Venta!", "Venta Anulada", "success");
                          numAnularVenta(id);
                          window.location="http://localhost:8000/welcomeAdmin/FacturaProforma/";
                           } 
                           else 
                            { 
                                swal("Cancelado", "No se Anulo la Venta", "error");
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
      
  function numRealizarVenta(id){
    var route="http://localhost:8000/welcomeAdmin/RealizarFacturaProforma/" +id+""; 
      $.get(route,function(res){
        if(res.sms=='true'){
          alert('ok');
        }  
      });
  }

  function numAnularVenta(id){
    var route="http://localhost:8000/welcomeAdmin/AnularFacturaProforma/" +id+""; 
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