$("#profesorp").change(function(){

	$(".alert").remove();

	var profesorp = $(this).val();

	var datos = new FormData();
	datos.append("verificarLibreta", profesorp);

	$.ajax({

		url: "Ajax/profesorA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success:function(resultado){

			if(resultado){

				$("#profesorp").parent().after('<div class="alert alert-danger">El Usuario ya Existe, Vuelve a intentarlo.</div>');

				$("#profesorp").val("");


			}

		}


	})

})