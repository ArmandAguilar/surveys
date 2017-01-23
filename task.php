<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");

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
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Proyectos</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body no-padding">
                  <table class="table table-condensed">
                          <tbody>
                                  <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Proyecto</th>
                                      <th>Tarea</th>
                                      <th>Usuario</th>
                                      <th>Encuesta</th>
                                  </tr>
                                  <?php
                                          $objTable = new poolConnecion();
                                          $SqlID="SELECT
                                                      [SAP].[dbo].[AATareasTeamWork].[Id]
	                                                    ,[SAP].[dbo].[AATareasTeamWork].[IdTeamWork]
                                                      ,[SAP].[dbo].[AATareasTeamWork].[NoProyecto]
                                                      ,[SAP].[dbo].CatalogoDeProyectos.[NomProyecto]
                                                      ,[Northwind].[dbo].Usuarios.[Id] As IdUsuarioAEncuestar
                                                      ,[Northwind].[dbo].Usuarios.[Nombre]
                                                      ,[Northwind].[dbo].Usuarios.[Apellidos]
                                                      ,[SAP].[dbo].[AATareasTeamWork].[Tarea]
                                                      ,[SAP].[dbo].[AATareasTeamWork].[Evaluada]
                                                FROM
                                                      [SAP].[dbo].[AATareasTeamWork],
                                                      [SAP].[dbo].[CatalogoDeProyectos],
                                                      [Northwind].[dbo].[Usuarios]
                                                      WHERE
                                                            ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] =  [SAP].[dbo].[CatalogoDeProyectos].[NumProyecto] and
                                                            [SAP].[dbo].[AATareasTeamWork].[IdUsuario] = [Northwind].[dbo].[Usuarios].[Id]) and  ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] = '$_GET[NumProy]')";
                                          $con=$objTable->ConexionSQLSAP();
                                          $RSet=$objTable->QuerySQLSAP($SqlID,$con);
                                           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                                 {
                                                   $i++;
                                   ?>
                                 <tr>
                                    <td><?php echo $i; ?>.</td>
                                    <td><?php echo $fila[NoProyecto]; ?></td>
                                    <td><?php echo $fila[Tarea]; ?></td>
                                    <td><?php echo "$fila[Nombre] $fila[Apellidos]"; ?></td>
                                    <td><div data-toggle="modal" data-target="#myModal" style="cursor:pointer" onclick="set_surveys(<?php echo $fila[IdUsuarioAEncuestar]; ?>,<?php echo $fila[IdTeamWork]; ?>)"> Aplicar encuesta</div></td>

                                </tr>
                                <?php
                                                }
                                 ?>
                        </tbody>
                </table>
          </div>

          <!-- /.box-body -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Encuestas</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="cboEncuesta" id="cboEncuesta">
                    <option value="0">--------------------------</option>
                    <?php
                              $objTable = new poolConnecion();
                              $SqlID="SELECT [Id],[Encuesta] FROM [SAP].[dbo].[AAEncuesta] order by [Id] asc";
                              $con=$objTable->ConexionSQLSAP();
                              $RSet=$objTable->QuerySQLSAP($SqlID,$con);
                               while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                     {
                                       $i++;
                      ?>
                      <option value="<?php echo $fila[Id]; ?>"><?php echo $fila[Encuesta]; ?></option>
                      <?php
                            }
                      ?>
                  </select>
                  <input type="hidden" name = "txtEncuestador" id="txtEncuestador" />
                  <input type="hidden" name = "txtIdEncuestado" id="txtIdEncuestado" />
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="apply_surveys();">Aplicar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
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
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="js/CProyectos.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
