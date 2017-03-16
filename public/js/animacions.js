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


    $('.img1').waypoint(function(){
    $('.img1').addClass('animated fadeInDown');
    },{ offset:'80%' });

    $('.img2').waypoint(function(){
    $('.img2').addClass('animated fadeInDown');
    },{ offset:'77%' });

    $('.img3').waypoint(function(){
    $('.img3').addClass('animated fadeInDown');
    },{ offset:'75%' });

    $('.img4').waypoint(function(){
    $('.img4').addClass('animated fadeInDown');
    },{ offset:'72%' });

    $('.img5').waypoint(function(){
    $('.img5').addClass('animated fadeInDown');
    },{ offset:'70%' });

    $('.fig1').waypoint(function(){
    $('.fig1').addClass('animated fadeInLeft');
    },{ offset:'95%' });
