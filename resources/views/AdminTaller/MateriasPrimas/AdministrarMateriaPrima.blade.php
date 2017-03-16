@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>  Administración de Materias Primas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <ul class="nav navbar-right panel_toolbox">
                        <a href="/welcomeAdmin/crear_reporte_MateriaPrimas/1" target="bland_" class="moverGenerarFactura  btn btn-success">Imprimir</a>
                      </ul>
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
                          <th>Material</th>
                          <th>Precio</th>
                          <th>cantidad</th>
                          <th>Medida material</th>
                          <th>Stock</th>
                          <th>Unidad de Medida</th>
                          <th>Descripcion</th>
                          <th>Opciones</th>
                          </tr>
                      </thead>
                      <tbody>
          	@foreach($MateriasPrimas as $matePri) 
    					<tr>
                          <td>{{$matePri->id}}</td>
                          <td>{{$matePri->material}}</td>
                          <td>{{$matePri->precio}}</td>
                          <td>{{$matePri->cantidad}}</td>
                          <td>{{$matePri->cantidad_medida}}</td>
                          <td>{{$matePri->stock}}</td>
                          <td>{{$matePri->unidadMedida}}</td>
                          <td>{{$matePri->descripcion}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$matePri->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarMateriasPrimas" >Modificar</a>
                        				</li>
                                <li><a onclick="cargar_datos({{$matePri->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarMateriasPrimas" >Devolucion</a>
                                </li>
                        				<li><a onclick="EliminarMateriasPrimas({{$matePri->id}})" href="#">Eliminar</a>
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

        <!--  MODAL PARA DEVOLVER MATERIA PRODUCTO  -->

<div class="modal fade" id="myModal_ActualizarMateriasPrimas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Materia Prima</h4>
      </div>
      <div class="modal-body">
          
            <div class="col-md-6 col-xs-2">                  
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input  type="hidden" name="" value="" id="IdMateriaPrima">  
                                 
                      
                           <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                {!!Form::label('Material :')!!}
                                {!!Form::text('material_A',null,['id'=>'material_A', 'class'=>'form-control','placeholder'=>'Ingrese Material','required'=>''])!!} 
             
                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio_A',null,['id'=>'precio_A', 'class'=>'form-control','placeholder'=>'Ingrese Precio','required'=>''])!!}

                                 {!!Form::label('Cantidad:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad_A',null,['id'=>'cantidad_A', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}
                                                          
                                {!!Form::label('Cantidad Medida:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad_medida_A',null,['id'=>'cantidad_medida_A', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}

                                <div class="form-group lugarMedida"><style type="text/css"> .lugarMedida{margin-top: -58px;
                                margin-left: 135px;}</style>
                                    <label for="disabledTextInput">Unidad de Medida</label>
                                    <select id="unidadMedida_A" name="unidadMedida_A" class="form-control text">
                                        <option>Seleccione Unidad de Medida</option>
                                        <option value="Metros">Metros</option>
                                        <option value="Unidades">Unidades</option>
                                        <option value="Paquetes">Paquetes</option>
                                         <option value="Litros">Litros</option>
                                    </select>
                                </div>
                               
                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock_A',null,['id'=>'stock_A', 'class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'=>''])!!}

                                {!!Form::label('Descripcion:')!!}
                                {!!Form::text('descripcion_A',null,['id'=>'descripcion_A', 'class'=>'form-control','placeholder'=>'Ingrese Descripcion de Producto','required'=>''])!!}
            </div>  
      {!!Form::close()!!}

        </div>
       <div class="">
        <button type="button" class="btn btn-default centrarSalir" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Devolver Materia Prima', $attributes =['id'=>'btn_DevolverMateriasPrimas', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
         {!!Form::close()!!}  
         </div>     
      </div>
      
    </div>

  </div>

</div>        

<!--  FIN MODAL PARA DEVOLUCIONES -->

<!--  Modal para ACTUALIZAR -->

<div class="modal fade" id="myModal_ActualizarMateriasPrimas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Materia Prima</h4>
      </div>
      <div class="modal-body">
          
            <div class="col-md-6 col-xs-2">                  
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input  type="hidden" name="" value="" id="IdMateriaPrima">  
                                 
                      
                           <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                {!!Form::label('Material :')!!}
                                {!!Form::text('material_A',null,['id'=>'material_A', 'class'=>'form-control','placeholder'=>'Ingrese Material','required'=>''])!!} 
             
                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio_A',null,['id'=>'precio_A', 'class'=>'form-control','placeholder'=>'Ingrese Precio','required'=>''])!!}

                                 {!!Form::label('Cantidad:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad_A',null,['id'=>'cantidad_A', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}
                                                          
                                {!!Form::label('Cantidad Medida:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad_medida_A',null,['id'=>'cantidad_medida_A', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}

                                <div class="form-group lugarMedida"><style type="text/css"> .lugarMedida{margin-top: -58px;
                                margin-left: 135px;}</style>
                                    <label for="disabledTextInput">Unidad de Medida</label>
                                    <select id="unidadMedida_A" name="unidadMedida_A" class="form-control text">
                                        <option>Seleccione Unidad de Medida</option>
                                        <option value="Metros">Metros</option>
                                        <option value="Unidades">Unidades</option>
                                        <option value="Paquetes">Paquetes</option>
                                         <option value="Litros">Litros</option>
                                    </select>
                                </div>
                               
                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock_A',null,['id'=>'stock_A', 'class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'=>''])!!}

                                {!!Form::label('Descripcion:')!!}
                                {!!Form::text('descripcion_A',null,['id'=>'descripcion_A', 'class'=>'form-control','placeholder'=>'Ingrese Descripcion de Producto','required'=>''])!!}
            </div>  
      {!!Form::close()!!}

        </div>
       <div class="">
        <button type="button" class="btn btn-default centrarSalir" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Materia Prima', $attributes =['id'=>'btn_ActualizarMateriasPrimas', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
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
            $("#btn_ActualizarMateriasPrimas").click(function() {
            Actualizar_MateriasPrimas();
            });
            });	

    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/MateriasPrimas/" +id+"/edit";	
    $.get(route,function(res){
      $("#IdMateriaPrima").val(res.id)
      $("#material_A").val(res.material);     
      $("#precio_A").val(res.precio);
      $("#cantidad_A").val(res.cantidad);
      $("#cantidad_medida_A").val(res.cantidad_medida);
      $("#unidadMedida_A").val(res.unidadMedida);
      $("#stock_A").val(res.stock);
      $("#descripcion_A").val(res.descripcion);
      });
    }

  function Actualizar_MateriasPrimas(){

  var id =$("#IdMateriaPrima").val();
  var material =$("#material_A").val();
  var precio =$("#precio_A").val();
  var cantidad =$("#cantidad_A").val();
  var cantidad_medida =$("#cantidad_medida_A").val();
  var unidadMedida =$("#unidadMedida_A").val();
  var stock =$("#stock_A").val();
  var descripcion =$("#descripcion_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/MateriasPrimas/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data    :{material:material,precio:precio,cantidad:cantidad,cantidad_medida:cantidad_medida,unidadMedida:unidadMedida,stock:stock,descripcion:descripcion},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarMateriasPrimas').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/MateriasPrimas";
            swal("Actualizacion realizada Correctamente..!!", "Materia Prima", "success");
          }else{
            alert('no se pudo');
               }
          
        }
  });
}

            $("select#unidadMedida_A").on('change',function() {
                if ($('#unidadMedida_A').val()=="Metros") {
                   var cantidad= $('#cantidad_A').val();
                   var cantidad_medida= $('#cantidad_medida_A').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock_A').val(stock_total_M);
               }
             });

             $("select#unidadMedida_A").on('change',function() {
                if ($('#unidadMedida_A').val()=="Metros") {
                   var cantidad= $('#cantidad_A').val();
                   var cantidad_medida= $('#cantidad_medida_A ').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock_A').val(stock_total_M);
               }
             });

             $("select#unidadMedida_A").on('change',function() {
                if ($('#unidadMedida_A').val()=="Unidades") {
                   var cantidad= $('#cantidad_A').val();
                   var cantidad_medida= $('#cantidad_medida_A').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock_A').val(stock_total_M);
               }
             });

             $("select#unidadMedida_A").on('change',function() {
                if ($('#unidadMedida_A').val()=="Paquetes") {
                   var cantidad= $('#cantidad_A').val();
                   var cantidad_medida= $('#cantidad_medida_A').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock_A').val(stock_total_M);
               }
             });

             $("select#unidadMedida_A").on('change',function() {
                if ($('#unidadMedida_A').val()=="Litros") {
                   var cantidad= $('#cantidad_A').val();
                   var cantidad_medida= $('#cantidad_medida_A').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock_A').val(stock_total_M);
               }
             });

function EliminarMateriasPrimas(id){

    var route  ="http://localhost:8000/welcomeAdmin/MateriasPrimas/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/MateriasPrimas";
            swal({
                  title: "Esta seguro de Eliminar la Materia Prima?",
                  
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Materia Prima Eliminada Correctamente", "", "success");
                });
            window.location="http://localhost:8000/welcomeAdmin/MateriasPrimas";
          }          
        }
  });
}
		</script>


@endsection