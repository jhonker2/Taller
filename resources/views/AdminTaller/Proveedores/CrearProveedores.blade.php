@extends('Layouts.AdminMain')
@section('content')
<h2>Proveedores</h2>
<div class="panel panel-default">
<style>
    
    .moverbtn{
            margin-top: 25px;
    }
</style>
    <div class="panel-body">
            <div class="col-md-12 registro">
                <div class="col-md-6">
                     
                     {!!Form::open(array('url'=>'','class'=>'frmProvee','method'=>'POST'))!!}
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                {!!Form::label('Nombre de empresa:')!!}
                                {!!Form::text('nombreEmpresa',null,['id'=>'nombreEmpresa', 'class'=>'form-control','placeholder'=>'Ingrese Nombre de Empresa','required'=>''])!!}

                                {!!Form::label('Ruc:')!!}
                                {!!Form::text('ruc',null,['id'=>'ruc', 'class'=>'form-control','placeholder'=>'Ingrese Ruc de la empresa','required'=>''])!!}

                                {!!Form::label('Direccion:')!!}
                                {!!Form::text('direccion',null,['id'=>'direccion', 'class'=>'form-control','placeholder'=>'Ingrese Direccion de la empresa','required'=>''])!!}

                                {!!Form::label('Telefono:')!!}
                                {!!Form::text('telefono',null,['id'=>'telefono', 'class'=>'form-control','placeholder'=>'Ingrese Telefono de la empresa','required'=>''])!!}

                                {!!Form::label('Correo:')!!}
                                {!!Form::text('correo',null,['id'=>'correo', 'class'=>'form-control','placeholder'=>'Ingrese Correo de la empresa','required'=>''])!!}

                                {!!Form::label('Representante:')!!}
                                {!!Form::text('representante',null,['id'=>'representante', 'class'=>'form-control','placeholder'=>'Ingrese Representante de la empresa','required'=>''])!!}


                     {!!Form::close()!!}

                                {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_GuardarProveedor', 'class'=>'moverbtn btn btn-success btn-guardar'], $secure= null)!!}              
                   
                </div>  
               
        </div> <!--fin del div registro -->
     </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#btn_GuardarProveedor").click(function() {
            //var data=$(".frmRazas").serialize();
            var nombreEmpresa = $('#nombreEmpresa').val();
            var ruc=$('#ruc').val();
            var direccion =$('#direccion').val();
            var telefono =$('#telefono').val();
            var correo =$('#correo').val();
            var representante =$('#representante').val();
            var token=$("#token").val();
            $.ajax({
                type    :'post',
                url     :'{!!URL::route('saveProvee')!!}',
                headers :{'X-CSRF-TOKEN': token},
                data    :{nombreEmpresa:nombreEmpresa,ruc:ruc,direccion:direccion,telefono:telefono,correo:correo,representante:representante},
                success:function(data){
                    swal("Proveedor Registrado Correctamente..!!", "", "success");
                    },error:function(){
                    alert(data.err);
                    
                }   
            });
            $('.frmProvee')[0].reset();
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