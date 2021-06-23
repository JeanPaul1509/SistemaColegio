<?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>
<div class="content-wrapper">
	
	<section class="content-header">
		<div class="box">
		
       <div class="box-body">

       	<form  method="post">
		<?php

		$exp = explode("/", $_GET["url"]);

		$columna = "id";
		$valor = $exp[2];

		$materia = MateriasC::VerMaterias2C($columna, $valor);

		echo '<h2>Crear una fecha de Exámen para: <br><br>'.$materia["nombre"].'</h2>
        <input type="hidden" name="id_materia" value="'.$exp[2].'">
        <input type="hidden" name="estado" value="1">
        <input type="hidden" name="id_carrera" value="'.$exp[1].'">
        ';
		?>
         <div class="row">
         	<div  class="col-md-6 col-xs-12">
         		<h2>Fecha:</h2>
         		<input type="date" class="input-lg "name="fecha" required="" >
                
                <h2>Hora:</h2>
         		<input type="time" class="input-lg "name="hora" required="">
         	</div>
         	<div  class="col-md-6 col-xs-12">
         		<h2>Profesor:</h2>
         		<input   type="text" onKeyPress="return soloLetras(event)" class="input-lg "name="profesor" id="profesorp" MinLength="6" MaxLength="35" required="">
                
                
                <h2>Aula:</h2>
         		<input type="text" onKeyPress="return ValidaSoloNumeros(event) "class="input-lg "name="aula" required="">

         		<br><br>

         		<button type="submit" class="btn btn-primary btn-lg">Crear </button>

         </div>
         </div>

    <?php
$crearE = new ExamenesC();
$crearE -> CrearExamenC();



?>

        </form>
		</div>
	</div>	
</section>
</div>

<script src="http://localhost/universidad/Vistas/js/profesor.js"></script>