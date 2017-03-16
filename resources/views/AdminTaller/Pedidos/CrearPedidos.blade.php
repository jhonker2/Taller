<style type="text/css">

    .mover{
            margin-left: 390px !important;
    }
    .centrar{
        margin-left: 25% !important;
    }
    .tabla{
    margin-top: 10px;
    }

    .moverMaterial{
        margin-left: -44px !important;
    }
  

    .btn-add{
    position: absolute;
    margin-top: -30px  !important;
    margin-left: 150px !important;
    }

    @media (max-width: 690px){
      .btn-add{
      margin-top: 0px !important;
      margin-left: 115px !important;
      }       
    }

</style>
@extends('Layouts.AdminMain')
@section('content')
<div class="page-title">
         <!-- page content -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" align="center">
                  <div class="x_title ">
                    <h2 class="centrar">Taller "ZAMBRANO"<br>SOLICITUD DE PEDIDO</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <form id="formPedidos" data-parsley-validate class="form-horizontal form-label-left" >
                    <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 

                    <div class="container">   
                      <div class="col-md-6 col-xs-12 col-md-offset-2">
                        <div class="col-md-12 col-xs-12">
                          <label class="control-label" for="last-name">Material</label>
                            <select class="js-example-basic-single" id="material" name="material"  placeholder="Nombre de Material" class="form-control">
                            <option>Seleccione Material</option>
                              @foreach($Materiales as $mate)
                                <option value="{{$mate->id}}"> {{$mate->material}}</option>
                              @endforeach
                            </select >
                        </div>
                      <div class="col-md-6 col-xs-6">
                            <label class="control-label" for="last-name">Cantidad <span class="required">: </span>
                            </label>
                            <input type="text" id="cantidad" name="cantidad" required="required" placeholder="Cantidad de material" class="form-control ">
                      </div>
                      <div class="col-md-6 col-xs-6">
                          <label class="control-label " for="last-name">Unidad de medidas<span class="required">: </span></label>
                                <select id="unidadMedida"    class="form-control text moverUnidad">
                                        <option>Seleccione Unidad de Medida</option>
                                        <option value="Metros">Metros</option>
                                        <option value="Unidades">Unidades</option>
                                        <option value="Paquetes">Paquetes</option>
                                </select>
                      </div>

                      <div class="col-md-6 col-xs-6">
                        <div class="control-group">
                            <div class="controls ">
                                <label class="control-label ">Fecha de Entrega</label>
                                  <div class="control-label xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal5" name="fechaEntrega" placeholder="Fecha Entrega" aria-describedby="inputSuccess2Status4">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                  </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-xs-6">
                        <div class="control-group">
                            <div class="controls">
                                <label class="control-label">Fecha del Pedido</label>
                                
                                  <div class="control-label xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal4" name="fechaPedido" placeholder="Fecha Pedido" aria-describedby="inputSuccess2Status4">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                  </div>
                            </div>
                        </div>
                        <button type="button" id="AgregarMateriaTabla" class="btn btn-primary fa fa-plus btn-add"></button>
                      </div>
                    </div>    
                  </div>
                                       
                  <div class="form-group tabla">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><span class="required"></span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="text-muted font-13 m-b-30">Materias Primas</p>
                          <table id="tableAgregarMateriaP" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Cantidad</th>
                                <th>Material</th>
                                <th>Unidades</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                        
                            </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Elaborado Por <span class="required">: </span></label>
                      <div class="col-md-3 col-sm-2 col-xs-12">
                        <input type="text" id="last-name" name="elaboradoPor" value="{{Auth::user()->user}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Autorizado Por :</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" placeholder="Nombre de empleado Encargado de Bodega" type="text" name="autorizadoPor">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Encargado de Bodega<span class="required">:</span></label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                      <div class="col-md-12 col-xs-12">
                          
                            <select class="js-example-basic-single" id="encargadoBodega" name="encargadoBodega"  placeholder="Nombre de Material" class="form-control">
                            <option>Seleccione Empleados</option>
                              @foreach($Empleados as $emp)
                                <option value="{{$emp->id}}"> {{$emp->nombre}}</option>
                              @endforeach
                            </select >
                        </div>
                       
                      </div>
                  </div>
                  <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <button type="button" id="btn_solicitud" name="btn_guardarPedido" class="btn btn-success mover">Realizar Pedido</button>
                      </div>
                      <div class="col-md-1">
                        <button type="button" id="btn_solicitud" class="btn btn-danger">Cancelar</button>
                      </div>
                    </div>
                    </form>
                  </div>
        <!-- /page content -->
        </div>                
      </div>
    </div>
