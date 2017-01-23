<?php
ini_set('session.auto_start()','On');
session_start();

include("sis.php");
include("$path/libs/conexion.php");

$Activar = "No";
switch ($_SESSION[IdUsuario])
{

  case '12':
            $Activar = "Si";
    break;

  case '44':
            $Activar = "Si";
    break;

  case '375':
            $Activar = "Si";
        break;

  default:
    $Activar = "No";
    break;
}


  /* Get Id for serach the data for edit */
  $obj = new poolConnecion();
  $Sql = "SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] WHERE [IdEncuesta] = '$_GET[Id]' order by Id asc";

  $con=$obj->ConexionSQLSAP();
  $RSet=$obj->QuerySQLSAP($Sql,$con);
  $i = 0;
  while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
         {
           $txtPregunta[$i] = $fila[Pregunta];
           $IdPregunta[$i] = $fila[Id];
           $i++;
         }
   $obj->CerrarSQLSAP($RSet,$con);
   /*Get the name*/
   $obj = new poolConnecion();
   $Sql = "SELECT [Encuesta] FROM [SAP].[dbo].[AAEncuesta] WHERE [Id] = '$_GET[Id]'";

   $con=$obj->ConexionSQLSAP();
   $RSet=$obj->QuerySQLSAP($Sql,$con);
   $i = 0;
   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
          {
            $txtEncuenta = $fila[Encuesta];
          }
    $obj->CerrarSQLSAP($RSet,$con);

 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forta | Survesy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="shortcut icon" href="img/cuadrito-30x30.png" type="image/x-png" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <?php
  	if(empty($_SESSION[IdUsuario]))
  	{
  		 echo "<script>
  		 						window.location.href='logout.php'
  					</script>";
  	}
  ?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Forta Ingenieria</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION[Avatar]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION[Usuario]; ?></p>
          <!-- Status -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="proyectos.php"><i class="fa fa-calendar-minus-o"></i> <span>Proyectos</span></a></li>
        <?php
              if ($Activar == "Si") {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Encuestas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li><a href="new_surveys.php"><i class="fa fa-book"></i> Nueva</a></li>
            <li><a href="edit_surveys.php"><i class="fa fa-edit"></i> Editar</a></li>
          </ul>
        </li>
        <?php
            }
            else{

            }
         ?>
         <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Salir</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Encuesta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action = "" role="form" lpformnum="1" _lpchecked="1" method="post">
              <input type="hidden" name="txtIdUsuario" id="txtIdUsuario" value="<?php echo $_SESSION[IdUsuario]; ?>"/>
              <input type="hidden" name="txtIdEncuesta" id="txtIdEncuesta" value="<?php echo $_GET[Id]; ?>"/>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Encuesta</label>
                  <input type="text" class="form-control" id="txtEncuesta" name="txtEncuesta" value="<?php echo $txtEncuenta; ?>" placeholder="Nombre de la encuesta.." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAmJJREFUWAntV7uKIkEUvbYGM4KID3wEIgjKRLLpKGLgFwiCfslGhkb7IbLgAzE1GhMxWxRRBEEwmEgDERWfW6fXuttq60a2wU6B1qlzb9U5fatsKROJVigUArvd7oeAyePx6Af3qGYymT7F2h8Wi+V7Pp+fmE7iv4Sw81GieusKIzNh4puCJzdaHIagCW1F4KSeQ4O4pPLoPb/3INBGBZ7avgz8fxWIxWIUCoX43Blegbe3NwoGg88zwMoncFUB8Yokj8dDdrv9MpfHVquV/H4/iVcpc1qgKAp5vV6y2WxaWhefreB0OimXy6kGkD0YDKhSqdB2u+XJqVSK4vE4QWS5XKrx0WjEcZ/PR9lslhwOh8p1Oh2q1Wp0OBw4RwvOKpBOp1kcSdivZPLvmxrjRCKhiiOOSmQyGXp5ecFQbRhLcRDRaJTe39//BHW+2cDr6ysFAoGrlEgkwpwWS1I7z+VykdvtliHuw+Ew40vABvb7Pf6hLuMk/rGY02ImBZC8dqv04lpOYjaw2WzUPZcB2WMPZet2u1cmZ7MZTSYTNWU+n9N4PJbp3GvXYPIE2ADG9Xqder2e+kTr9ZqazSa1222eA6FqtUoQwqHCuFgscgWQWC6XaTgcEiqKQ9poNOiegbNfwWq1olKppB6yW6cWVcDHbDarIuzuBBaLhWrqVvwy/6wCMnhLXMbR4wnvtX/F5VxdAzJoRH+2BUYItlotmk6nLGW4gX6/z+IAT9+CLwPPr8DprnZ2MIwaQBsV+DBKUEfnQ8EtFRdFneBDKWhCW8EVGbdUQfxESR6qKhaHBrSgCe3fbLTpPlS70M0AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 1</label>
                  <textarea class="form-control" id="txtPregunta1" name="txtPregunta1" rows="3" placeholder="texto..."><?php echo $txtPregunta[0]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta1" name="txtIdPregunta1" value="<?php echo $IdPregunta[0]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 2</label>
                  <textarea class="form-control" id="txtPregunta2" name="txtPregunta3" rows="3" placeholder="texto..."><?php echo $txtPregunta[1]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta2" name="txtIdPregunta2" value="<?php echo $IdPregunta[1]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 3</label>
                  <textarea class="form-control" id="txtPregunta3" name="txtPregunta3" rows="3" placeholder="texto..."><?php echo $txtPregunta[2]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta3" name="txtIdPregunta3" value="<?php echo $IdPregunta[2]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 4</label>
                  <textarea class="form-control" id="txtPregunta4" name="txtPregunta4" rows="3" placeholder="texto..."><?php echo $txtPregunta[3]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta4" name="txtIdPregunta4" value="<?php echo $IdPregunta[3]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 5</label>
                  <textarea class="form-control" id="txtPregunta5" name="txtPregunta5"rows="3" placeholder="texto..."><?php echo $txtPregunta[4]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta5" name="txtIdPregunta5" value="<?php echo $IdPregunta[4]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 6</label>
                  <textarea class="form-control" id="txtPregunta6" name="txtPregunta6" rows="3" placeholder="texto..."><?php echo $txtPregunta[5]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta6" name="txtIdPregunta6" value="<?php echo $IdPregunta[5]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 7</label>
                  <textarea class="form-control" id="txtPregunta7" name="txtPregunta7" rows="3" placeholder="texto..."><?php echo $txtPregunta[6]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta7" name="txtIdPregunta7" value="<?php echo $IdPregunta[6]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 8</label>
                  <textarea class="form-control" id="txtPregunta8" name="txtPregunta8" rows="3" placeholder="texto..."><?php echo $txtPregunta[7]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta8" name="txtIdPregunta8" value="<?php echo $IdPregunta[7]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 9</label>
                  <textarea class="form-control" id="txtPregunta9" name="txtPregunta9" rows="3" placeholder="texto..."><?php echo $txtPregunta[8]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta9" name="txtIdPregunta9" value="<?php echo $IdPregunta[8]; ?>"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pregunta 10</label>
                  <textarea class="form-control" id="txtPregunta10" name="txtPregunta10" rows="3" placeholder="texto..."><?php echo $txtPregunta[9]; ?></textarea>
                  <input type="hidden" id="txtIdPregunta10" name="txtIdPregunta10" value="<?php echo $IdPregunta[9]; ?>"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div id="alerta-oka" class="alert alert-success alert-dismissible" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                Encuesta creada con exito.
              </div>
              <div id="alerta-err" class="alert alert-danger alert-dismissible" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                Error: No se pudo crear la encuesta.
              </div>
                <button type="button" class="btn btn-primary" onclick="encuesta_save_edit();">Gurdar</button>
              </div>
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 Forta Ingenieria.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script src="./js/CEncuestas.js"></script>
</body>
</html>
