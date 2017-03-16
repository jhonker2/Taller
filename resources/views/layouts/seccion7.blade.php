<div class="col-md-6">
  <div class="row">
    <div class="col-md-4 col-xs-4">
      <dl>
        <dt>COMUNIDAD</dt>
           @foreach($comunidades as $comunidad)
           <dd> {{$comunidad->nombComunidad}}</dd>
           @endforeach
      </dl> 
    </div>
    <div class="col-md-4 col-xs-4">
      <dl>
        <dt>SERVICIOS VETERINARIOS</dt>
        <dd>Veterinarias</dd>
        <dd>Clinicas Veterinarias</dd>
      </dl>
    </div>
    <div class="col-md-4 col-xs-4">
      <dl>
        <dt>CONTÁCTENOS</dt>
        <dd class="fa fa-map-marker" aria-hidden="true">Manta Av. 18 entre Calle 13 y 14 </dd>
        <dd class="fa fa-mobile" aria-hidden="true">  (+593) 098-927-2485 
        <br>(+593) 098-856-2240 
        <br>(+593) 052-622-540
        </dd>
        <dd class="fa fa-envelope-o" aria-hidden="true">info@portaldenegocios.com.ec</dd>
      </dl>
    </div>
</div>
  <div class="row">
    <div class="col-xs-4 col-md-4">
        <img class="sec-7-logo1" alt="" src="{{asset('dist/img/logo.png')}}">
        <dl>
          <dt>www.bloopets.com</dt>
        </dl>
    </div>
    <div class="col-xs-4 col-md-4">
        <img class="sec-7-logo2" alt="" src="{{asset('dist/img/logomkt.png')}}">      
        <dl>
          <dt>www.bloopets.com</dt>
        </dl>
    </div>
    <div class="col-xs-4 col-md-4">
        <img class="sec-7-logo1" alt="" src="{{asset('dist/img/logoportal.png')}}">
        <dl>
          <dt>www.portaldenegocio.com.ec</dt>
        </dl>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="copyright-section">
        copyrigth www.bloopets.com derechos reservadors
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      ESPACIO PUBLICITARIO
    </div>
    <div class="col-xs-12 col-md-12">
        <img  class="sec-7-foto" src="{{asset('dist/img/fot5.jpg')}}">
    </div>
  </div>
</div>