@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-empleado.css')!!} 


@section('content')
<style type="text/css">
    thead{
        background: #009688;
    color: black;
    }   
</style>
<div class="x_title">
                    <h2>Modificar Empleado</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
<div class="panel panel-default">
    <button type="button" id="btn_cancelar" class="btnCancelar btn btn-danger">Cancelar</button>
    <button type="button" class="btn btn-success btn-act" id="btnactualizarE">Actualizar Datos</button>

    <div class="panel-body">
    @foreach($empleado as $emple)
            <div class="col-md-12 registro">
                   <ul class="nav nav-tabs" id="Tab_empleado">
                    <li  id="tab_1" class="active"><a  href="#tab-1" data-toggle="tab">Datos Personales</a></li>
                    <li id="tab_2"><a href="#tab-2" data-toggle="tab">Datos Profesionales</a></li>
                    <li id="tab_3"><a href="#tab-3" data-toggle="tab">Sueldo</a></li>
                    
               		 </ul>
                
            <div class="tab-content">
                <!-- Tab Content 1 DATOS PERSONALES-->
                <div class="tab-pane fade in active" id="tab-1">
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        {!!Form::open(['files'=>true,'id'=>'FormEmpleado'])!!}
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                            <input  type="hidden" id="idempleado" value="{{$emple->id}}"> 
                            <input  type="hidden" id="genero2" value="{{$emple->sexo}}"> 
                            <input  type="hidden" id="estodoCivil2" value="{{$emple->estadoCivil}}"> 
                            <input  type="hidden" id="estatus2" value="{{$emple->estatus}}"> 
                            <input  type="hidden" id="cargas2" value="{{$emple->cargaFamiliar}}"> 
                            <br>{!!Form::label('Cedula:')!!}
                               
                                <input type="text" id="cedula" name="cedula" value='{{"$emple->cedula"}}' class="form-control" placeholder="ingrese e numero de cedula" required disabled="false">
                                <span id="span_cedula"></span>
                                <span id="span_mensaje" style="display: block;color: red;"></span>

                                {!!Form::label('Apellido Paterno:')!!}
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" value='{{"$emple->apellidoPaterno"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                                
                                {!!Form::label('Apellido Materno:')!!}
                                <input type="text" id="apellidoMaterno" name="apellidoMaterno" value='{{"$emple->apellidoMaterno"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                                
                                {!!Form::label('Nombres:')!!}
                                <input type="text" id="nombre" name="nombre" value='{{"$emple->nombre"}}' class="form-control" placeholder="ingrese el apellido paterno" required>

                                
                                {!!Form::label('Genero:')!!}<br>
                                Masculino:
                                <input type="radio" class="flat" name="genero" id="genderM" value="Masculino" checked="" required /> Femenino:
                                <input type="radio" class="flat" name="genero" id="genderF" value="Femenino" />
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                                 <br><div class="form-group tamaño">
                                    <label for="disabledTextInput">Estado Civil</label>
                                    <select id="estadoCivil" name="estadoCivil" class="form-control text" onchange='deleteError("estadoCivil")'>
                                        <option value="0" >Seleccione Estado Civil</option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Viudo">Viudo</option>
                                        <option value="Divorciado">Divorciado</option>
                                    </select>
                                </div>
                                	
                                {!!Form::label('Direccion:')!!}
                                <input type="text" id="direccion_E" name="direccion_E" value='{{"$emple->direccion"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                                
                                {!!Form::label('Fecha de Nacimiento:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
								    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
								     <input type="text" name="birthdate" value='{{"$emple->fechaNacimiento"}}' style="border: 0px;    width: 64%;" /> <b class="caret"></b>
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
                                <input type="text" id="correo_E" name="correo_E" value='{{"$emple->correo"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                                <span id="span_correo"></span>
                                <span id="span_mensaje_correo" style="display: block;color: red;"></span>

                                {!!Form::label('Telefono:')!!}
                                <input type="text" id="telefono_E" name="telefono_E" value='{{"$emple->telefono"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                        </div>
                        <div class="col-md-4 col-xs-6">
                                	 <div class="foto"><span type="file"></span>
                        				</div>
                        				<label class="uploader foto" ondragover="return false">
                            			<img src='/{{$emple->foto}}' class="" style="opacity: 1">
                          				  <input type="file" name="archivo" id="archivo" accept="image/*" required>
                       				 </label>
                                </div>
                                <div>
                                	<a id="btn_sig1" class="btnSiguiente btn btn-success">Siguiente</a>
                                </div>
                                
                                </div>

                                <!-- FIN tab 1 DATOS PROFESIONALES-->


                              <!-- Tab Content 2 FAMILIA -->
                                <div class="tab-pane fade" id="tab-2">
                                <div class="col-md-6 col-sm-6 col-xs-6">

                                <br>{!!Form::label('Fecha de Contratacion:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                     <input type="text" id="fechaContratacion_E" name="fechaContratacion_E" value='{{"$emple->fechaContratacion"}}' style="border: 0px;" /> <b class="caret"></b>
                                </div>
 
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="fechaContratacion_E"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });
                                        });
                                        </script><br> 

                                <br>{!!Form::label('Cargo:')!!}
                                <input type="text" id="cargo_E" name="cargo_E" value='{{"$emple->cargo"}}' class="form-control" placeholder="ingrese el apellido paterno" required><br>
                                <div>
                                	<a href="#tab-1" data-toggle="tab" class="btnAnterior_f btn btn-success" id="btn_ant1">Anterior</a>
                                </div>
                                <div>
                                    <a class="btnSiguiente_f btn btn-success" id="btn_sig2">Siguiente</a>
                                </div>

                        </div>
                                  

                        <div class="col-md-6 col-sm-6 col-xs-4">                           

                              

                                
                        </div>          
               </div>
                                <!-- FIN tab 2 FAMILIA-->

                                <!-- tab 3 SUELDO-->

            <div class="tab-pane fade " id="tab-3">
                 <div class="form-group">
                     <div class="col-md-6 col-sm-6 col-xs-8">                           

                              {!!Form::label('Salario:')!!}
                                <input type="text" id="salario_E" name="salario_E" value='{{"$emple->salario"}}' class="form-control" placeholder="ingrese el apellido paterno" required onblur='deleteError("salario_E")'><br>
                                <label for="disabledTextInput">Estatus</label>
                                    <select id="estatus_E" name="estatus_E" class="form-control text" onchange='deleteError("estatus_E")'>
                                    <option value="0">Seleccione Estatus</option>
                                        <option value="1">Medio tiempo</option>
                                        <option value="2">Tiempo Completo</option>
                                        
                                    </select>

                                    <label for="disabledTextInput">Carga Familiar</label>
                                    <select id="cargaFamiliar_E" name="cargaFamiliar_E" class="form-control text" onchange='deleteError("cargaFamiliar_E")'>
                                    <option value="0">Seleccione carga Familiar</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>

                                    </select>


                                <div>
                                    <a href="#tab-2" data-toggle="tab" class="btnAnteriror_S btn btn-success" id="btn_ant_2">Anterior</a>
                                    
                                </div>
                    </div>   
                </div>
            </div>
           
                                <!-- FIN tab 3 SUELDO-->
              
                
{!!Form::close()!!}
               @endforeach
        </div> <!--fin del div registro -->
     </div>
