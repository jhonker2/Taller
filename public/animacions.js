/*Animaciones de la Entrada*/

	$('.title').waypoint(function(){
    $('.title').addClass('animated zoomInDown');
    },{ offset:'70%' });

	$('.title2').waypoint(function(){
    $('.title2').addClass('animated zoomInDown');
    },{ offset:'70%' });

    $('#ingresar').waypoint(function(){
    $('#ingresar').addClass('animated bounceInDown');
    },{ offset:'30%'});

    $('span#btn_si').click(function() {
    $('.content').waypoint(function(){
    $('.content').addClass('animated lightSpeedLn');
    },{ offset:'50%'});
    });