@extends('Layouts.AdminMain')

@section('content')

<h2>Usuarios</h2>
<style>
  .moverBton{
    margin-top: 20px;
  }  
</style>
<div class="panel panel-default">

    <div class="panel-body">
            <div class="col-md-12 registro">
                <div class="col-md-6">
                     
                     {!!Form::open(array('url'=>'','class'=>'frmUser','method'=>'POST'))!!}
                    
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                                 
                                 <div class="form-group">
                                    <label for="disabledTextInput">Tipo Usuarios</label>
                                    <select id="idTipoUsuario" name="tipoUsuario" class="form-control text">
                                    <option>Seleccione...</option>
                                    @foreach($CategoriaUsuarios as $Cat)
                                        <option value="{{$Cat->id}}"> {{$Cat->tipoUser}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                {!!Form::label('Usuarios:')!!}
                                {!!Form::text('User',null,['id'=>'User', 'class'=>'form-control','placeholder'=>'Ingrese el nombre de Usuario','required'=>''])!!}

                                {!!Form::label('Contraseña:')!!}
                                {!!Form::text('password',null,['id'=>'password', 'class'=>'form-control','placeholder'=>'Ingrese la contrasena de Usuario','required'=>''])!!}


                     {!!Form::close()!!}

                                {!!link_to('#', $title='Guardar', $attributes =['id'=>'btn_Usuario', 'class'=>'moverBton  btn btn-success btn-guardar'], $secure= null)!!}              
                   
                </div>  
               
        </div> <!--fin del div registro -->
     </div>
</div>
@endsection
    

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#btn_Usuario").click(function() {
            //var data=$(".frmRazas").serialize();
            var idTipoUser = $('#idTipoUsuario').val();
            var Usuario=$('#User').val();
            var contrasena =$('#password').val();
            var token=$("#token").val();
           
            $.ajax({
                type    :'post',
                url     :'{!!URL::route('saveUsu')!!}',
                headers :{'X-CSRF-TOKEN': token},
                data    :{idTipoUser:idTipoUser,Usuario:Usuario,contrasena:contrasena},

                success:function(data){
                    swal("Usuario Registrado Correctamente..!!", "", "success");
                    },error:function(){
                    alert(data.err);
                    
                }   
            });
            $('.frmUser')[0].reset();
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