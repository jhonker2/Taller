@extends('Layouts.AdminMain')
@section('content')
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuarios</h2>
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
                      Administración de Usuarios
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Tipo Usuario</th>
                          <th>Usuario</th>
                          <th>Password</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                     	@foreach($Usuarios as $Cat) 
    					<tr>
                          <td>{{$Cat->id}}</td>
                          <td>{{$Cat->idCategoria}}</td>
                          <td>{{$Cat->user}}</td>
                          <td>{{$Cat->password}}</td>
                          <td>
                          	<div class="btn-group">
                      			<button type="button" class="btn btn-default">Acciones</button>
                      			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        			<span class="caret"></span>
                        			<span class="sr-only">Toggle Dropdown</span>
                      			</button>
                      				<ul class="dropdown-menu" role="menu">
                        				<li><a onclick="cargar_datos({{$Cat->id}})" href="#" data-toggle="modal" data-target="#myModal_ActualizarUsuarios" >Modificar</a>
                        				</li>
                        				<li><a onclick="EliminarUsuarios({{$Cat->id}})" href="#">Eliminar</a>
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

<div class="modal fade" id="myModal_ActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Usuarios</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmActualizarUsuarios','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdUsuario">  
            <label for="disabledTextInput">Tipo Usuarios</label>
            <select id="idTipoUsuario" name="tipoUsuario" class="form-control text">
                                    <option>Seleccione...</option>
                                    @foreach($CategoriaUsuarios as $Cat)
                                        <option value="{{$Cat->id}}"> {{$Cat->tipoUser}}</option>
                                    @endforeach
                                    </select>
            {!!Form::label('Usuario:')!!}
            {!!Form::text('user',null,['id'=>'user_A', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de Usuario','required'=>''])!!}

            {!!Form::label('Contrasena:')!!}
            {!!Form::text('password',null,['id'=>'password_A', 'class'=>'form-control','placeholder'=>'Ingrese contrasena de Usuario','required'=>''])!!}
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Usuario', $attributes =['id'=>'btn_ActualizarUsuarios', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
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
            $("#btn_ActualizarUsuarios").click(function() {
            Actualizar_Usuarios();
            });
            });	

    function cargar_datos(id){
    var route="http://localhost:8000/welcomeAdmin/Usuarios/" +id+"/edit";	
    $.get(route,function(res){
      $("#IdUsuario").val(res.id)
      $("#idTipoUsuario").val(res.idCategoria);     
      $("#user_A").val(res.user);
      $("#password_A").val(res.password);

      });
    }

  function Actualizar_Usuarios(){

  var id =$("#IdUsuario").val();
  var idTipoUsuario =$("#idTipoUsuario").val();
  var Usuario =$("#user_A").val();
  var password =$("#password_A").val();
  var route  ="http://localhost:8000/welcomeAdmin/Usuarios/"+id+"";
  var token  =$("#token").val();
  $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType:'json',
        data    :{idCategoria:idTipoUsuario,user:Usuario,password:password},
        success:function(res){
          if(res.sms=='ok'){
            $('#myModal_ActualizarUsuarios').modal('hide');
            window.location="http://localhost:8000/welcomeAdmin/Usuarios";
            alert('Actualizacion correcta');
          }else{
            alert('no se pudo');
               }
          
        }
  });
}

function EliminarUsuarios(id){

    var route  ="http://localhost:8000/welcomeAdmin/Usuarios/"+id+"";
    var token  =$("#token").val();
    $.ajax({
    url: route,
    headers :{'X-CSRF-TOKEN': token},
    type: 'delete',
    dataType:'json',
        success:function(res){
          if(res.sms=='ok'){
            window.location="http://localhost:8000/welcomeAdmin/Usuarios";
            swal({
                  title: "Esta seguro de Eliminar Usuario?",
                  
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, Eliminar",
                  closeOnConfirm: false
                },
                function(){
                  swal("Usuario Eliminado Correctamente", "", "success");
                });
          }          
        }
  });
}
		</script>


@endsection