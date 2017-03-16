
$(document).ready(main);
  function main (){
    $('span#btn_si').click(function() {
	  var $principal = $('section.content');
    var $secundaria = $('section.content1');
        $secundaria.removeClass('heidde');
        $secundaria.removeClass('aparecer');
        $principal.addClass('heidde');
  });
}

$(document).ready(main);
  function main (){
    $('#modificar').click(function() {
    alert("hola");
    var $principal = $('section.content');
    var $secundaria = $('section.content1');
        $secundaria.removeClass('heidde');
        $secundaria.removeClass('aparecer');
        $principal.addClass('heidde');
  });
}

$(document).ready(function(){
	$('input').iCheck({
  checkboxClass: 'icheckbox_flat-orange',
  radioClass: 'iradio_flat-orange',
  increaseArea: '20%' // optional
	});
});

$( "div.foto" ).mouseover(function() {
    $(this).find("span").html("<i class='fa fa-camera'></i> <br> Subir foto");
    $(this).find( "span" ).addClass('txt_subir');

  })
  .mouseout(function() {
    $(this).find("span").html("");
    $(this).find( "span" ).removeClass('txt_subir');
  });

/* funciones de index.blade.php para js*/  

$('#listaComunidad').on('change',function(e){
    //console.log(e);
    var comu_id = e.target.value;

    $.get('/razas?comu_id='+comu_id, function(data){
        $('#Selectrazas').empty();
        $.each(data, function(index, razaObj) {
           $('#Selectrazas').append('<option value="'+razaObj.id+'">'+razaObj.raza+'</option>');
        });
    });
});

/*codigo del boton btn_registrar
espera la accion del btn_registrar del formulario principal 
*/

$('#btn_registrar').click(function() {
 
  $('#load').html(" <i class='fa fa-circle-o-notch fa-spin fa-2x fa-fw'></i><span class='sr-only'>Creando Cuenta...</span> ");
 var formData = new FormData($("#registro")[0]);
 $.ajax({
  url: 'http://localhost:8000/usuario', 
  type: 'POST',
  headers :{'X-CSRF-TOKEN': token},
  dataType: 'json',
  cache: false,
  contentType: false,
  processData: false,
  data: formData,
  success:function(data){
      if(data.imgInval=='false'){
        alert('La imagen ingresada es invalida');
      }
      if(data.mensaje=='true'){
        $('#load').addClass("hidden");
        alert('Bienvenido a Blooplets! usted ya es parte de Blooplets');
        alert('Por favor debe activar su cuenta!');
        document.getElementById("registro").reset();
        $(".uploader img.loaded").attr('src', '');
      }
  }
}).fail( function() {
    if(clave="The clave field is required."){
        alert("Estimado Usuario la clave es necesaria ")
      }
  });
});


$('#btn_registrarPet').click(function() {
  $('#load').html(" <i class='fa fa-circle-o-notch fa-spin fa-2x fa-fw'></i><span class='sr-only'>Creando Cuenta...</span> ");
 var formData = new FormData($("#addPet")[0]);
 $.ajax({
  url: 'http://localhost:8000/addusuario', 
  type: 'POST',
  headers :{'X-CSRF-TOKEN': token},
  dataType: 'json',
  cache: false,
  contentType: false,
  processData: false,
  data: formData,
  success:function(data){
      if(data.imgInval=='false'){
        alert('La imagen ingresada es invalida');
      }
      if(data.mensaje=='true'){
        $('#load').addClass("hidden");
        alert('Su nueva Mascota ya se encuentra registrad');
        document.getElementById("registro").reset();
        $(".uploader img.loaded").attr('src', '');
      }
  }
}).fail( function() {
    if(clave="The clave field is required."){
        alert("Estimado Usuario la clave es necesaria ")
      }
  });
});


$(document).ready(function(){
  $("#btn_login").click(function() {
  var formData1 = new FormData($("#login")[0]);
  var token=$("#token").val();
  $.ajax({
    url: 'http://localhost:8000/home',
    type: 'POST',
    headers :{'X-CSRF-TOKEN': token},
    dataType: 'json',
    data: formData1,
      success:function(data){
        if(data.mensaje=='error'){
          alert('Error credenciales incorrectas');
        }
      }
    }).fail( function(){
        alert('Error');
     });
  });
});


   
