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
                         @foreach($MateriasPrimas as $mate)         
                                
                         <div class="col-md-12 col-xs-12">
                              <label class="control-label" for="last-name">Material</label>
                                <select class="js-example-basic-single"  onclick="cargar_datos({{$mate->id}})" id="material" name="material"   placeholder="Nombre de Material" class="form-control">
                                <option>Seleccione Material</option>
                                  @foreach($MateriasPrimas as $mate)
                                    <option  value="{{$mate->id}}"> {{$mate->material}}</option>
                                     alert(id);
                                  @endforeach
                                </select >
                        </div><br>
                                
                                @foreach($MateriasPrimas as $mate)
                                <br>{!!Form::label('Precio:')!!}
                                {!!Form::text('precio',null,['id'=>'precio', 'value'=>'{{$mate->precio}}', 'class'=>'form-control','placeholder'=>'Ingrese Precio','required'=>''])!!}

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
                           

                              {!!link_to('#', $title='Devolver', $attributes =['id'=>'btn_GuardarMateriaPrima', 'class'=>'bt-guardar2 fa fa-floppy-o  btn btn-success btn-guardar btn-guardarMateria '], $secure= null)!!}              
                   
                </div>  
                              

                    {!!Form::close()!!}
                                         

                            
               
        </div> <!--fin del div registro -->
     </div>
</div>
 @endsection
 @section('scripts')
 <script>
 
        $(".js-example-basic-single").select2();

        $('#material').change(function(){
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

    $('#material').onclick(function(){
            var cantidad = $("#material").val();
            cargar_datos(cantidad);  
       });



                  
    
             </script>
@endsection