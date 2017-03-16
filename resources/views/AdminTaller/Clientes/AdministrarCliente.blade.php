@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-cliente.css')!!} 
@endsection
@section('content')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clientes</h2>
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
                          <th>Cedula</th>
                          <th>Cliente</th>
                          <th>Sexo</th>
                          <th>Estado Civil</th>
                          <th>Direccion</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
            @foreach($Clientes as $perso) 
              <tr>
                          <td>{{$perso->cedula}}</td>
                          <td>{{$perso->cliente}}</td>
                          <td>{{$perso->sexo}}</td>
                          <td>{{$perso->estadoCivil}}</td>
                          <td>{{$perso->direccion}}</td>
                          <td>{{$perso->correo}}</td>
                          <td>{{$perso->telefono}}</td>

                          <td>
                            <div class="btn-group">
                            <button type="button" class="btn btn-default">Acciones</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/welcomeAdmin/Clientes/{{$perso->cedula}}/edit" >Modificar</a>
                                </li>
                                <li><a onclick="EliminarProveedores({{$perso->cedula}})" href="#">Eliminar</a>
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

<div class="modal fade" id="myModal_ActualizarClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Clientes</h4>
      </div>
      <div class="modal-body">
          
            {!!Form::open(array('url'=>'','class'=>'frmActualizarClientes','method'=>'POST'))!!}
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdCliente">  
            
                        <div class="col-md-6 col-sm-6 col-xs-4">
                                {!!Form::open(array('url'=>'','class'=>'frmUser','method'=>'POST'))!!}

                                <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 <input  type="hidden" name="" value="" id="IdCliente"> 
                                {!!Form::label('Apellido Paterno:')!!}
                                {!!Form::text('apellidoPaterno_A',null,['id'=>'apellidoPaterno_A', 'class'=>'form-control','placeholder'=>'Ingrese el apellido Paterno del Empleado','required'=>''])!!}

                                {!!Form::label('Apellido Materno:')!!}
                                {!!Form::text('apellidoMaterno_A',null,['id'=>'apellidoMaterno_A', 'class'=>'form-control','placeholder'=>'Ingrese el apellido Materno del Empleado','required'=>''])!!}

                                {!!Form::label('Nombres:')!!}
                                {!!Form::text('nombre_A',null,['id'=>'nombre_A', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de Empleado','required'=>''])!!}

                                {!!Form::label('Genero:')!!}<br>
                                {!!Form::label('Masculino:')!!}
                                {!!Form::radio('sexo_A','Masculino',false,['id'=>'sexo_A'])!!}
                                {!!Form::label('Femenino:')!!}
                                {!!Form::radio('sexo_A','Femenino',false,['id'=>'sexo_A'])!!}<br>    
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-4">
                                <div class="form-group tamaño">
                                    <label for="disabledTextInput">Estado Civil</label>
                                    <select id="estadoCivil_A" name="estadoCi" class="form-control text">
                                        <option>Seleccione Estado Civil</option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Viudo">Viudo</option>
                                        <option value="Divorciado">Divorciado</option>
                                    </select>
                                </div>
                                    
                                {!!Form::label('Direccion:')!!}
                                {!!Form::text('direccion_A',null,['id'=>'direccion_A', 'class'=>'form-control','placeholder'=>'Ingrese la direccion','required'=>''])!!}
                                
                                <br>{!!Form::label('Fecha de Nacimiento:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                     <input type="text" id="fechaNacimiento_A" name="birthdate" value="10/24/1995" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
                                </div>
 
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="birthdate"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });
                                        });
                                        </script><br>

                                        <label for="Correo" class="marginTop">Correo</label>
                                {!!Form::text('correo_A',null,['id'=>'correo_A', 'class'=>'form-control','placeholder'=>'Ingrese el Correo','required'=>''])!!}

                                {!!Form::label('Telefono:')!!}
                                {!!Form::text('telefono_A',null,['id'=>'telefono_A', 'class'=>'form-control','placeholder'=>'Ingrese el telefono','required'=>''])!!}    
                      </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Actualizar Clientes', $attributes =['id'=>'btn_ActualizarClientes', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
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
            $("#btn_ActualizarClientes").click(function() {
            Actualizar_Clientes();
            });
            }); 

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