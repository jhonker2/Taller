@extends('Layouts.AdminMain')
@section('content')
<h2>Devolucion Materia Prima</h2>
<div class="panel panel-default">
<style> 
.bt-guardar2{
    margin-top: 25px;
}
</style>
    <div class="panel-body">
            <div class="col-md-12 registro">
                <div class="col-md-4 col-xs-3 ">
                     
                           {!!Form::open(['files'=>true,'id'=>'frmMateriasPrimas'])!!}
                      
                           <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                <div class="col-md-12 col-xs-12">
                                   <label class="control-label" for="last-name">Material</label>
                                    <select class="js-example-basic-single" onclick="cargar_datos(id)" id="material" name="material"   placeholder="Nombre de Material" class="form-control">
                                    <option>Seleccione Material</option>
                                      @foreach($MateriasPrimas as $mate)
                                        <option  value="{{$mate->id}}"> {{$mate->material}}</option>
                                        
                                      @endforeach
                                    </select >
                             </div><br>
                                  
                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio',null,['id'=>'precio', 'class'=>'form-control','placeholder'=>'Ingrese Precio','required'=>''])!!}

                                 {!!Form::label('Cantidad:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad',null,['id'=>'cantidad', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}
                                                          
                                {!!Form::label('Cantidad Medida:')!!}<style type="text/css">.tamanoMedida{width: 35%;}</style>
                                {!!Form::text('cantidad_medida',null,['id'=>'cantidad_medida', 'class'=>'form-control tamanoMedida','placeholder'=>'Ingrese cantidad de medidas','required'=>''])!!}

                                <div class="form-group lugarMedida"><style type="text/css"> .lugarMedida{margin-top: -58px;
                                margin-left: 135px;}</style>
                                    <label for="disabledTextInput">Unidad de Medida</label>
                                    <select id="unidadMedida" name="unidadMedida" class="form-control text">
                                        <option>Seleccione Unidad de Medida</option>
                                        <option value="Metros">Metros</option>
                                        <option value="Unidades">Unidades</option>
                                        <option value="Paquetes">Paquetes</option>
                                         <option value="Litros">Litros</option>
                                    </select>
                                </div>
                               
                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock',null,['id'=>'stock', 'class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'=>''])!!}

                                {!!Form::label('Descripcion:')!!}
                                {!!Form::text('descripcion',null,['id'=>'descripcion', 'class'=>'form-control','placeholder'=>'Ingrese Descripcion de Producto','required'=>''])!!}

                              {!!link_to('#', $title='Devolver', $attributes =['id'=>'btn_GuardarMateriaPrima',  'class'=>'bt-guardar2 fa fa-floppy-o  btn btn-success btn-guardar  btn-guardarMateria '], $secure= null)!!}              
                   
                </div>  
                              

                    {!!Form::close()!!}
           
        </div> <!--fin del div registro -->

        <!--  REGISTRAR DEVOLUCION DESDE FACTURAATERIA PRIMA-->

<div class="modal fade" id="myModal_ActualizarClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registrar Clientes</h4>
        </div>
      <div class="modal-body">
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
      </div><!--Fin del modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!!link_to('#', $title='Guardar Cliente', $attributes =['id'=>'GuardarClientes', 'class'=>'btn btn-success btn-guardar'],  $secure= null)!!}
         {!!Form::close()!!}
      </div>  <!--Fin del modal-footer -->
    </div><!--Fin del modal-content -->
  </div>
</div> 
 
       <!--  </div> -->
     
<!--FINALIZACION DE REGISTRO DE DEVOLUCION -->

     </div>
</div>
@endsection
 @section('scripts')
 <script>

$(".js-example-basic-single").select2();

$(document).ready(function() {

             

             $('#material').change(function(){
                    var cantidad = $("#material").val();
                    cargar_datos(cantidad);  
               });

             $("select#unidadMedida").on('change',function() {
                if ($('#unidadMedida').val()=="Metros") {
                   var cantidad= $('#cantidad').val();
                   var cantidad_medida= $('#cantidad_medida').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock').val(stock_total_M);
               }
             });

             $("select#unidadMedida").on('change',function() {
                if ($('#unidadMedida').val()=="Metros") {
                   var cantidad= $('#cantidad').val();
                   var cantidad_medida= $('#cantidad_medida').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock').val(stock_total_M);
               }
             });

             $("select#unidadMedida").on('change',function() {
                if ($('#unidadMedida').val()=="Unidades") {
                   var cantidad= $('#cantidad').val();
                   var cantidad_medida= $('#cantidad_medida').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock').val(stock_total_M);
               }
             });

             $("select#unidadMedida").on('change',function() {
                if ($('#unidadMedida').val()=="Paquetes") {
                   var cantidad= $('#cantidad').val();
                   var cantidad_medida= $('#cantidad_medida').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock').val(stock_total_M);
               }
             });

             $("select#unidadMedida").on('change',function() {
                if ($('#unidadMedida').val()=="Litros") {
                   var cantidad= $('#cantidad').val();
                   var cantidad_medida= $('#cantidad_medida').val();
                   var stock_total_M =cantidad*cantidad_medida;
                   $('#stock').val(stock_total_M);
               }
             });

            
              $('#material').onclick(function(){
                      var cantidad = $("#material").val();
                      cargar_datos(cantidad);  
                 });

              function cargar_datos(id){
            var route="http://localhost:8000/welcomeAdmin/MateriasPrimas/" +id+"/edit"; 
            $.get(route,function(res){
              $("#IdMateriaPrima").val(res.id)
              $("#material").val(res.material);     
              $("#precio").val(res.precio);
              $("#cantidad").val(res.cantidad);
              $("#cantidad_medida").val(res.cantidad_medida);
              $("#unidadMedida").val(res.unidadMedida);
              $("#stock").val(res.stock);
              $("#descripcion").val(res.descripcion);
              });
            }



            $("#btn_GuardarMateriaPrima").click(function() {
           
            var Datos=new FormData($("#frmMateriasPrimas")[0]);
            var token=$("#token").val();
            $.ajax({
                type    :'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                url     :'{!!URL::route('saveMatePri')!!}',
                headers :{'X-CSRF-TOKEN': token},
                data    :Datos,
                success:function(data){
                   if(data.registro=='true'){
                   swal("Materia Prima Registrada Correctamente..!!", "", "success");
                   }else{
                    swal("Error al registrar..!!", "", "success");
                   }
                }   
            });
            $('#frmMateriasPrimas')[0].reset();
            });
        });
             </script>
@endsection