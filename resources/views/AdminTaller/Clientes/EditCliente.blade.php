@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-cliente.css')!!} 
@endsection
@section('content')
<style type="text/css">
    thead th{
        color:#333;
    }


    .moverbtn-act{
        margin-top: 25px;
    }
</style>
<h2>Clientes</h2>
<div class="panel panel-default">

    <div class="panel-body">
    @foreach($cliente as $client)

            <div class="col-md-12 registro">
                <div class="col-md-6 col-xs-12">
                     
                      {!!Form::open(['id'=>'FormClientes'])!!}
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                            <input  type="hidden" id="genero2" value="{{$client->sexo}}"> 
                            <input  type="hidden" id="estodoCivil2" value="{{$client->estadoCivil}}"> 
                                {!!Form::label('Cedula:')!!}
                                <input type="text" id="cedula" name="cedula" value='{{"$client->cedula"}}' class="form-control" placeholder="ingrese e numero de cedula" required disabled="false">
                                 <span id="span_cedula"></span>
                                <span id="span_mensaje" style="display: block;color: red;"></span>
                                {!!Form::label('Apellido Paterno:')!!}
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" value='{{"$client->apellidoPaterno"}}' class="form-control" placeholder="ingrese el apellido paterno" required>

                                {!!Form::label('Apellido Materno:')!!}
                                <input type="text" id="apellidoMaterno" name="apellidoMaterno" value='{{"$client->apellidoMaterno"}}' class="form-control" placeholder="ingrese el apellido paterno" required>

                                {!!Form::label('Nombres:')!!}
                                <input type="text" id="nombre" name="nombre" value='{{"$client->nombre"}}' class="form-control" placeholder="ingrese el apellido paterno" required>

                                {!!Form::label('Genero:')!!}<br>
                                Masculino:
                                <input type="radio" class="flat" name="genero" id="genderM" value="Masculino" checked="" required /> Femenino:
                                <input type="radio" class="flat" name="genero" id="genderF" value="Femenino" />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                                 <div class="form-group tamaño">
                                    <label for="disabledTextInput">Estado Civil</label>
                                    <select id="estadoCivil" name="estadoCivil" onchange='deleteError("estadoCivil")' class="form-control text">
                                        <option>Seleccione Estado Civil</option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Viudo">Viudo</option>
                                        <option value="Divorciado">Divorciado</option>
                                    </select>
                                </div>
                                    
                                {!!Form::label('Direccion:')!!}
                                <input type="text" id="direccion" name="direccion" value='{{"$client->direccion"}}' class="form-control" placeholder="ingrese el apellido paterno" required>
                                
                                <br>{!!Form::label('Fecha de Nacimiento:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                     <input type="text" id="fechaNacimiento" name="birthdate" value="10/24/1995" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
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
                                <input type="text" id="correo" name="correo" value='{{"$client->correo"}}' class="form-control" placeholder="ingrese el correo" required>
                                 <span id="span_correo"></span>
                                <span id="span_mensaje_correo" style="display: block;color: red;"></span>

                                {!!Form::label('Telefono:')!!}
                               <input type="text" id="telefono" name="telefono" value='{{"$client->telefono"}}' class="form-control" placeholder="ingrese el telefono" required>

                     {!!Form::close()!!}
                                <button type="button" class="moverbtn-act btn btn-danger btn_cancelar" id="btn_cancelarC">Cancelar</button>
                                {!!link_to('#', $title='Actualizar Datos del Cliente', $attributes =['id'=>'btn_ActualizarClientes', 'class'=>'moverbtn-act btn btn-success btn-act'], $secure= null)!!}              
                   
                </div>  
               
        </div> <!--fin del div registro -->
        @endforeach
     </div>
</div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function(){
         var genero =$('#genero2').val();
                estodoCivil=$('#estodoCivil2').val();
                
            $("#estadoCivil").val(estodoCivil);
            
            if(genero=="Masculino"){
                $('#genderM').iCheck('check');
            }else{
                $('#genderF').iCheck('check');

            }
    });
    $("#btn_ActualizarClientes").click(function(){
            actualizar_cliente();
        });
     $("#btn_cancelarC").click(function(){
            swal({   title: "Estás Seguro?", 
                     text: "Se lo rediccionara a la lista de Clientes!",  
                     type: "warning",  
                     showCancelButton: true,  
                     confirmButtonColor: "#DD6B55",   
                     confirmButtonText: "Si, regresar!",   
                     closeOnConfirm: false }, 
                     function(){  
                      swal("Ok!", "Estamos regresando a la listas no se guardara nada", "success"); 
                        window.location="http://localhost:8000/welcomeAdmin/Clientes";

                  });
        });
     /*Validación de la cedula*/
        $('#cedula').blur(function(){
            var cedula=$('#cedula').val();
            if(cedula==""){

            }else{
                var ruta="http://localhost:8000/welcomeAdmin/client/"+cedula;
                $.get(ruta,function(res){
                    if(res.sql=='Empleado'){
                        $('#span_mensaje').html('La cedula ingresada es de un empleado');
                    }else if(res.sql=='false'){
                        $('#cedula').removeClass('error');
                        $('#span_cedula').removeClass('error_span');
                        $('#span_mensaje').html('');
                    }else{
                        $('#cedula').focus();
                        $('#cedula').addClass('error');
                        $('#span_cedula').addClass('error_span');
                        $('#span_mensaje').html('La cedula ingresada ya existe');
                    }
                });
            }
        }); //fin
        /*Validaci[on del Correo*/
        $('#correo').blur(function(){
            var correo = $("#correo").val();
            if(correo.indexOf('@') == -1 && correo.indexOf('.com') == -1 ){
                $('#correo').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado es invalido');
            }else if(correo.indexOf('@') == -1 ){
                $('#correo').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado le falta @');
            }else if(correo.indexOf('.com') == -1 ){
                $('#correo').addClass('error');
                $('#span_mensaje_correo').html('El correo ingresado debe terminar en .com');
            }else{
                $('#correo').removeClass('error');
                $('#span_mensaje_correo').html('');

            }
        }); // fin 
        $(document).ready(function() {
            $("#btn_GuardarClientes").click(function() {
                if($('#cedula').val()=="" && $('#apellidoPaterno').val()=="" && $('#apellidoMaterno').val()=="" && $("#nombre").val()=="" && $('#estadoCivil').val()==0 && $("#direccion").val()=="" && $("#correo").val()=="" && $("#telefono").val()==""){
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
                $('#direccion').addClass('error');
                $('#correo').addClass('error');
                $('#telefono').addClass('error');

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
            }else if( $('#direccion').val()==""){
                $('#direccion').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese su direccion de domicilio',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#correo').val()==""){
                $('#correo').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese el correo Electronico',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else if( $('#telefono').val()==""){
                $('#telefono').addClass('error');
                var animate_in = 'lightSpeedIn', animate_out = 'bounceOut';
                new PNotify({title: 'Alerta',text: 'Por favor! ingrese el numero de telefono',
                             type: 'error',delay: 2500,
                             animate: {animate: true,in_class: animate_in,out_class: animate_out}
                });
            }else{
            var Datos=new FormData($("#FormClientes")[0]);
            var token=$("#token").val();
            $.ajax({
                type    :'post',
                url     :'{!!URL::route('saveClie')!!}',
                headers :{'X-CSRF-TOKEN': token},
                contentType: false,
                processData: false,
                data    : Datos,
                success:function(data){
                   if(data.registro=='true'){
                    alert("regitro correctamente");
                   }else{
                    alert("error al registrar");
                   }
                $('#FormClientes')[0].reset();
               }  
            });
        }
            });
        });
        

   
   function deleteError(id){
    if($('#'+id).val()=="" || $('#'+id).val()==0){
    
    }else{
            $('#'+id).removeClass('error');
       }
    }

    function actualizar_cliente(){
            var cedula =$("#cedula").val();
            var route  ="http://localhost:8000/welcomeAdmin/Clientes/actualizarCliente/"+cedula+"";
            var Datos=new FormData($("#FormClientes")[0]);
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
                    alert('Actualizacion correcta');
                            window.location="http://localhost:8000/welcomeAdmin/Clientes";
                }else{
                    alert('no se pudo');
                }
        }
  });
        }
        </script>


@endsection