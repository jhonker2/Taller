@extends('Layouts.AdminMain')
@section('content')
<h2>Maquinaria</h2>
<div class="panel panel-default">

    <div class="panel-body">
            <div class="col-md-12 registro">
                <div class="col-md-6">
                     
                      {!!Form::open(['id'=>'FormMaquinarias'])!!}
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                {!!Form::label('Maquina:')!!}
                                {!!Form::text('maquina',null,['id'=>'maquina','style="text-transform:uppercase;"','onkeyup="javascript:this.value=this.value.toUpperCase();"','class'=>'form-control','placeholder'=>'Ingrese nombre de Maquinaria','required'=>''])!!}


                                {!!Form::label('Marca:')!!}
                                {!!Form::text('marca',null,['id'=>'marca', 'class'=>'form-control','placeholder'=>'Ingrese marca de Maquinaria','required'=>''])!!}

                                {!!Form::label('Modelo:')!!}
                                {!!Form::text('modelo',null,['id'=>'modelo', 'class'=>'form-control','placeholder'=>'Ingrese modelo de maquinaria','required'=>''])!!}


                                {!!Form::label('Stock:')!!}
                                {!!Form::text('stock',null,['id'=>'stock', 'class'=>'form-control','placeholder'=>'Ingrese stock de maquinaria','required'=>''])!!}

                                {!!Form::label('Precio:')!!}
                                {!!Form::text('precio',null,['id'=>'precios', 'class'=>'form-control','placeholder'=>'Ingrese precio de maquinaria','required'=>''])!!}

                                

                              <br>{!!Form::label('Fecha de Ingreso:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                     <input type="text" id="fechaIngreso" name="fechaIngreso" value="10/24/2020" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
                                </div>
 
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="fechaIngreso"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });
                                        });
                                        </script><br>


                                        <br>{!!Form::label('Fecha de Deterioro:')!!}
                                    <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;     width: 51%;">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                         <input type="text" id="fechaDeteriorio" name="fechaDeteriorio" value="10/24/2020" style="border: 0px;    width: 64%;" /> <b class="caret"></b>
                                   </div>

                                   <div class="form-group">
                                            <label for="disabledTextInput">Empleado</label>
                                            <select id="idEmpleado" name="idEmpleado" class="form-control text">
                                            <option>Seleccione Empleado</option>
                                            @foreach($empleados as $empl)
                                                <option value="{{$empl->id}}"> {{$empl->nombre}}</option>
                                            @endforeach
                                            </select>
                                    </div>
 
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="fechaDeteriorio"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            });



                                        });

                                        </script><br>

                                        {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_GuardarMaquinarias', 'class'=>'btn btn-success btn-guardar'], $secure= null)!!}                                                 
                        </div>
                        
                        {!!Form::close()!!}
                                          
                                               
        </div> <!--fin del div registro -->
     </div>
</div>
@endsection

@section('scripts')
    <script>
     
     function mayuscula(campo){
                $(campo).keyup(function() {
                               $(this).val($(this).val().toUpperCase());
                });
             }

        $(document).ready(function() {
            $("#btn_GuardarMaquinarias").click(function() {
             mayuscula("input#maquina"); 
            var Datos=new FormData($("#FormMaquinarias")[0]);
            var token=$("#token").val();
            $.ajax({
                type    :'post',
                url     :'{!!URL::route('saveMaqui')!!}',
                headers :{'X-CSRF-TOKEN': token},
                contentType: false,
                processData: false,
                data    : Datos,
                success:function(data){
                   if(data.registro=='true'){
                    swal("Maquinaria Registrada Correctamente..!!", "", "success");
                    $('#FormMaquinarias')[0].reset();
                   }else{
                    alert("error al registrar");
                   }
               }  
            });
            });
        });
        

    function cargar_datos(id){
    var route="http://localhost:8000/UsuariosId/" +id+"";  
    $.get(route,function(res){
      $("#Usuario").val(res.tipoProducto);

    })
    }
        </script>


@endsection