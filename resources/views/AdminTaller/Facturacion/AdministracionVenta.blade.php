@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-empleado.css')!!} 
{!!Html::style('admin/js/bootstrapToogle/bootstrap2-toggle.css')!!} 
{!!Html::script('admin/js/bootstrapToogle/bootstrap2-toggle.js')!!}
@endsection
@section('content')
  <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
	
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reporte de Ventas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="/welcomeAdmin/crear_reporte_productos/1" class="moverGenerarFactura  btn btn-success" id="GuardarFactura" name="GuardarFactura">Imprimir Reporte</a>
                      </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="tableVentas" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>CLIENTE</th>
                          <th>FECHA</th>
                          <th>SUBTOTAL</th>
                          <th>TOTAL</th>
                          <th>ESTADO DE VENTA</th>
                        </tr>
                      </thead>
                      <tbody>
          	@foreach($FacturasVentas as $vent) 
    					<tr>  
                @if($vent->estado_venta==0)
                          <td>{{$vent->idCliente}}</td>
                          <td>{{$vent->fecha}}</td>
                          <td>{{$vent->subtotal}}</td>
                          <td>{{$vent->totalPagar}}</td>
                          <td>

                            <div class="checkbox">
                            <label>
                              <input type="checkbox"  data-toggle="toggle-on" id="toggle-demo{{$vent->id}}" onchange="alerta2({{$vent->id}})" data-on="Realizada" data-off="Anulada" data-onstyle="danger">
                            </label> 
                          </div>
                        </td>
                          
                @else
                          <td>{{$vent->idCliente}}</td>
                          <td>{{$vent->fecha}}</td>
                          <td>{{$vent->subtotal}}</td>
                          <td>{{$vent->totalPagar}}</td>
                          <td>

                          	<div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$vent->id}}" onchange="alerta({{$vent->id}})" data-on="Realizada" data-off="Anulada" checked data-onstyle="danger">
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
<script type="text/javascript" charset="utf-8" >

$(document).ready(function(){
    $('#tableVentas').DataTable();
});

	function alerta(id){
      if( $("#toggle-demo"+id).prop('checked')==true){
        swal({ 
          title: "Alerta?",  
           text: "Esta seguro de Anular la factura!",  
            type: "warning",  
             showCancelButton: true,  
              confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Si, Anular!",  
                 cancelButtonText: "No, Anular!",  
                  closeOnConfirm: false, 
                    closeOnCancel: false },
                     function(isConfirm){ 
                       if (isConfirm) {     
                        swal("Anulando!", "Factura Anulada", "success");
                          numFacturaAnularFactura(id);
                           } 
                           else 
                            { 
                                swal("Cancelado", "No se Anulara la Factura", "error");
                                $('#toggle-demo'+id).bootstrapToggle('off')
                            }
                             });

     }    
    }

    function alerta2(id){
      if( $("#toggle-demo"+id).prop('checked')==true){
        swal({ 
          title: "Alerta?",  
           text: "Esta seguro de Realizar la factura!",  
            type: "warning",  
             showCancelButton: true,  
              confirmButtonColor: "#DD6B55", 
                confirmButtonText: "Si, Realizar!",  
                 cancelButtonText: "No, Realizar!",  
                  closeOnConfirm: false, 
                    closeOnCancel: false },
                     function(isConfirm){ 
                       if (isConfirm) {     
                        swal("Realizando...!", "Factura Realizada", "success");
                          numFacturaRealizarFactura(id);
                           } 
                           else 
                            { 
                                swal("Cancelado...", "No se Realizara la Factura", "error");
                                $('#toggle-demo'+id).bootstrapToggle('off')
                            }
                             });

     }    
    }

    function numFacturaRealizarFactura(id){
    var route="http://localhost:8000/welcomeAdmin/RealizarFacturaVenta/" +id+""; 
      $.get(route,function(res){
        if(res.sms=='true'){
          alert('ok');
        }  
      });
  }

  function numFacturaAnularFactura(id){
    var route="http://localhost:8000/welcomeAdmin/AnularFacturaVenta/" +id+""; 
      $.get(route,function(res){
        if(res.sms=='true'){
          alert('ok');
        }  
      });
  }
</script>
@endsection

