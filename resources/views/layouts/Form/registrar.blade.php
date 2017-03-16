<div class="panel panel-default">
    <div class="panel-body">
        <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
            <div class="col-md-12 registro">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disabledTextInput">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control text" placeholder="Nombre">
                    </div>
                    <div class="form-group check">
                        <label>Sexo</label>
                    </div>
                    <div class="from-group chek">
                        <input type="radio" id="m" value="masculino" name="iCheck" checked > Masculino
                        <input type="radio" id="f" value="femenino" name="iCheck"> Femenino
                    </div>
                    <div class="form-group">
                        <label>Raza a la que pertenesco</label>
                        <select id="Selectrazas" name="raza" class="form-control text">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email de mi mejor amigo</label>
                        <input type="mail" id="correo" name="correo" class="form-control text1" placeholder="miamigo@bloopets.com">
                    </div>
                    <div class="form-group">
                            <label>Contraseña</label>
                            <input type="Password" id="clave" name="clave" class="form-control text" placeholder="**********">
                    </div>
                </div>  <!--fin de col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disabledTextInput">Comunidad</label>
                        <select id="listaComunidad" name="idcomunidad" class="form-control text">
                        <option>Seleccione...</option>
                        @foreach($comunidades as $comunidad)
                            <option value="{{$comunidad->id}}"> {{$comunidad->nombComunidad}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="foto"><span type="file"></span>
                        </div>
                        <label class="uploader foto" ondragover="return false">
                            <i  class="fa fa-paw" aria-hidden="true"></i>
                            <img src="" class="">
                            <input type="file" name="archivo" id="archivo" accept="image/*" required>
                        </label>
                    <div class="form-group btn_margin">                    
                        {!!link_to('#', $title='Registrar', $attributes =['id'=>'btn_registrar', 'class'=>'btn btn-bloopets btn-guardar'], $secure= null)!!}
                        <div id="load">
                           
                        </div>
                    </div>

                </div><!--fin de col-md-6 -->
        </div> <!--fin del div registro -->
    </div>
</div>
            