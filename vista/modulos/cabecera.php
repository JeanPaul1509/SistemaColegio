 <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/universidad/inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-university" style="font-size: 25px; color: black"></b></span>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>S.G.A</b> Pandarius</span>
      <!-- <span class="logo-lg"><img src="http://localhost/universidad/Vistas/img/logo.jpg" class="img-responsive"></span>-->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://localhost/universidad/Vistas/dist/img/avatar5.png" class="user-image" alt="User Image">
              <?php 
               echo '<span class="hidder-xs">'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'</span>'; 

               ?>

            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header">
                <img src="http://localhost/universidad/Vistas/dist/img/avatar5.png" class="img-circle" alt="User Image">

              
                 <?php 

                  if($_SESSION["rol"] == "Administrador"){
               echo '<p>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].' - Administrador</p>'; 
            
             }else{
              echo '<p>
                '.$_SESSION["apellido"]." ".$_SESSION["nombre"].' -Libreta: '.$_SESSION["libreta"].' 
 
              </p>';

              $columna= "id";
              $valor = $_SESSION["id_carrera"];
              $carrera = CarrerasC::VerCarreras2C($columna, $valor);
              echo '<p>' .$carrera["nombre"]. '</p>';
             }

               ?>

              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/universidad/mis-datos" class="btn btn-default btn-flat">Mis Datos</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/universidad/salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>