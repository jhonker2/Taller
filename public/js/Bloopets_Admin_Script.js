
$('#btn_Comunidad').click(function() {
	/*var comunidad =$('#nombre').val();
	var descripcion=$('#descripcion').val();
	var token=$("#token").val();*/
 	var formData = new FormData($("#comunidad")[0]);
	$.ajax({
		url: 'http://localhost:8000/welcomeAdmin/Comunidades/crearComunidad',
		type: 'POST',
		dataType: 'json',
		headers :{'X-CSRF-TOKEN': token},
		Cache: false,
  		contentType: false,
  		processData: false,
  		data: formData,
		/*data: {comunidad:comunidad, descripcion:descripcion},*/
				success:function(data){
				alert(data.mensaje);
				$('#nombre').val("");
				$('#descripcion').val("");
		}
	});
});