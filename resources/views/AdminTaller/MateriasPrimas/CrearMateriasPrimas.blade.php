@extends('Layouts.AdminMain')
@section('content')
<h2>Materia Prima</h2>
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
                                 
                                {!!Form::label('Material :')!!}
                                {!!Form::text('material',null,['id'=>'material', 'class'=>'form-control','placeholder'=>'Ingrese Material','required'=>''])!!} 
             
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

                              {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_GuardarMateriaPrima', 'class'=>'bt-guardar2 fa fa-floppy-o  btn btn-success btn-guardar btn-guardarMateria '], $secure= null)!!}              
                   
                </div>  
                              

                    {!!Form::close()!!}
                                         

                            
               
        </div> <!--fin del div registro -->
     </div>
</div>
@endsection
 @section('scripts')
 <script>

$(document).ready(function() {

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