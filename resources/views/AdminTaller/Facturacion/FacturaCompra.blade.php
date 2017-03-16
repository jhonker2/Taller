@extends('Layouts.AdminMain')
@section('estilos')
{!!Html::style('admin/css/Taller-factura.css')!!} 

@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title tamanoTitulo">
        <br><h2 class=""><img src="{{asset('admin/images/calculadora3.jpg')}}"> REGISTRO DE COMPRAS DE MATERIA PRIMA </h2>
          <ul class="nav navbar-right panel_toolbox">
            <a class="moverGenerarFactura    btn btn-success" id="GuardarFactura" name="GuardarFactura">Generar Compra</a>
          </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <div class="col-md-7">
        <div class="x_panel">
          <div class="x_title">
            <h2>Datos de Materiales</h2> 
            <ul class="nav navbar-right panel_toolbox">
            
          </ul>
            <div class="clearfix"></div>
             
          </div>

          <form id="formfactura" data-parsley-validate class="form-horizontal form-label-left" >
                    <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
          <div class="container">
            
             <div class="col-md-12 col-xs-12">
                 <div class="col-md-8 col-xs-12">
                          <label class="control-label" for="last-name">Material</label>
                            <select class="js-example-basic-single" id="material" name="material"  placeholder="Nombre de Material" class="form-control">
                            <option>Seleecione Material</option>
                              @foreach($Materiales as $mate)
                                <option value="{{$mate->id}}"> {{$mate->material}}</option>
                              @endforeach
                            </select >
                 
                <div class="col-md-6 col-xs-12">
                    <label class="control-label" for="last-name">Precio <span>: </span>
                    </label>
                    <input type="text" id="precio" name="precio" placeholder="Precio" class="form-control ">
                </div>
                <div class="col-md-6 col-xs-12">
                   <label class="control-label" for="last-name">Stock <span class="required">: </span>
                  </label>
                   <input type="text" id="stock" name="stock" required="required" placeholder="Stock" class="form-control ">
                </div> 
              </div>
                <div class="col-md-4 col-xs-12">
                    <button type="button" id="AgregarMaterialPrimas" class=" moverAnadirMateriales btn btn-primary  btn-add"> <img src="{{asset('admin/images/addMaterial.png')}}"></button>
                </div>                                   
              </div>    
             </div>

          </div>
      

        <div class="x_panel">
          <div class="x_title">
            <h2></h2>
            <div class="clearfix"></div>
            </div>
          <div class="x_content">
              <table id="tableAgregarMateriaPrimaTable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Cantidad</th>
                          <th>Material</th>
                          <th>Precio Unitario</th>
                          <th>Subtotal</th>
                          <th>Opciones</th>

                          </tr>
                      </thead>
                      <tbody>
                                          
                      </tbody>
                </table>      
          </div>
        </div>

  

      </div>              
      <div class="col-md-5">
        <div class="x_panel">
          <div class="x_content">
               <div class="x_content">
                    <textarea class="imprimirTotal" cols="" id="imprimirTotal" rows="2" style=""></textarea>    
               </div>

            </div>
           </div>
            <div class="x_panel">
          <div class="x_content">
            <h2></h2>                        
                                                    
                            <div class="col-md-6 col-xs-6">
                              <label class="control-label " for="last-name">Factura #<span class="required">: </span>
                              </label>
                              @foreach($numFact as $num)
                               <input type="text" id="idFaactura" placeholder="" name="idFaactura"  value="
                               00000{{$num->id+1}}" required="required" class="">
                              @endforeach
                           </div>
                           <div class="col-md-6 col-xs-6">
                              <label class="control-label " for="last-name">Fecha Entrega <span class="required">: </span>
                              </label>
                               <div class="control-label xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" placeholder="Fecha Entrega" aria-describedby="inputSuccess2Status4">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                  </div>
                            </div>
          </div>        
        </div>
        <div class="x_panel">
          <div class="x_content">
             <div class="col-md-12 col-xs-12">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Proveedores:</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group demo2">
                        <select class="js-example-basic-single " id="idCliente" name="idCliente"  placeholder="Nombre de Cliente">
                       @foreach($Proveedores as $prove)
                          <option> Seleccione Empresa</option>
                          <option value="{{$prove->id}}">{{$prove->nombreEmpresa}}</option>
                      @endforeach
                    </select >
                            <span class="input-group-addon"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal_ActualizarClientes"><li class="fa fa-user"></li></button></span>
                      </div>
                    </div>
                </div>

            <div class="col-md-4 col-xs-12">
                              <label class="control-label " for="last-name">Repartidor<span  class="required">: </span>
                              </label>
                               <input type="text" id="repartidor" name="repartidor" placeholder="Nombre de Repartidor" name="repartidor"  required="required">
                           </div>
                           <div class="col-md-4 col-xs-12">
                              <label class="control-label " for="last-name">Descripcion<span class="required">: </span>
                              </label>
                               <input type="text" id="descripcionCarro" name="descripcionCarro" placeholder="Descripcion Carro" name="placa" required="required" class="">
                            </div>
            
          </div>
        </div> 
      </div> 

        <div class="x_panel">
          <div class="x_content">
            
                            <div class="form-group">
                              <label class="control-label " for="last-name">Subtotal <span class="required">: </span>
                              </label>
                               <input type="text" id="Subtotal2" name="Subtotal2" value="" required="required" class="centrarSubtotal">
                            </div>

                             <div class="form-group">
                              <label  class="control-label " for="last-name">Iva 12 %<span class="required">: </span>
                              </label>
                               <input type="text" id="iva12" name="iva12" value="12" required="required" class="centrarIva12">
                               <input type="hidden" id="iva0" name="iva0" value="0" required="required" class="">
                            </div>

                             <div class="form-group">
                              <label class="control-label " for="last-name">Descuento <span class="required">: </span>
                              </label>
                               <input type="text" id="descuento" name="descuento" value="0" required="required" class="centrarDescuento">
                            </div>

                            <div class="form-group color">
                              <label class="control-label " for="last-name">Total a Pagar <span class="required">: </span>
                              </label>
                               <input type="text" id="totalPagar" name="totalPagar" value="" required="required" class="centrartotalPagar">
                            </div>
                        </div>
                    </div>
                </div>
                </div>

              </div>
                  
          <div class="x_content">
                    
         
   