</div>    
              <!-- fin del x_content -->            
@endsection

@section('scripts')
<script type="text/javascript">


   $(".js-example-basic-single").select2();

   
    $('#single_cal4').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
           $('#single_cal4').val(start.format('YYYY-MM-DD') );
        });

    $('#single_cal5').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#single_cal5').val(start.format('YYYY-MM-DD') );
        });


       $('#AgregarMateriaTabla').click(function(){
       
        nfila = $("#tableAgregarMateriaP tbody").find("tr").length; //contamos el numero de filas
        nfila = nfila+1;
               
        var cantidad = $('#cantidad').val();
        var material = $('#material option:selected').text();
        var idmaterial=$('#material').val();
        var unidadMedida =$('#unidadMedida option:selected').text();
         
        var y=0;

        for (var x=1; x<=nfila; x++){
           
          if ($("#codigo"+x).val()==idmaterial){
           cant=(parseFloat($('#cantidad'+x).html())+parseFloat(cantidad));
            $('#cantidad'+x).html(cant);
          y=y+1;
          }
        }

        if(y==0){
          cadena = "<tr>";
          cadena = cadena + "<td><p id='cantidad"+nfila+"'> "+cantidad+"</p></td>";
          cadena = cadena + "<td>"+ material+"</td>";
          cadena = cadena + "<td> <input type='hidden' value='"+idmaterial+"'  id='codigo"+nfila+"'><p id='unidadMedida"+nfila+"'>"+ unidadMedida +"</p></td>";
          cadena = cadena + "<td><button type='button' id='del' name='del' class='elimina btn btn-default form controls orden fa fa-times'></button></td>";  
          $("#tableAgregarMateriaP tbody").append(cadena);
        }
        eliminarItem();
        });

       function cargar_datos(id){
       
          var route="http://localhost:8000/welcomeAdmin/Solicitar/"+id+"";  
          $.get(route,function(res){
            $("#unidadMedida").val(res.unidadMedida);
     
    })
    }

    $('#material').change(function(){
            var cantidad = $("#material").val();
            cargar_datos(cantidad);  
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


 /*boton Guardar*/
    $('#btn_solicitud').click(function(){
            var Datos=new FormData($("#formPedidos")[0]);
            var token=$("#token").val();
            alert(Datos);
             $.ajax({
                url:'{!!URL::route('saveSoliPe')!!}',
                headers :{'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                contentType: false,
                data    : Datos,
                processData: false,
                success:function(data){
                    if(data.registro=='true'){
                      nfila = $("#tableAgregarMateriaP tbody").find("tr").length; //contamos el numero de filas
                        var val=0;
                     
                      for (var x=1; x<=nfila; x++){
                        var idmaterial = $("#codigo"+x).val();
                        var cantidad = $("#cantidad"+x+"").html();
                        var unidadMedida= $("#unidadMedida"+x+"").html();
                              $.ajax({
                                url:'{!!URL::route('savedetSoli')!!}',
                                headers :{'X-CSRF-TOKEN': token},
                                type: 'POST',
                                dataType: 'json',
                                data    : {idmaterial:idmaterial,cantidad:cantidad,unidadMedida:unidadMedida},
                                success:function(data){
                                    if(data.registro=='true'){
                                      swal("Solicitud Registrada Correctamente..!!", "", "success");
                                     }
                                     
                                    }
                                  });
                                }
                              
                              }  
                              }  
                            });
                          });
                        
    function guardarDetalleMateriaPro(){



    }

    $('#btn_guardarDetallePedido').click(function(){
           var Datos=new FormData($("#formPedidos")[0]);
            var token=$("#token").val();
            alert(Datos);
             $.ajax({
                url:'{!!URL::route('saveRol')!!}',
                headers :{'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                contentType: false,
                data    : Datos,
                processData: false,
                success:function(data){
                    if(data.registro=='ok'){
                    swal("De Registrada Correctamente..!!", "", "success");
                    window.location='http://localhost:8000/welcomeAdmin/SolicitarPedidos';
                       }
               }
            });
    });


</script>
<style type="text/css">
  
  .orden{
    margin-top: 0px;
    margin-left: 0px;
  }
  .tamanoAutocompletar{
       
    width: 180% !important;
  }
</style>
@endsection
