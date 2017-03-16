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
                    <h2 class="tamano">Administracion Categoria de Usuarios</h2>
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
                      Administración de Categoria Usuarios
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Tipos de Usuarios</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                     	@foreach($CategoriaUser as $catUsu) 
    					<tr>
                          <td>{{$catUsu->id}}</td>
                          <td>{{$catUsu->tipoUser}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$catUsu->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarCategoriaUsuario" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarCategoriaUsuarios({{$catUsu->id}})" href="#">Eliminar</a>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevas Categorias de Usuarios</h4>
      </div>
      <div class="modal-body">
        	
        {!!Form::open(array('url'=>'','class'=>'frmCategoriaUser','method'=>'POST'))!!}
        
         		<input  type="hidden" name="_token" value="{{csrf_token() }}" id="token"> 
         		{!!Form::label('Nombre de Categoria de Usuarios:')!!}
				    {!!Form::text('categoriaUser',null,['id'=>'categoriaUser', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de la nueva Categoria de Usuario','required'=>''])!!}
         		
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_CategoriaUser', 'class'=>'btn btn-success btn-guardar'], $secure= null)!!}
      </div>
    </div>
  </div>
</div>

<!-- ACTUALIZAR CATEGORIA USUARIOS -->

<div class="modal fade" id="myModal_ActualizarCategoriaUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Categoria Usuario</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmCategoriaUser','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
            <input  type="hidden" name="" value="" id="IdUsu"> 
            {!!Form::label('Nombre de Categoria Usuario:')!!}
            <input  type="hidden" name="_token" value="{{csrf_token() }}" id="token">
        {!!Form::text('CategoriaUser_A',null,['id'=>'CategoriaUser_A', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de la Categoria De Usuario','required'=>''])!!}
            
         {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Categoria Usuario', $attributes =['id'=>'btn_ActualizarCategoriUser', 'class'=>'btn btn-success btn-actualizar'], $secure= null)!!}
      </div>
    </div>
  </div>
</div>           
<!-- FIN ACTUALIZAR CATEGORIA USUARIO -->

@endsection

@section('scripts')
<script>
   $(document).ready(function() {
      $("#btn_CategoriaUser").click(function() {
      //var data=$(".frmRazas").serialize();
      var categoriaUser=$('#categoriaUser').val();
      var token=$("#token").val();
      
      $.ajax({
        type  :'post',
        url   :'{!!URL::route('saveCateUsu')!!}',
        headers :{'X-CSRF-TOKEN': token},
        data  :{tipoUser:categoriaUser},
        success:function(data){
          swal("Registrada Correctamente..!!", "Categoria del Usuario", "success");
          $('#myModal').modal('hide');
          window.location='http://localhost:8000/welcomeAdmin/CategoriaUsuarios/create';
        },error:function(){
          alert(data.err);
          
        } 
      });
      $('.frmCategoriaUser')[0].reset();
      });
    });

    function cargar_datos(id){
    var route="http://localhost:8000/CategoriaUsuariosId/" +id+"";
    $.get(route,function(res){
      $("#IdUsu").val(res.id);
      $("#CategoriaUser_A").val(res.tipoUser);

    })
    }


  function Actualizar_CategoriaUsuario(){
  var id =$("#IdUsu").val();
  var tipoUsu =$("#CategoriaUser_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/CategoriaUsuarios/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data:{tipoUser:tipoUsu},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarCategoriaUsuario').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/CategoriaUsuarios/create";
           swal("Actualizacion realizada Correctamente..!!", "Categoria del Usuario", "success");
          }else{
            alert('no se pudo');
               }
          }
  });
}

$(document).ready(function() {
            $("#btn_ActualizarCategoriUser").click(function() {
            Actualizar_CategoriaUsuario();
            });
            });

function EliminarCategoriaUsuarios(id){

    var route  ="http://localhost:8000/welcomeAdmin/CategoriaUsuarios/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/CategoriaUsuarios";
            swal({
                  title: "Esta seguro de Eliminar?",
                  text: "Eliminacion de una Categoria del Usuario",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Elimado Correctamente", "Categoria del Usuario.", "success");
                });
          }          
        }
  });
}
    </script>


@endsection