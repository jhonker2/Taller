<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->

<!-- Include Date Range Picker -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Taller "Zambrano" Admin!</title>
 <link rel="shortcut icon" href="{{asset('dist/img/saw.png')}}">
  
  <!-- datatable -->
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

  <!-- Bootstrap core CSS -->
  {!!Html::style('admin/css/bootstrap.min.css')!!}
  {!!Html::style('admin/fonts/css/font-awesome.min.css')!!}
  {!!Html::style('admin/css/animate.min.css')!!}
  {!!Html::style('admin/css/StyleAdmin.css')!!}
  {!!Html::style('css/select2.css')!!}
  {{--PNOTIFY--}}
    <link  rel="stylesheet" type="text/css" href="{{asset('includes/pnotify/pnotify.custom.min.css')}}"  
   <!-- FILEUPLOADER-->
    <link rel="stylesheet" href="{{asset('css/fileuploader.css')}}">
     <!--CKECT -->
    <link rel="stylesheet" href="{{asset('js/icheck-1/skins/all.css')}}">
  <!-- Custom styling plus plugins -->
  
  {!!Html::style('admin/css/custom.css')!!}
  {!!Html::style('admin/css/maps/jquery-jvectormap-2.0.3.css')!!}
  {!!Html::style('admin/css/icheck/flat/green.css')!!}
  {!!Html::style('includes/sweetalertalert/sweetalert.css')!!}
  {!!Html::style('admin/css/floatexamples.css')!!}

  {!!Html::script('js/jQuery/jquery-2.2.0.min.js')!!}
  {!!Html::script('admin/js/nprogress.js')!!}
  {!!Html::script('includes/sweetalertalert/sweetalert.min.js')!!}
  
  <script src="{{asset('js/select2.min.js')}}"></script>

   @yield('estilos')
    
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-wrench"></i> <span>Taller "ZAMBRANO" Admin!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{asset('admin/images/user.png')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->user}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/home">Panel Control</a>
                    </li>
                  </ul>
                </li> 
                @foreach($tipoUsuario as $tipo)
                  @if($tipo->tipoUser == "Bodeguero")
                  <li><a><i class="fa fa-files-o"></i>Pedidos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                      <li><a href="/welcomeAdmin/Bodega">Lista de Pedidos</a></li>
                      <li><a href="/welcomeAdmin/BodegaEntregado">Lista de Pedidos Entregados</a></li>
                    </ul>
                  </li>
                  @else
                <li><a><i class="fa fa-files-o"></i>Facturacion<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Venta">Facturacion Ventas</a>
                    <li><a href="/welcomeAdmin/SolicitarPedidos">Solicitar Pedido</a>
                    <li><a href="/welcomeAdmin/FacturaCompra">Facturacion Compras</a>
                   <li><a href="/welcomeAdmin/Proforma">Proforma</a>
               </li>
                </ul>
                </li>
                <li><a><i class="fa fa-files-o"></i>Reportes Ventas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/FacturaProforma/">Reporte Proformas</a></li>
                    <li><a href="/welcomeAdmin/FacturaVenta/">Reporte Ventas</a></li>
                </ul>
                </li>
                <li><a><i class="fa fa-money"></i>Rol de Pago <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Rol_pago">Ingresar nuevo</a>
                    </li>
                </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i>Productos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Productos/create">Ingresar nuevo</a>
                    <li><a href="/welcomeAdmin/Productos/">Administrar Productos</a>
                    </li>
                </ul>
                </li>
                <li><a><i class="fa fa-user-times"></i>Proveedores <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Proveedores/create">Ingresar nuevo</a>
                    <li><a href="/welcomeAdmin/Proveedores/">Administrar Proveedores</a>
                    </li>
                </ul>
                </li>
                <li><a><i class="fa fa-male"></i>Clientes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Clientes/create">Ingresar nuevo</a>
                    <li><a href="/welcomeAdmin/Clientes/">Administrar CLientes</a>
                    </li>
                </ul>
                </li>
                <li><a><i class="fa fa-industry"></i>  Maquinarias <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Maquinarias/create">Ingresar nueva</a>
                    </li>
                    <li><a href="/welcomeAdmin/Maquinarias/">Adminitrar Maquinarias</a>
                    </li> 
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i>Empleados<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Empleados/create">Ingresar nuevo</a>
                    </li>
                    <li><a href="/welcomeAdmin/Empleados/">Adminitrar Empleados</a>
                    </li> 
                  </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i> Materias Primas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/MateriasPrimas/create">Ingresar nueva</a>
                    </li>
                    <li><a href="/welcomeAdmin/Devolucion">Devolucion</a>
                    </li>
                    <li><a href="/welcomeAdmin/MateriasPrimas">Adminitrar Materias Primas</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user-secret"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/welcomeAdmin/Usuarios/create">Crear nuevo</a>
                    </li>
                    <li><a href="/welcomeAdmin/Usuarios/">Administrar Usuarios</a>
                    </li>
                    
                  </ul>
                </li>
                 <li><a><i class="fa fa-cogs"></i> Configuraciones <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    
                    <li><a href="/welcomeAdmin/CategoriaProductos/create">Categoria Productos</a>
                    </li>
                    <li><a href="/welcomeAdmin/CategoriaUsuarios/create">Categoria Usuarios</a>
                    </li>
                    <li><a href="/welcomeAdmin/Servicios/create">Servicios</a>
                    </li>
                    
                  </ul>
                </li>
                @endif
                @endforeach
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="/logout" data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('admin/images/user.png')}}" alt="">{{Auth::user()->user}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="{{asset('admin/images/user.png')}}" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  
                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      
      <!-- page content -->
      <div class="right_col" role="main">
      
      @yield('content')


        <!-- footer content -->

        <footer>
         <div class="copyright-info">
           <p class="pull-right">Taller "Zambrano" un sitio en donde soldamos todo menos corazones rotos <a href=""></a>  
           </p>
         </div>
         <div class="clearfix"></div>
       </footer> 
        <!-- /footer content -->
      </div>
      <!-- /page content -->


  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
    
    <!-- datatable -->
   <scrip src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></scrip>
   <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>>

  {!!Html::script('admin/js/bootstrap.min.js')!!}
  <!-- gauge js -->
  {!!Html::script('admin/js/gauge/gauge.min.js')!!}
  {!!Html::script('admin/js/gauge/gauge_demo.js')!!}
  <!-- bootstrap progress js -->
  {!!Html::script('admin/js/progressbar/bootstrap-progressbar.min.js')!!}
  {!!Html::script('admin/js/nicescroll/jquery.nicescroll.min.js')!!}
  <!-- icheck -->
  {!!Html::script('admin/js/icheck/icheck.min.js')!!}
  <!-- daterangepicker -->
  {!!Html::script('admin/js/moment/moment.min.js')!!}
  {!!Html::script('admin/js/datepicker/daterangepicker.js')!!}
  <!-- chart js -->
  {!!Html::script('admin/js/chartjs/chart.min.js')!!}
  {!!Html::script('admin/js/custom.js')!!} 
  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  {!!Html::script('admin/js/flot/jquery.flot.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.pie.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.orderBars.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.time.min.js')!!} 
  {!!Html::script('admin/js/flot/date.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.spline.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.stack.js')!!} 
  {!!Html::script('admin/js/flot/curvedLines.js')!!} 
  {!!Html::script('admin/js/flot/jquery.flot.resize.js')!!} 
  {!!Html::script('includes/pnotify/pnotify.custom.min.js')!!}

   <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

 <script src="{{asset('js/FileUploader.js')}}"></script>
        <script type="text/javascript">
            new FileUploader('.uploader');
          
        </script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  {!!Html::script('admin/js/maps/jquery-jvectormap-2.0.3.min.js')!!} 
  {!!Html::script('admin/js/maps/gdp-data.js')!!} 
  {!!Html::script('admin/js/maps/jquery-jvectormap-world-mill-en.js')!!} 
  {!!Html::script('admin/js/maps/jquery-jvectormap-us-aea-en.js')!!} 
  <!-- pace -->
  {!!Html::script('admin/js/pace/pace.min.js')!!} 
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  {!!Html::script('admin/js/skycons/skycons.min.js')!!} 
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
  @yield('scripts')

</body>

</html>
