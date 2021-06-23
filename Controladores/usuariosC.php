<?php 

class UsuariosC{

	//Iniciar Sesion
	public function IniciarSesionC(){
		if(isset($_POST["libreta"])){
			if(preg_match('/^([a-zA-Z0-9]+)$/', $_POST["libreta"]) && preg_match('/^([a-zA-Z0-9.-]+)$/', $_POST["clave"])){

				$tablaBD = "usuarios";

				$datosC = array("libreta"=>$_POST["libreta"], "clave"=>$_POST["clave"]);

				$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

				if($resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"]){

				$_SESSION["Ingresar"] = true;

				$_SESSION["rol"] = $resultado["rol"];
				$_SESSION["libreta"] = $resultado["libreta"];
				$_SESSION["clave"] = $resultado["clave"];
				$_SESSION["nombre"] = $resultado["nombre"];
				$_SESSION["apellido"] = $resultado["apellido"];
				$_SESSION["id_carrera"] = $resultado["id_carrera"];

				$_SESSION["id"] = $resultado["id"];
				
				echo '<script>
					window.location = "inicio";
						</script>';	
			}else{

				echo '<br> <div class="alert alert-danger"> Datos Invalidos, Vuelve a intertarlo.... </div>';
				}
			}
		}
	}

	//ver Mis Datos

	public function VerMisDatosC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		$resultado = UsuariosM::VerMisDatosM($tablaBD, $id);

		echo '<form method="post">
				
				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						<h2>Fecha de Nacimiento: </h2>
						<input type="date"  class="input-lg" name="fechanac" placeholder="20-05-2020" value="'.$resultado["fechanac"].'">

						<input type="hidden" name="Uid" value="'.$_SESSION["id"].'">

						<h2> Direccion: </h2>
						<input type="text" class="input-lg" name="direccion" MinLength="10"  MaxLength="50" value="'.$resultado["direccion"].'">
						
						<h2> Celular: </h2>
						<input type="text" class="input-lg" name="telefono" onKeyPress="return ValidaSoloNumeros(event)" MinLength="9"  MaxLength="9"  value="'.$resultado["telefono"].'">

						<h2> Contraseña: </h2>
						<input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'" MinLength="3" required>

					</div>

					<div class="col-md-6 col-xs-12">

						<h2>Correo Electronico: </h2>
						<input type="email"  class="input-lg" name="correo" value="'.$resultado["correo"].'">

						
						<h2> Preparatoria: </h2>
						<input type="text" class="input-lg" name="preparatoria" onKeyPress="return soloLetras(event)" MinLength="3" MaxLength="20" value="'.$resultado["preparatoria"].'">
						
						<h2> Pais: </h2>
						<input type="text" class="input-lg" name="pais" onKeyPress="return soloLetras(event)" MinLength="4"  MaxLength="20" value="'.$resultado["pais"].'">

						<br><br>
						
						<button type="submit" class="btn btn-success">Guardar Datos</button>

					</div>

				</div>

			</form>';
	}


	//Actualizar Mis Datos

	public function GuardarDatosC(){

		if(isset($_POST["Uid"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["Uid"], "fechanac"=>$_POST["fechanac"], 
							"direccion"=>$_POST["direccion"], "telefono"=>$_POST["telefono"],
							"correo"=>$_POST["correo"], "preparatoria"=>$_POST["preparatoria"],
							"pais"=>$_POST["pais"], "clave"=>$_POST["clave"]);

			$resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);


			if($resultado == true){

				echo '<script>
					window.location = "http://localhost/universidad/mis-datos";
						</script>';	

			}
		}
	}


	//crear usuario
	

	public function CrearUsuarioC(){
		if(isset($_POST["apellidoU"])){

			/*if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoU"])  &&
			     preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreU"])  &&
			     preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["usuario"])){  &&
*/


			$tablaBD = "usuarios";

			$datosC = array("apellido"=>$_POST["apellidoU"], "nombre"=>$_POST["nombreU"], "libreta"=>$_POST["usuarioU"], "clave"=>$_POST["claveU"], "id_carrera"=>$_POST["carreraU"], "rol"=>$_POST["rolU"]);
			$resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>
					window.location = "usuarios";
				</script>';
			}
		
		}
	}


	//ver usuario
	public function VerUsuariosC($columna, $valor){
		$tablaBD = "usuarios";
		$resultado=UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

		return $resultado;
	}

static public function VerUsuarios2C($columna, $valor){

		$tablaBD = "usuarios";

		$resultado = UsuariosM::VerUsuarios2M($tablaBD, $columna, $valor);

		return $resultado;

	}

	//actualizar Usuarios
	public function ActualizarUsuariosC(){
		if(isset($_POST["Uid"])){
			$tablaBD = "usuarios";
			$datosC = array("id"=>$_POST["Uid"], "apellido"=>$_POST["apellidoEU"], "nombre"=>$_POST["nombreEU"], "libreta"=>$_POST["usuarioEU"], "clave"=>$_POST["claveEU"], "id_carrera"=>$_POST["carreraEU"], "rol"=>$_POST["rolEU"]);
			$resultado = UsuariosM::ActualizarUsuariosM($tablaBD, $datosC);

			if($resultado == true){
				echo '<script>
				window.location = "usuarios";
				</script>';
			}
		}
	}

	//eliminar usuarios 
	public function EliminarUsuariosC(){
		if(isset($_GET["Uid"])){
			$tablaBD = "usuarios";
			$id = $_GET["Uid"];
			$resultado = UsuariosM::EliminarUsuariosM($tablaBD, $id);
		
		if($resultado == true){
				echo '<script>
				window.location = "usuarios";
				</script>';
			}
		}
	}
}

