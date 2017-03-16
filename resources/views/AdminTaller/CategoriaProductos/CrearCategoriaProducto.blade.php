@extends('Layouts.AdminMain')
<style type="text/css">
  .tamano{
    font-size: 30px;
  }

</style>
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="tamano"> Administración de Categorias Productos</h2>
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
                          <th>Producto</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                     	@foreach($categoriaProducto as $catePro) 
    					<tr>
                          <td>{{$catePro->id}}</td>
                          <td>{{$catePro->tipoProducto}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$catePro->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarCategoriaProductos" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarCategoriaProductos({{$catePro->id}})" href="#">Eliminar</a>
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


<!-- Modal para ingresar -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevas Categoria Producto</h4>
      </div>
      <div class="modal-body">
        	
         		{!!Form::open(array('url'=>'','class'=>'frmCategoriaProductos','method'=>'POST'))!!}
        
        <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
        {!!Form::label('Nombre de Categoria Producto:')!!}
				{!!Form::text('CategoriaProducto',null,['id'=>'CategoriaProducto', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de la Categoria Producto','required'=>''])!!}
         		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_CategoriaProducto', 'class'=>'btn btn-success btn-guardar'], $secure= null)!!}
         {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
<!--  fin Modal para ingresar -->

<!--  Modal para ACTUALIZAR -->

<div class="modal fade" id="myModal_ActualizarCategoriaProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevas Categoria Producto</h4>
      </div>
      <div class="modal-body">
        	
         		{!!Form::open(array('url'=>'','class'=>'frmCategoriaProductos','method'=>'POST'))!!}
        
         		<input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdCate"> 
         		{!!Form::label('Nombre de Categoria Producto:')!!}
				{!!Form::text('CategoriaProducto',null,['id'=>'CategoriaProducto_A', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de la Categoria Producto','required'=>''])!!}
         		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Categoria Producto', $attributes =['id'=>'btn_ActualizarCategoriaProducto', 'class'=>'btn btn-success btn-guardar'], $secure= null)!!}
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
			$("#btn_CategoriaProducto").click(function() {
			//var data=$(".frmRazas").serialize();
			var CategoriaProducto=$('#CategoriaProducto').val();
			var token=$("#token").val();
			$.ajax({
    				type 	:'post',
    				url		:'{!!URL::route('saveInfo')!!}',
    				headers :{'X-CSRF-TOKEN': token},
    				data 	:{tipoProducto:CategoriaProducto},
    				success:function(data){
    				swal("Categoria Registrada Correctamente..!!", "", "success");
    				$('#myModal').modal('hide');
    				window.location='http://localhost:8000/welcomeAdmin/CategoriaProductos/create';
				},error:function(){
					alert(data.err);
				}	
			});
			$('.frmCategoriaProductos')[0].reset();
			});
		});
		

    function cargar_datos(id){
    var route="http://localhost:8000/CategoriaProductoid/" +id+"";	
    $.get(route,function(res){
      $("#IdCate").val(res.id)
      $("#CategoriaProducto_A").val(res.tipoProducto);
    })
    }


  
  function Actualizar_CategoriaProductos(){
  var id =$("#IdCate").val();
  var tipoProducto =$("#CategoriaProducto_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/CategoriaProductos/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data:{tipoProducto:tipoProducto},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarCategoriaProductos').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/CategoriaProductos/create";
           swal("Actualizacion realizada Correctamente..!!", "Categoria del Producto", "success");
          }else{
            alert('no se pudo');
               }
          }
  });
}

$(document).ready(function() {
            $("#btn_ActualizarCategoriaProducto").click(function() {
            Actualizar_CategoriaProductos();
            });
            });


function EliminarCategoriaProductos(id){

    var route  ="http://localhost:8000/welcomeAdmin/CategoriaProductos/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/CategoriaProductos";
            swal({
                  title: "Esta seguro de Eliminar Categoria del Producto?",
                  
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Categoria del Producto Eliminado Correctamente", "", "success");
                });
          }          
        }
  });
}
		</script>


@endsection