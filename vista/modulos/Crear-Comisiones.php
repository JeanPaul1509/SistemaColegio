<?php 

  if($_SESSION["rol"] != "Administrador"){

    echo '<script>
      window.locations = "inicio";
    </script>';

    return;
  }

 ?>

<div class="content-wrapper">
	<section class="content">
		<div class="box">
			<div class="box-body">

<?php 
$exp = explode("/",$_GET["url"]);
$columna = "id";
$valor= $exp[1];

$materia = MateriasC::VerMaterias2C($columna ,$valor);

echo '<h2>Horarios de la Materia: 
        '.$materia["nombre"].'</h2>';

?>
				
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearComision">Crear Horarios</button>
						<h2>Horarios: </h2>
						<table class="table table-bordered table-hover table-striped T">
							<thead>
								<tr>
									<th>N°</th>
									<th>Cantidad Max. alumnos</th>
									<th>Dias</th>
									<th>Horarios</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
               
                   <?php

                  $columna = "id_materia";
                  $valor = $exp[1]; 
                  $comisiones= MateriasC::VerComisionesC( $columna,$valor);
                  foreach ($comisiones as $key => $value) {
                
                   echo' <tr>
                  <td>'.$value["numero"].'</td>
                  <td>'.$value["c_maxima"].'</td>
                  <td>'.$value["dias"].'</td>
                  <td>'.$value["horario"].'</td>
                  <td>

                  <a href="http://localhost/universidad/tcpdf/pdf/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

                                    
                     </a>

                        <button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Eliminar </button>

                  </td>
                </tr>';

                   }
                   ?> 

							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>




<div class="modal fade" id="CrearComision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-primary" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Registro de Horarios</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <form method="post">
      <div class="modal-body">

        <div class="md-form mb-5">
          <h2>Numero:</h2>
        
                      <input type="number" class="form-control input-lg" name="numero" required="">
                      
          <?php

          echo '
          <input type="hidden" class="form-control input-lg" name="id_materia" value="'.$exp[1].'"
          required="">';
          ?>
        </div>

        <div class="md-form"> 

           <h2>Cantidad Max. Alumnos:</h2>
 
                      <input type="number" class="form-control input-lg" name="c_maxima" required="">
                    
            </div>
           <div class="md-form">

            <h2>Dias:</h2>
 
                      <input type="text" class="form-control input-lg" name="dias" required="">
                     
            </div>
            <div class="md-form">

               <h2>Horarios:</h2>
 
                      <input  type="text" class="form-control input-lg" name="horario" required="">
                     
            </div>
           
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-primary ">Crear</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Salir</button>
      </div>
       
      <?php
$crearC  = new MateriasC();
$crearC -> CrearComisionC();


?>
       </form>
    </div>
    <!--/.Content-->
  </div>
</div>

<?php

$borrarC = new MateriasC();
$borrarC -> BorrarComisionC();

?>

