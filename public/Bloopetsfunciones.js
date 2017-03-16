
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

$(document).ready(function(){
	$('input').iCheck({
checkboxClass: 'icheckbox_flat-green',
radioClass: 'iradio_flat-green',
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