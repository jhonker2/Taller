@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Maquinarias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <ul class="nav navbar-right panel_toolbox">                    
                        <a href="/welcomeAdmin/crear_reporte_maquinarias/1" target="bland_" class="moverImprimirFactura  btn btn-success">Imprimir Reporte</a>
                    </ul>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Administración de Maquinarias
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Maquina</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Stock</th>
                          <th>Precio</th>
                          <th>Fecha de Ingreso</th>
                          <th>Fecha de Deterioro</th>
                          <th>Empleado</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
          	@foreach($Maquinarias as $maqui) 
    					       <tr>
                          <td>{{$maqui->id}}</td>
                          <td>{{$maqui->maquina}}</td>
                          <td>{{$maqui->marca}}</td>
                          <td>{{$maqui->modelo}}</td>
                          <td>{{$maqui->stock}}</td>
                          <td>{{$maqui->precio}}</td>
                          <td>{{$maqui->fechaIngreso}}</td>
                          <td>{{$maqui->fechaDeterioro}}</td>
                          <td>{{$maqui->idEmpleado}}</td>

                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$maqui->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarMaquinaria">Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarMaquinarias({{$maqui->id}})" href="#">Eliminar</a>
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

<div class="modal fade" id="myModal_ActualizarMaquinaria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Maquinarias</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmActualizarMaquinaria','method'=>'POST'))!!}
        
                               
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                            <input  type="hidden" name="" value="" id="IdMaquinaria"> 
                                 
                                <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                {!!Form::label('Maquina:')!!}
                                {!!Form::text('maquina_A',null,['id'=>'maquina_A','style="text-transform:uppercase;"','onkeyup="javascript:this.value=this.value.toUpperCase();"','class'=>'form-control','placeholder'=>'Ingrese nombre de Maquinaria','required'=>''])!!}


                                {!!Form::label('Marca:')!!}
                                {!!Form::text('marca_A',null,['id'=>'marca_A', 'class'=>'form-control','placeholder'=>'Ingrese marca de Maquinaria','required'=>''])!!}

                                {!!Form::label('Modelo:')!!}
                                {!!Form::text('modelo_A',null,['id'=>'modelo_A', 'class'=>'form-control','placeholder'=>'Ingrese modelo de maquinaria','required'=>''])!!}


                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock_A',null,['id'=>'stock_A', 'class'=>'form-control','placeholder'=>'Ingrese stock de maquinaria','required'=>''])!!}

                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio_A',null,['id'=>'precio_A', 'class'=>'form-control','placeholder'=>'Ingrese precio de maquinaria','required'=>''])!!}

                                

                              <br>{!!Form::label('Fecha de Ingreso:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                     <input type="text" id="fechaIngreso_A" name="fechaIngreso_A" value="10/24/2020" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
                                </div>
 
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="fechaIngreso_A"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });
                                        });
                                        </script><br>


                                        <br>{!!Form::label('Fecha de Deterioro:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                         <input type="text" id="fechaDeteriorio_A" name="fechaDeteriorio_A" value="10/24/2020" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
                                   </div>

                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="fechaDeteriorio_A"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });
                                        });
                                        </script><br>

                                        <div class="form-group">
                                            <label for="disabledTextInput">Empleado</label>
                                            <select id="idEmpleado_A" name="idEmpleado_A" class="form-control text">
                                            <option>Seleccione Empleado</option>
                                            @foreach($empleados as $empl)
                                                <option value="{{$empl->id}}"> {{$empl->nombre}}</option>
                                            @endforeach
                                            </select>
                                       </div>

                                                                                     
                        </div>
                        
                        {!!Form::close()!!}
                              
        <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        {!!link_to('#', $title='Actualizar Maquinarias', $attributes =['id'=>'btn_ActualizarMaquinaria', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
        {!!Form::close()!!}
      </div>
      </div>
    </div>
  </div>
</div>        

<!--  FIN Modal para ACTUALIZAR -->
@endsection

@section('scripts')
    <script>
   	  $(document).ready(function() {
            $("#btn_ActualizarMaquinaria").click(function() {
            Actualizar_Maquinarias();
            });
            });	

    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/Maquinarias/" +id+"/edit";	
    $.get(route,function(res){
      $("#IdMaquinaria").val(res.cedula)
      $("#maquina_A").val(res.maquina);     
      $("#marca_A").val(res.marca);
      $("#modelo_A").val(res.modelo);
      $("#stock_A").val(res.stock);
      $("#precio_A").val(res.precio);
      $("#fechaIngreso_A").val(res.fechaIngreso);
      $("#fechaDeteriorio_A").val(res.fechaDeterioro);
      $("#idEmpleado_A").val(res.idEmpleado);
      });
    }

  function Actualizar_Maquinarias(){

  var id =$("#IdMaquinaria").val();
  var maquina =$("#maquina_A").val();
  var marca =$("#marca_A").val();
  var modelo =$("#modelo_A").val();
  var stock =$("#stock_A").val();
  var precio =$("#precio_A").val();
  var fechsaIngreso =$("#fechaIngreso_A").val();
  var fechaDeterioro =$("#fechaDeteriorio_A").val();
  var idEmpleado =$("#idEmpleado_A").val();
  
  var route  ="http://localhost:8000/welcomeAdmin/Maquinarias/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data    :{maquina:maquina,marca:marca,modelo:modelo,stock:stock,precio:precio,fechsaIngreso:fechsaIngreso,fechaDeterioro:fechaDeterioro,idEmpleado:idEmpleado},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarMaquinaria').modal('hide');
           window.location="http://localhost:8000/welcomeAdmin/Maquinarias";
           swal("Actualizacion realizada Correctamente..!!", "Maquinaria", "success");

          }else{
            alert('no se pudo');
               }
          
        }
  });
}

function EliminarMaquinarias(id){

    var route  ="http://localhost:8000/welcomeAdmin/Maquinarias/"+id+"";
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
                  swal("Maquinaria Eliminado Correctamente", "", "success");
                   $.ajax({
                    url: route,
                    headers :{'X-CSRF-TOKEN': token},
                    type: 'delete',
                    dataType:'json',
                    success:function(res){
                      if(res.sms=='ok'){
                      window.location="http://localhost:8000/welcomeAdmin/Maquinarias";
                      }          
                    }
                  });
                });
}
		</script>


@endsection