<!--  REGISTRAR CLIENTE DESDE FACTURA-->

<div class="modal fade" id="myModal_ActualizarClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Clientes</h4>
      </div>
      <div class="modal-body">
          
         
        
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input  type="hidden" name="" value="" id="IdCliente">  
            
                        <div class="col-md-6 col-sm-6 col-xs-4">
                                {!!Form::open(['id'=>'FormClientes'])!!}

                                <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 <input  type="hidden" name="" value="" id="IdCliente"> 

                                {!!Form::label('Cedula:')!!}
                                {!!Form::text('cedula',null,['id'=>'cedula', 'class'=>'form-control','placeholder'=>'Ingrese el numero de cedula','required'=>''])!!}

                                {!!Form::label('Apellido Paterno:')!!}
                                {!!Form::text('apellidoPaterno',null,['id'=>'apellidoPaterno', 'class'=>'form-control','placeholder'=>'Ingrese el apellido Paterno del Empleado','required'=>''])!!}

                                {!!Form::label('Apellido Materno:')!!}
                                {!!Form::text('apellidoMaterno',null,['id'=>'apellidoMaterno', 'class'=>'form-control','placeholder'=>'Ingrese el apellido Materno del Empleado','required'=>''])!!}

                                {!!Form::label('Nombres:')!!}
                                {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de Empleado','required'=>''])!!}

                                {!!Form::label('Genero:')!!}<br>
                                {!!Form::label('Masculino:')!!}
                                {!!Form::radio('sexo','Masculino',false,['id'=>'sexo'])!!}
                                {!!Form::label('Femenino:')!!}
                                {!!Form::radio('sexo','Femenino',false,['id'=>'sexo'])!!}<br>    
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-4">
                                <div class="form-group tamaño">
                                    <label for="disabledTextInput">Estado Civil</label>
                                    <select id="estadoCivil" name="estadoCivil" class="form-control text">
                                        <option>Seleccione Estado Civil</option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Viudo">Viudo</option>
                                        <option value="Divorciado">Divorciado</option>
                                    </select>
                                </div>
                                    
                                {!!Form::label('Direccion:')!!}
                                {!!Form::text('direccion',null,['id'=>'direccion', 'class'=>'form-control','placeholder'=>'Ingrese la direccion','required'=>''])!!}
                                
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

                                <br><br><label for="Correo" class="marginTop">Correo</label>
                                {!!Form::text('correo',null,['id'=>'correo', 'class'=>'form-control','placeholder'=>'Ingrese el Correo','required'=>''])!!}

                                {!!Form::label('Telefono:')!!}
                                {!!Form::text('telefono',null,['id'=>'telefono', 'class'=>'form-control','placeholder'=>'Ingrese el telefono','required'=>''])!!}    
                      </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Guardar Cliente', $attributes =['id'=>'GuardarClientes', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
         {!!Form::close()!!}
      </div>
    </div>
  </div>
</div> 
 </div>
        </div>
     
<!--FINALIZACION DE REGISTRO DE CLIENTE -->

@endsection

@section('scripts')

<script type="text/javascript">

$(".js-example-basic-single").select2();
  

$('#AgregarMaterialPrimas').click(function(){
        
        nfila = $("#tableAgregarMateriaPrimaTable tbody").find("tr").length; //contamos el numero de filas
        nfila=nfila+1;
               
        var material = $('#material option:selected').text();
        var idMaterial =$('#material').val();
        var precio = $('#precio').val();
        var stock =$('#stock').val();
        var y=0;

        for (var x=1; x<=nfila; x++){
           if ($("#codigo"+x).val()==idMaterial){
            var cantidad = parseFloat($('#cantidad'+x).val());
            cant=(parseFloat($('#cantidad'+x).val())+parseFloat(cantidad));
            $('#cantidad'+x).html(cant);
          y=y+1;
          }
        }
        if(y==0){
          
    cadena = "<tr>";
    cadena = cadena + "<td><input type='text' class='cantidad tamanoCantidad input_tabla' id='cantidad"+nfila+"' onblur='subtotal("+nfila+")' name='cantidad'></td>";
    cadena = cadena +"<td><input type='hidden' value='"+idMaterial+"' id='codigo"+nfila+"'><p id='material'"+nfila+"'>"+ material +"</p></td>";
    cadena = cadena + "<td><p id='codigo"+nfila+"'></p><p id='precio"+nfila+"'>"+precio+"</p></td>";
    cadena = cadena + "<td><input type='text' class='input_tabla2' id='subtotal"+nfila+"' name='subtotal'></td>";
    cadena = cadena + "<td><button type='button' id='del' name='del' class='orden elimina btn btn-default form controls  fa fa-times'></button></td>";
         $("#tableAgregarMateriaPrimaTable tbody").append(cadena);
        }
        eliminarItem();
       
        });


         function subtotal(x){
             
              var cantidad = parseFloat($('#cantidad'+x).val());
              var precio =   parseFloat($('#precio'+x).html());
              subtotal1= cantidad*precio;
              
              $('#subtotal'+x).val(subtotal1);
              $('#Subtotal2').val(subtotal1);
              $('#imprimirTotal').val(subtotal1);
              CalcularTotal(x);
              }


            function CalcularTotal(x){
              
              var total1 = 0 ; 
              nfila = $("#tableAgregarMateriaPrimaTable tbody").find("tr").length;
              for (var x=1; x<=nfila; x++){
              var subtotal = parseFloat($('#subtotal'+x).val());
              total1 = total1 + subtotal;
          
              $('#Subtotal2').val(total1);
              $('#imprimirTotal').val(total1);
              
              var totalPagar=total1*0.12; 
              var totalPagar1=totalPagar+total1;

              
              $('#totalPagar').val(totalPagar1);
              $('#imprimirTotal').val(totalPagar1);

              }
            }  

            function calcularTotalConIva(){


            }       

           function cargar_datos(id){
            var route="http://localhost:8000/welcomeAdmin/FacturaComp/"+id+"";  
             $.get(route,function(res){
            $("#precio").val(res.precio);
            $("#stock").val(res.stock);
       });
    }

    $('#material').change(function(){
            var id = $("#material").val();
            cargar_datos(id);  
       });

    function eliminarItem(){

    $("button.elimina").click(function(){
      alert("listo");
            // Obtenemos el total de columnas (tr) del id "tabla"
            id = $(this).parents("tr").find("td").eq(0).html();
            respuesta = confirm("Desea quitar este producto:"+id);
            if(respuesta){
              $(this).parents("tr").fadeOut("normal",function(){
              $(this).remove();
              alert("Producto"+id+"retirado de la cesta");
            })
          }
        });
  }

  $(document).ready(function() {
            $("#GuardarClientes").click(function() {
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
               }  
            });
            $('#FormClientes')[0].reset();
            });
        });

  $('#fecha').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $("#fecha").val(start.format('YYYY-MM-DD') );
        });

  $('#iva12').blur(function() {
              var iva12 = $("#iva12").val();
              var total1 = parseFloat($("#Subtotal2").val());
              alert(iva12);
              alert(Subtotal2);
              var totalPagar=(total1*iva12)/100; 
              var totalPagar1=totalPagar+total1;
              $('#totalPagar').val(totalPagar1);
              $('#imprimirTotal').val(totalPagar1);
          });


  $('#GuardarFactura').click(function(){
            var Datos=new FormData($("#formfactura")[0]);
            var token=$("#token").val();
            alert(Datos);
             $.ajax({
                url:'{!!URL::route('saveFactCom')!!}',
                headers :{'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                contentType: false,
                data    : Datos,
                processData: false,
                success:function(data){
                    if(data.registro=='true'){
                      nfila = $("#tableAgregarMateriaPrimaTable tbody").find("tr").length; //contamos el numero de filas
                        var val=0;
                     
                      for (var x=1; x<=nfila; x++){
                        var material = $("#codigo"+x).val();
                        var cantidad = $("#cantidad"+x+"").val();
                        var precio= $("#precio"+x+"").html();
                        var subtotal= $("#subtotal"+x+"").val();
                         sumarStock(material,cantidad); 
                              $.ajax({
                                url:'{!!URL::route('saveDetFactCom')!!}',
                                headers :{'X-CSRF-TOKEN': token},
                                type: 'POST',
                                dataType: 'json',
                                data    : {material:material,cantidad:cantidad,precio:precio,subtotal:subtotal},
                                success:function(data){
                                    if(data.registro=='true'){
                                     }
                                     
                                    }
                                  });
                                }
                              swal("Factura Registrada Correctamente..!!", "", "success");
                              window.location="http://localhost:8000/welcomeAdmin/FacturaCompra";
                              }  
                              }  
                            });
                          });

  function sumarStock(id,cantidad){
      var route="http://localhost:8000/welcomeAdmin/FacturaC/"+id+""; 
      var token=$("#token").val();
       $.ajax({
                type    :'post',
                url     :route,
                headers :{'X-CSRF-TOKEN': token},
                data:{cantidad:cantidad},
                success:function(data){
                   if(data.Actualizado=='true'){
                    
                   }else{
                    alert("error al actualizar");
                   }
               }  
            });

  }

</script>
@endsection

