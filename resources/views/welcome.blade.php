<!--
autor: jandry navarrrete-jandy navarrete-jony guaman
fecha:30-03-2016
menu principal con sus diferentes estilos e inicia sesion mediane un modal 

 -->

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style_taller.css">    
    {!!Html::style('admin/css/bootstrap.min.css')!!}
    <!--ANIMATE CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate/animate.css')}}">
    {{--PNOTIFY--}}
    <link  rel="stylesheet" type="text/css" href="{{asset('includes/pnotify/pnotify.custom.min.css')}}"  />
    <title>Taller Zambrano Admin</title>
    <!-- icono de la pagina -->
    <link rel="shortcut icon" href="{{asset('dist/img/saw.png')}}">

  </head>
  <body>
    <div class="container">
      <div class="row vertical-offset-100">
         <div class="col-md-4 col-ms-4 col-xs-8 col-md-offset-8">
            <div class="panel panel-default">
              <div class="panel-heading">                  
                <div class="row-fluid user-row">
                  <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
                </div>
              </div>
              <div class="panel-body">
              <div id="lod" style="display:none"> 
                <img src="{{asset('dist/load.gif')}}" alt="" style="position: absolute; margin-left: 119px; z-index: 1;">
                <h4 style="position: absolute;margin-left: 110px; z-index: 1; margin-top: 62px;">Cargando...
                </h4>
              </div>
            {!!Form::open(['method'=>'POST','id'=>'login_from'])!!}
            <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                <fieldset>
                  <label class="panel-login">
                    <div class="login_result"></div>
                      </label>
                        <input class="form-control" placeholder="Username" id="username" type="text" style="margin-bottom: 10px;">
                        <input class="form-control" placeholder="Password" id="password" type="password">
                      <br></br>
                        <input class="btn btn-lg btn-success btn-block" type="button" id="login" value="Login »">
                </fieldset>
            {!!Form::close()!!}
            <br>  
            <br>  
            <footer>
              <p>©2016 All Rights Reserved. Taller Zambrano un sitio donde soldamos todo menos tu corazon roto. Terminos y Politicas</p>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="{{asset('js/jQuery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{asset('includes/pnotify/pnotify.custom.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('taller.js')}}"></script>
    
  </body>
</html>