@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Adminitracion de Productos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <ul class="nav navbar-right panel_toolbox">
                        <a href="/welcomeAdmin/crear_reporte_producto/1" class="moverGenerarFactura  btn btn-success">Imprimir</a>
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
                          <th>Categoria Producto</th>
                          <th>Producto</th>
                          <th>Stock</th>
                          <th>Medidas</th>
                          <th>Precio</th>
                          <th>Descripcion</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                     	@foreach($Productos as $produ) 
    					        <tr>
                          <td>{{$produ->idCategoria}}</td>
                          <td>{{$produ->producto}}</td>
                          <td>{{$produ->stock}}</td>
                          <td>{{$produ->medida}}</td>
                          <td>{{$produ->precio}}</td>
                          <td>{{$produ->descripcion}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$produ->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarProductos" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarProductos({{$produ->id}})" href="#">Eliminar</a>
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

<div class="modal fade" id="myModal_ActualizarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Productos</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmActualizarProductos','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdProducto">  
            <label for="disabledTextInput">Producto</label>
            <select id="idTipoProducto" name="tipoProducto" class="form-control text">
                                    <option>Seleccione Producto</option>
                                    @foreach($CategoriaProductos as $catePro)
                                        <option value="{{$catePro->id}}"> {{$catePro->tipoProducto}}</option>
                                    @endforeach
                                    </select>
                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock_A',null,['id'=>'stock_A', 'class'=>'form-control','placeholder'=>'Ingrese el Stock de Productos','required'=>''])!!}

                                <!--{!!Form::label('Porcentaje de Ganancia:')!!}
                                {!!Form::text('porcentajeGanancia',null,['id'=>'porcentajeGanancia', 'class'=>'form-control','placeholder'=>'Ingrese Porcentaje de Ganancias','required'=>''])!!}-->

                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio_A',null,['id'=>'precio_A', 'class'=>'form-control','placeholder'=>'Ingrese Precio','required'=>''])!!}

                                {!!Form::label('Descripcion:')!!}
                                {!!Form::text('descripcion_A',null,['id'=>'descripcion_A', 'class'=>'form-control','placeholder'=>'Ingrese Descripcion de Producto','required'=>''])!!}
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Producto', $attributes =['id'=>'btn_ActualizarProducto', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
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
            $("#btn_ActualizarProducto").click(function() {
            Actualizar_Productos();
            });
            }); 

    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/Productos/" +id+"/edit"; 
    $.get(route,function(res){
      $("#IdProducto").val(res.id)
      $("#idTipoProducto").val(res.idCategoria);     
      $("#stock_A").val(res.stock);     
      $("#precio_A").val(res.precio);
      $("#descripcion_A").val(res.descripcion);
      alert(idCategoria);
      });
    }

  function Actualizar_Productos(){

  var id =$("#IdProducto").val();
  var idTipoProducto =$("#idTipoProducto").val();
  var stock=$("#stock_A").val();
  var precio =$("#precio_A").val();
  var descripcion =$("#descripcion_A").val();
    var route  ="http://localhost:8000/welcomeAdmin/Productos/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data    :{idCategoria:idTipoProducto,stock:stock,precio:precio,descripcion:descripcion},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarProductos').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/Productos";
            swal("Actualizacion realizada Correctamente..!!", "Producto", "success");
          }else{
            alert('no se pudo');
               }
          
        }
  });
}

function EliminarProductos(id){

    var route  ="http://localhost:8000/welcomeAdmin/Productos/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
           
            swal({
                  title: "Esta seguro de Eliminar Producto?",
                  
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Producto Eliminado Correctamente", "", "success");
                });
             window.location="http://localhost:8000/welcomeAdmin/Productos";
          }          
        }
  });
}
    </script>


@endsection

