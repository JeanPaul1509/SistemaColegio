<?php 

	if($_SESSION["rol"] != "Administrador"){

		echo '<script>
			window.locations = "inicio";
		</script>';
	}

 ?>
 <div class="content-wrapper">
 	<section class="content">
 		<div class="box">
 			<div class="box-body">
 				<div class="row">
 					<div class="col-md-6 col-xs-12">
 						<?php 
					          $columna = "id";
					          $valor = 1;

					          $resultado = AjustesC::VerAjustesC($columna, $valor);
					          echo '	<h2>Cuatrimeste Actual: '.$resultado["cuatrimestre"].'</h2>
 						<form method="post">
 							<button type="submit" class="btn btn-primary">1er Examen</button>
 							<input type="hidden" name="cuatrimestreA" value="1er cuatrimestre">';
 							$cuatrimestre = new AjustesC();
 							$cuatrimestre -> CambiarCuatrimestreC();

 						echo '</form>
 						<br>
 						<form method="post">
 							<button type="submit" class="btn btn-success">2er Examen</button>
 							<input type="hidden" name="cuatrimestreA" value="2er cuatrimestre">';

 							$cuatrimestre = new AjustesC();
 							$cuatrimestre -> CambiarCuatrimestreC();

 						echo '</form>
 						<br>
 						<form method="post">
 							<h2>1er cuatrimestre</h2>
 							<h3>Inicio: <input type="date" class="input-lg" name="1_fecha_inicio" value="'.$resultado["1_fecha_inicio"].'"></h3>

 							<h3>Fin: <input type="date" class="input-lg" name="1_fecha_fin" value="'.$resultado["1_fecha_fin"].'"></h3>

 							<br>

 							<h2>2er examen</h2>
 							<h3>Inicio: <input type="date" class="input-lg" name="2_fecha_inicio" value="'.$resultado["2_fecha_inicio"].'"></h3>

 							<h3>Fin: <input type="date" class="input-lg" name="2_fecha_fin" value="'.$resultado["2_fecha_fin"].'"></h3>

 						
 					</div>
 					<div class="col-md-6 col-xs-12">
 						<br>
 						<h2>Fecha de examenes proximos</h2>
 						<h3>Desde: <input type="date" class="input-lg" name="examenes_i" value="'.$resultado["examenes_i"].'"></h3>

 							<h3>Hasta: <input type="date" class="input-lg" name="examenes_f" value="'.$resultado["examenes_f"].'"></h3>
 							<br>
 						<h2>Fecha de inscripciones</h2>
 						<h3>Desde: <input type="date" class="input-lg" name="materias_i" value="'.$resultado["materias_i"].'"></h3>

 							<h3>Hasta: <input type="date" class="input-lg" name="materias_f" value="'.$resultado["materias_f"].'"></h3>
 					</div>

 					
 					<br>
 					<br>
 					<button type="submit" class="btn btn-success btn-lg">Guardar</button>';
 					$guardarAjustes = new AjustesC();
 					$guardarAjustes -> ActualizarAjustesC();
					          ?>

 				</form>
 				</div>
 			</div>
 		</div>
 	</section>
 </div>