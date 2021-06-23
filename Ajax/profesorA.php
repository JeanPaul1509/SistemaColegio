<?php 

require_once "../Controladores/examenesC.php";
require_once "../Modelos/examenesM.php";
class ProfesorA{
	public $verificarProfesor; 
public function VerificarProfesor(){
   
        $columna = "profesor";
		$valor = $this->verificarProfesor;

		$resultado = ExamenesC::VerExamenesC($columna, $valor);

		echo json_encode($resultado);

	}

}
if(isset($_POST["verificarProfesor"])){

	$verificarU = new ProfesorA();
	$verificarU -> verificarProfesor = $_POST["verificarProfesor"];
	$verificarU -> VerificarProfesor();

}