</div>
@endsection


@section('scripts')
<script>
        $("#btnactualizarE").click(function(){
            actualizar_empleado();
        });
        $(document).ready(function(){
            var genero =$('#genero2').val();
                estodoCivil=$('#estodoCivil2').val();
                estatus=$("#estatus2").val();
                cargar=$("#cargas2").val();
            $("#estadoCivil").val(estodoCivil);
            $("#estatus_E").val(estatus);
            $("#cargaFamiliar_E").val(cargar);
            if(genero=="Masculino"){
                $('#genderM').iCheck('check');
            }else{
                $('#genderF').iCheck('check');

            }

        });

        $("#btn_cancelar").click(function(){
            swal({   title: "Estás Seguro?", 
                     text: "Se lo rediccionara a la lista de empleados!",  
                     type: "warning",  
                     showCancelButton: true,  
                     confirmButtonColor: "#DD6B55",   
                     confirmButtonText: "Si, regresar!",   
                     closeOnConfirm: false }, 
                     function(){  
                      swal("Ok!", "Estamos regresando a la listas no se guardara nada", "success"); 
                        window.location="http://localhost:8000/welcomeAdmin/Empleados";

                  });
        });
        /*Validaci[on del Correo*/
        $('#correo_E').blur(function(){
            var correo = $("#correo_E").val();
            if(correo.indexOf('@') == -1 && correo.indexOf('.com') == -1 ){
                $('#correo_E').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado es invalido');
            }else if(correo.indexOf('@') == -1 ){
                $('#correo_E').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado le falta @');
            }else if(correo.indexOf('.com') == -1 ){
                $('#correo_E').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado debe terminar en .com');
            }else{
                $('#correo_E').removeClass('error');
                $('#span_mensaje_correo').html('');

            }
        }); // fin 

        

        $("#btn_sig1").click(function(){
            if($('#cedula').val()=="" && $('#apellidoPaterno').val()=="" && $('#apellidoMaterno').val()=="" && $("#nombre").val()=="" && $('#estadoCivil').val()==0 && $("#direccion_E").val()=="" && $("#correo_E").val()=="" && $("#telefono_E").val()==""){
                var animate_in = 'lightSpeedIn',
                animate_out = 'bounceOut';
                new PNotify({title: 'Alerta Faltan datos',text: 'Por favor! algunos campos estan vacios',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
                $('#cedula').addClass('error');
                $('#apellidoPaterno').addClass('error');
                $('#apellidoMaterno').addClass('error');
                $('#nombre').addClass('error');
                $('#estadoCivil').addClass('error');
                $('#direccion_E').addClass('error');
                $('#correo_E').addClass('error');
                $('#telefono_E').addClass('error');

            }else if($('#cedula').val()==""){
                $('#cedula').addClass('error');
                $('#span_cedula').addClass('error_span');
                $('#span_mensaje').html('Ingrese un número de cédula');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese un numero de cédula',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#apellidoPaterno').val()==""){
                $('#apellidoPaterno').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese su Apellido Paterno',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#apellidoMaterno').val()==""){
                $('#apellidoMaterno').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese su Apellido Materno',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#nombre').val()==""){
                $('#nombre').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese su Nombre ',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#estadoCivil').val()==0){
                $('#estadoCivil').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! seleccione un estado civil',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#direccion_E').val()==""){
                $('#direccion_E').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese su direccion de domicilio',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#correo_E').val()==""){
                $('#correo_E').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese el correo Electronico',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#telefono_E').val()==""){
                $('#telefono_E').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese el numero de telefono',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }
            else{
                $('#Tab_empleado a[href="#tab-2"]').tab('show');
            }

        });
        $("#btn_sig2").click(function(){
            if($('#cargo_E').val()==""){
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese el cargo del Empleado',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
                $('#cargo_E').addClass('error');
            }else{
                
                $('#Tab_empleado a[href="#tab-3"]').tab('show');

            }
        });

        $("#btn_ant1").click(function(){
            $("#tab_2").removeClass("active");
            $("#tab_1").addClass("active");
        });
        $("#btn_ant_2").click(function(){
            $("#tab_3").removeClass("active");
            $("#tab_2").addClass("active");
        });
        
        $(document).ready(function() {
            $("#btnGuardarEmpleado").click(function() {
                if($("#salario_E").val()==""|| $('#estatus_E').val()==0 || $('#cargaFamiliar_E')==0){
                    var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                        new PNotify({title: 'Alerta',text: 'Falta información por registrar',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                        });
                        $("#salario_E").addClass("error");
                        $('#estatus_E').addClass("error");
                        $('#cargaFamiliar_E').addClass("error");
                }else{
                    var Datos=new FormData($("#FormEmpleado")[0]);
                    var token=$("#token").val();
            $.ajax({
                type    :'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                url     :'{!!URL::route('saveEmple')!!}',
                headers :{'X-CSRF-TOKEN': token},
                data    :Datos,
                success:function(data){
                   if(data.registro=='true'){
                    swal("Empleado Registrado Correctamente..!!", "", "success");
                    
                   }else{
                    alert("error al registrar");
                   }
                    if (data.error_imagen=='true'){

                       alert("erroe al subir la imagen");
                    }
                }   
            });
            $('#FormEmpleado')[0].reset();
        }
            });
        });

        function actualizar_empleado(){
            var cedula =$("#cedula").val();
            var route  ="http://localhost:8000/welcomeAdmin/Empleados/actualizarEmpleado/"+cedula+"";
            var Datos=new FormData($("#FormEmpleado")[0]);
            var token  =$("#token").val();
             $.ajax({
                url: route,
                headers :{'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType:'json',
                contentType: false,
                processData: false,
                data    : Datos,
                success:function(res){
                if(res.sms=='ok'){
           swal("Actualizacion realizada Correctamente..!!", "Empleado", "success");
                    
                            window.location="http://localhost:8000/welcomeAdmin/Empleados";
                }else{
                    alert('no se pudo');
                }
        }
  });
        }
        

        function cargar_datos(id){
        var route="http://localhost:8000/UsuariosId/" +id+"";  
            $.get(route,function(res){
            $("#Usuario").val(res.tipoProducto);
        });
        }

        function deleteError(id){
        if($('#'+id).val()=="" || $('#'+id).val()==0){
        }else{
            $('#'+id).removeClass('error');
        }
        }
    </script>
@endsection