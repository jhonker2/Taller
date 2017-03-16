<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Taller Zambrano</title>
    
    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> -->
<!--     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    




    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-3.3.6/css/bootstrap.min.css')}}">
    <!--ESTILOS BLOOPETS CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('sass/css/Bloopets.css')}}">
    <!--FONT-AWESOME CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome-4.5.0/css/font-awesome.min.css')}}">
    <!--ANIMATE CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate/animate.css')}}">
    <!-- FILEUPLOADER-->
    <link rel="stylesheet" href="{{asset('css/fileuploader.css')}}">
    <!--CKECT -->
    <link rel="stylesheet" href="{{asset('js/icheck-1/skins/all.css')}}">



    <style>
        body {
            font-family: 'Berlin Sans FB Regular';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-9">
                    <ul class="social-list">
                        <li>
                          <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                          <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i>
                          </a>
                        </li>
                        <li>
                          <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                          <a class="linkdin itl-tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                          <a class="instgram itl-tooltip" data-placement="bottom" title="Instagram" href="#"><i class="fa fa-envelope-o"></i></a>
                        </li>
                        <li class="ec">
                            <span>Ec</span>
                        </li>
                        <li>
                            <img  class="bandera" src="{{asset('dist/img/bandera.png')}}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src={{asset('dist/img/logo.png')}} ">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav  navbar-right">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="">Nosotros</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Comunidades <span class="fa fa-paw"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/') }}"><i class="fa fa-paw"></i> Perros</a></li>
                            <li><a href="{{ url('/') }}"><i class="fa fa-paw"></i> Gatos</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/') }}">Tienda</a></li>
                    <li><a href="{{ url('/') }}">Centros<br> Veterinarios</a></li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            
                            <input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon1">
                            <i class="fa fa-search input-group-addon" id="basic-addon1" aria-hidden="true"></i>
                        </div>
                    </form>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li> -->
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @if($mascotas==null)

                            @else
                                @foreach($mascotas as $mascota)
                                   <img class="log_foto" src="{{asset($mascota->foto)}}">                               
                                @endforeach 

                            
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="Perfil_mascota/{{Auth::user()->email}}">{{Auth::user()->email}}<br><p class="text_perfil">ver perfil</p></a></li>
                                @foreach($mascotas as $mascota)
                                    <li>
                                        <a href=""> 
                                        {{$mascota->nombre}}
                                        </a>
                                    </li>
                                @endforeach
                                <li><a href="/addPet">Añade otra Mascota</a></li>
                                <li><a href="/logout">Cerrar Sesión</a></li>
                            </ul>
                            @endif
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script> -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="{{asset('js/jQuery/jquery-2.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoint/lib/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/animacions.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Bloopetsfunciones.js')}}"></script>
    <script src="{{asset('js/icheck-1/icheck.js')}}"></script>
    <script src="{{asset('js/FileUploader.js')}}"></script>
        <script type="text/javascript">
            new FileUploader('.uploader');
            $("#Selectrazas").select2();
        </script>

</body>
</html>
