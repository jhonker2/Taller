<!-- Vista welcomeAdmin 
@autor: jandry
@fecha: 05/08/2016
@descrivion: nos permitira iniciar al usuario admin al sistema en la parte administracion -->
<html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Taller Zambrano Admin</title>

  <!-- Bootstrap core CSS -->
  {!!Html::style('admin/css/bootstrap.min.css')!!}
  {!!Html::style('admin/fonts/css/font-awesome.min.css')!!}
  {!!Html::style('admin/css/animate.min.css')!!}
  <!-- Custom styling plus plugins -->
  {!!Html::style('admin/css/custom.css')!!}
  {!!Html::style('admin/css/icheck/flat/green.css')!!}
  {!!Html::script('admin/js/jquery.min.js')!!}
   
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">         
         {!!Form::open()!!}
            <h1>Taller Admin</h1>
            <div>
              {!!Form::text('usuario',null,['class'=>'form-control','placeholder'=>'Usuario','required'=>''])!!}
            </div>
            <div>
              {!!Form::password('Contraseña',['class'=>'form-control','placeholder'=>'Contraseña','required'=>''])!!}
            </div>
            <div>
              <a class="btn btn-default submit" href="welcomeAdmin/home">Iniciar Sesión</a>
              <a class="reset_pass" href="#">Se me olvido mi clave?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">New to site?
                <a href="#toregister" class="to_register"> Crear Nueva Cuenta  </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Taller Admin!</h1>
                <p>©2016 All Rights Reserved. Taller Zambrano un sitio donde soldamos too menos tu corazon roto. Terminos y Politicas</p>
              </div>
            </div>
          {!!Form::close()!!}
          <!-- form -->
        </section>
        <!-- content -->
      </div>

      <div id="register" class="animate form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Iniciar Sesión </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
