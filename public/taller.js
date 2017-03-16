$(document).ready(function(){
	$('#username').focus();
	$('#login').click(function(){
		login();
	});
});

function redirect(url){
   window.location=url;
}

function loader(v){
  if(v== 'on'){
    $('#login_from').css({
      opacity: 0.2
    });
    $('#lod').show();
  }else{
    $('#login_from').css({
      opacity: 1
    });
    $('#lod').hide();

  }
}


function login(){
	var usuario		=	$('#username').val();
	var password	=	$('#password').val();
	var token		=	$('#token').val();

	if(usuario=="" && password==""){
		alert("usuario y contraseña esta vacio");
		$('#username').focus();
	}else{
      loader('on');
		$.post({
        url:'http://localhost:8000/log',
        headers :{'X-CSRF-TOKEN': token},
        data:{usuario:usuario,password:password},
        success:function(response){   
            loader('off');
              if(response=="fails"){
                var animate_in = 'lightSpeedIn',
                animate_out = 'bounceOut';
                new PNotify({
                  title: 'Taller Zambrano',
                  text: 'Contraseña Incorrectos.',
                  type: 'error',
                  delay: 2000,
                    animate: {
                      animate: true,
                      in_class: animate_in,
                      out_class: animate_out
                    }
                });
              } else if(response=="login"){
            	loader('off');
                redirect('http://localhost:8000/welcomeAdmin/home');
             	}else if(response=="login"){
            	loader('off');

             }
          }
      });
	}
}