<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de Factura de Proforma</title>
<style>
 
 .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}


.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}
.moverTotales{

  margin-left:80%;
}

.bg-red {
    background-color: #dd4b39 !important;
}



</style>
	  
</head>
<body>

<div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title" align="center">TALLER INDUSTRIAL "ZAMBRANO"</h3><br>
                  <h3 class="box-title" align="center">REPORTE DE FACTURA DE PROFORMA</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                        @foreach($factura as $encabezado)
                          Cliente: <span> {{$encabezado->cliente}}</span><br>
                          Fecha:   <span>{{$encabezado->fecha}} </span><br><br>
                         @endforeach
                  
                  <table class="table table-responsive " border="1">
                    <thead>
                    <tr>
                      <th>CLIENTE</th>
                          <th>FECHA</th>
                          <th>SUBTOTAL</th>
                          <th>TOTAL</th>
                          <th>ESTADO DE PROFORMA</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @foreach($proformas as $profo) 
              <tr>
                      @if($profo->estado_proforma==0)
                          <td>{{$profo->idCliente}}</td>
                          <td>{{$profo->fecha}}</td>
                          <td>{{$profo->subtotal}}</td>
                          <td>{{$profo->totalPagar}}</td>
                          <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$profo->id}}" onchange="alerta({{$profo->id}})" data-on="Realizada" data-off="En Espera"  data-onstyle="danger">
                            </label> 
                          </div>
                          </td>
                      @else
                          <td>{{$profo->idCliente}}</td>
                          <td>{{$profo->fecha}}</td>
                          <td>{{$profo->subtotal}}</td>
                          <td>{{$profo->totalPagar}}</td>
                          <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-toggle="toggle" id="toggle-demo{{$profo->id}}" onchange="alerta2({{$profo->id}})" data-on="Realizada" data-off="En Espera" checked data-onstyle="danger">
                            </label> 
                          </div>
                          </td>

                     @endif
             </tr> 
            @endforeach 


                    </tbody>
                  </table>
                
                @foreach($factura as $encabezado)
                        <br><div class="moverTotales">
                            <br>Subtotal: <span>{{$encabezado->subtotal}} </span>
                           <br> Iva 12%: <span> {{$encabezado->iva12}} </span>
                            <br>Descuento: <span> {{$encabezado->descuento}} </span>
                            <br>Iva 0%: <span> {{$encabezado->iva0 }}</span>
                            <br>Total a Pagar: <span> {{$encabezado->totalPagar}} </span> <br>
                        </div>
                @endforeach

                </div><!-- /.box-body -->
                               
              </div><!-- /.box -->

              
            </div>
</body>
</html>


