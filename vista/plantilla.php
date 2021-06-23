
<?php 
session_start();


 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Gestion del Aprendizaje</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<link rel="stylesheet" href="http://localhost/universidad/Vistas/node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="http://localhost/universidad/Vistas/node_modules/mdbootstrap/css/style.css">


<body class="hold-transition skin-blue-light sidebar-mini login-page">
<!-- Site wrapper -->


<?php 

if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){


  echo '<div class="wrapper">';

  include "modulos/cabecera.php";

  if($_SESSION["rol"] == "Administrador"){
    include "modulos/menu.php";  
  }else if($_SESSION["rol"] == "Estudiante"){
    include "modulos/menuEstudiante.php";  
  }

  $url = array();

  if(isset($_GET["url"])){


    $url = explode("/", $_GET["url"]);

    if($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "mis-datos" || $url[0] == "Carreras" || $url[0] == "Editar-Carrera" || $url[0] == "usuarios"  || $url[0] == "Estudiantes" || $url[0] == "Editar-Inicio" || $url[0] == "Crear-Materias" || $url[0] == "Crear-Comisiones" || $url[0] == "Ver-Plan"|| $url[0] == "Nota-Materia" || $url[0] == "Editar-Nota"|| $url[0] == "Plan-de-Estudios"|| $url[0] == "Materias"|| $url[0] == "insc-materia"|| $url[0] == "inscripto-M"|| $url[0] == "Examenes"|| $url[0] == "Crear-Examenes"|| $url[0] == "C-E"|| $url[0] == "Ver-Examenes"|| $url[0] == "insc-examen"|| $url[0] == "Inscriptos-examen"|| $url[0] == "Constancia-Alumno"|| $url[0] == "Constancia-Materias"|| $url[0] == "Certificados"){

      include "modulos/".$url[0].".php";
    }

    echo '</div>';
  }else{
      include "modulos/inicio.php";

  }
  echo '</div>';
  
}else if(isset($_GET["url"])){

  if($_GET["url"] == "Ingresar"){

    include "modulos/Ingresar.php";
  }
}else{

   include "modulos/Ingresar.php";
}



 ?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 


  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script>
  function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }
</script>
<!-- jQuery 3 -->
<script src="http://localhost/universidad/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/universidad/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/universidad/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/universidad/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/universidad/Vistas/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="http://localhost/universidad/Vistas/dist/js/demo.js"></script>
<script src="http://localhost/universidad/Vistas/js/usuarios.js"></script>
<script src="http://localhost/universidad/Vistas/js/materias.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</body>
</html>
