<h1>Bloopets</h1>       
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">       
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
              {!!Form::text('email',null,['class'=>'form-control text2','placeholder'=>'Correo'])!!}
            </div>
            <div class="col-md-3"></div>
            </div>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
              {!!Form::password('password',['class'=>'form-control text2','placeholder'=>'Contraseña'])!!}
            </div>
            <div class="col-md-3"></div>
            </div>

            <div class="login-btns">
            <button type="submit" class="btn btn-bloopets submit">Ingresar</button>
             
              <!--  {!!link_to('#', $title='Login', $attributes =['id'=>'btn_login', 'class'=>'btn btn-bloopets btn-guardar'], $secure= null)!!} -->
              <a class="reset_pass" href="#">Se me olvido mi clave?</a>
            </div>
  </form>
            <div class="clearfix"></div>
            <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
              <p class="change_link">New to site?
                <a href="#tab-1" data-toggle="tab">Crear Nueva Cuenta</a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Bloopets</h1>
                <p>©2016 All Rights Reserved. Bloopets un sitio para tu mascota. Terminos y Politicas</p>
              </div>
            </div>