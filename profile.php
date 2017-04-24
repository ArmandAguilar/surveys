<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CProyectos.php");

$objProy = new CProyectos();

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

/* get proyect */

$objNameProyect = new poolConnecion();
$SqlIDP="SELECT [NomProyecto] FROM [SAP].[dbo].[CatalogoDeProyectos] Where NumProyecto = '$_POST[txtNoProyecto]'";

$con=$objNameProyect->ConexionSQLSAP();
$RSet=$objNameProyect->QuerySQLSAP($SqlIDP,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
           $NomProyect = $fila[NomProyecto];
      }
$objNameProyect->CerrarSQLSAP($RSet,$con);

/* get IdSurveys */
$objIdSurveys = new poolConnecion();
$SqlIdSurveys="SELECT [Id],[Encuesta] FROM [SAP].[dbo].[AAEncuesta] Where Area ='$_POST[txtProfile]'";
$con=$objIdSurveys->ConexionSQLSAP();
$RSet=$objIdSurveys->QuerySQLSAP($SqlIdSurveys,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
           $idEncuesta = $fila[Id];
           $Encuesta = $fila[Encuesta];
      }
$objIdSurveys->CerrarSQLSAP($RSet,$con);
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
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Proyectos:<?php echo $_POST[txtNoProyecto]; ?> .- <?php echo $NomProyect; ?> </h3><br>
            <h3 class="box-title">Nombre:<?php echo $_POST[txtName]; ?></h3><br>
            <h3 class="box-title">Perfil:<?php echo $_POST[txtProfile]; ?> </h3><br>
          </div>
          <!-- /.box-header -->

          <!-- /.box-body -->
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tareas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-condensed">
                    <tbody>
                            <tr>
                                <th>&nbsp;</th>
                            </tr>
                            <?php
                                    $i = 0;
                                    $objId = new poolConnecion();
                                    $SqlID="SELECT
                                                [SAP].[dbo].[AATareasTeamWork].[Id]
                                                ,[SAP].[dbo].[AATareasTeamWork].[IdTeamWork]
                                                ,[SAP].[dbo].[AATareasTeamWork].[NoProyecto]
                                                ,[SAP].[dbo].CatalogoDeProyectos.[NomProyecto]
                                                ,[Northwind].[dbo].Usuarios.[Id] As IdUsuarioAEncuestar
                                                ,[Northwind].[dbo].Usuarios.[Nombre]
                                                ,[Northwind].[dbo].Usuarios.[Apellidos]
                                                ,[Northwind].[dbo].Usuarios.[Email]
                                                ,[Northwind].[dbo].Usuarios.[Perfil]
                                                ,[SAP].[dbo].[AATareasTeamWork].[Tarea]
                                                ,[SAP].[dbo].[AATareasTeamWork].[Evaluada]
                                          FROM
                                                [SAP].[dbo].[AATareasTeamWork],
                                                [SAP].[dbo].[CatalogoDeProyectos],
                                                [Northwind].[dbo].[Usuarios]
                                                WHERE
                                                      ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] =  [SAP].[dbo].[CatalogoDeProyectos].[NumProyecto] and
                                                      [SAP].[dbo].[AATareasTeamWork].[IdUsuario] = [Northwind].[dbo].[Usuarios].[Id]) and  ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] = '$_POST[txtNoProyecto]') and ([Northwind].[dbo].[Usuarios].[Id] = '$_POST[txtIdUsuarioSelecionado]') and ([SAP].[dbo].[AATareasTeamWork].[Evaluada] = 'No') and ([SAP].[dbo].[AATareasTeamWork].[Avance] = '100')";

                                    $con=$objId->ConexionSQLSAP();
                                    $RSet=$objId->QuerySQLSAP($SqlID,$con);
                                     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                           {
                                             $ArraysTask[$i] = $fila[Id];
                                             $i++;
                                             /* Get id encuesta for perfil  */
                                            /* $IdEncuesta = 17;*/
                                            #$IdEncuesta = $objProy->Get_Surveys($fila[Perfil]);
                                          }
                                    $objId->CerrarSQLSAP($RSet,$con);

                                    shuffle($ArraysTask);
                                    $NewArrayTask[0] = $ArraysTask[0];
                                    $NewArrayTask[1] = $ArraysTask[1];
                                    $NewArrayTask[2] = $ArraysTask[2];
                                    #Prin the 3 task
                                    $j = 0;
                                    foreach ($NewArrayTask as $key => $value)
                                     {
                                          if (!empty($value))
                                          {

                                              $SqlTask="SELECT
                                                        [SAP].[dbo].[AATareasTeamWork].[Id]
                                                        ,[SAP].[dbo].[AATareasTeamWork].[IdTeamWork]
                                                        ,[SAP].[dbo].[AATareasTeamWork].[NoProyecto]
                                                        ,[SAP].[dbo].CatalogoDeProyectos.[NomProyecto]
                                                        ,[Northwind].[dbo].Usuarios.[Id] As IdUsuarioAEncuestar
                                                        ,[Northwind].[dbo].Usuarios.[Nombre]
                                                        ,[Northwind].[dbo].Usuarios.[Apellidos]
                                                        ,[Northwind].[dbo].Usuarios.[Email]
                                                        ,[Northwind].[dbo].Usuarios.[Perfil]
                                                        ,[SAP].[dbo].[AATareasTeamWork].[Tarea]
                                                        ,[SAP].[dbo].[AATareasTeamWork].[Evaluada]
                                                  FROM
                                                        [SAP].[dbo].[AATareasTeamWork],
                                                        [SAP].[dbo].[CatalogoDeProyectos],
                                                        [Northwind].[dbo].[Usuarios]
                                                        WHERE
                                                              ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] =  [SAP].[dbo].[CatalogoDeProyectos].[NumProyecto] and
                                                              [SAP].[dbo].[AATareasTeamWork].[IdUsuario] = [Northwind].[dbo].[Usuarios].[Id]) and  ([SAP].[dbo].[AATareasTeamWork].[NoProyecto] = '$_POST[txtNoProyecto]') and ([Northwind].[dbo].[Usuarios].[Id] = '$_POST[txtIdUsuarioSelecionado]') and ([SAP].[dbo].[AATareasTeamWork].[Id] = '$value')";
                                                $objTask = new poolConnecion();
                                                $con=$objTask->ConexionSQLSAP();
                                                $RSet=$objTask->QuerySQLSAP($SqlTask,$con);
                                                 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                                       {

                                                            echo "<tr>
                                                                      <td>$fila[Tarea]</td>
                                                                </tr>";
                                                            $listofIdWorks .= "$fila[Id],";
                                                           $j++;
                                                      }
                                                $objTask->CerrarSQLSAP($RSet,$con);
                                          }
                                    }
                             ?>


                  </tbody>
          </table>
          </div>

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Encuesta:<?php echo $Encuesta; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-group">
               <!-- Aqui la encuesta -->
               <div id="Pencuesta" name="Pencuesta">
                 <!-- Fisrt question -->
                 <?php
                           $i = 0;
                           $SurveysObligado = "<table class=\"table table-condensed\">
                                           <tbody>";

                           $Sql="SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' And [Obligado] = 'Si'";
                           $objAks = new poolConnecion();
                           $con=$objAks->ConexionSQLSAP();
                           $RSet=$objAks->QuerySQLSAP($Sql,$con);
                            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                  {
                                         $ArrayAsk[$i] =  $fila[Id];
                                         $i++;
                                  }
                           $objAks->CerrarSQLSAP($RSet,$con);

                           shuffle($ArrayAsk);
                           $NewArrayAks[0] = $ArrayAsk[0];
                           $NewArrayAks[1] = $ArrayAsk[1];
                           $NewArrayAks[2] = $ArrayAsk[2];
                           $NewArrayAks[3] = $ArrayAsk[3];
                           $NewArrayAks[4] = $ArrayAsk[4];
                           $j = 0;
                           $EncuestaVacia = "Si";
                       foreach ($NewArrayAks as $key => $value)
                         {
                             if ($value)
                              {
                                $EncuestaVacia = "No";
                                $j++;
                                $Sql="SELECT [Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' and [Id] = '$value'";
                                $objAksAll = new poolConnecion();
                                $con=$objAksAll->ConexionSQLSAP();
                                $RSet=$objAksAll->QuerySQLSAP($Sql,$con);
                                 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                       {
                                             $Pregunta = $fila[Pregunta];
                                       }
                                $SurveysObligado .= "<tr><td>$Pregunta</td></tr>
                                     <tr>
                                           <td>
                                                 <input type=\"hidden\" name=\"txtPregunta_$j\" id=\"txtPregunta_$j\" value=\"$Pregunta\" />
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"1\" onclick=\"setValAnswers($j,'1');\">
                                                               Simpre
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.75\" onclick=\"setValAnswers($j,'0.75');\">
                                                               Normalmente Si
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.5\" onclick=\"setValAnswers($j,'0.5');\">
                                                               Normalmente No
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.25\" onclick=\"setValAnswers($j,'0.25');\">
                                                               Nunca
                                                           </label>
                                                         </div>

                                                 </div>
                                           </td>
                                     </tr>";
                                   }
                         }
                           $SurveysObligado .= "         </tbody>
                                       </table><script>$('#btn-primarys').show();</script>";

                           echo $SurveysObligado;
                 ?>
                 <!-- end Fisrt question -->
                 <!-- Random Quiestion -->
                 <?php
                           $i=0;
                           $Surveys = "<table class=\"table table-condensed\">
                                           <tbody>";

                           $Sql="SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' And [Obligado] <> 'Si'";
                           $objAks = new poolConnecion();
                           $con=$objAks->ConexionSQLSAP();
                           $RSet=$objAks->QuerySQLSAP($Sql,$con);
                            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                  {
                                         $ArrayAsk[$i] =  $fila[Id];
                                         $i++;
                                  }
                           $objAks->CerrarSQLSAP($RSet,$con);

                           shuffle($ArrayAsk);
                           $NewArrayAks[0] = $ArrayAsk[0];
                           $NewArrayAks[1] = $ArrayAsk[1];
                           $NewArrayAks[2] = $ArrayAsk[2];
                           $NewArrayAks[3] = $ArrayAsk[3];
                           $NewArrayAks[4] = $ArrayAsk[4];
                           $EncuestaVacia = "Si";
                       foreach ($NewArrayAks as $key => $value)
                         {
                             if ($value)
                              {
                                $EncuestaVacia = "No";
                                $j++;
                                $Sql="SELECT [Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' and [Id] = '$value'";
                                $objAksAll = new poolConnecion();
                                $con=$objAksAll->ConexionSQLSAP();
                                $RSet=$objAksAll->QuerySQLSAP($Sql,$con);
                                 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                       {
                                             $Pregunta = $fila[Pregunta];
                                       }
                                $Surveys .= "<tr><td>$Pregunta</td></tr>
                                     <tr>
                                           <td>
                                                 <input type=\"hidden\" name=\"txtPregunta_$j\" id=\"txtPregunta_$j\" value=\"$Pregunta\" />
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"1\" onclick=\"setValAnswers($j,'1');\">
                                                               Simpre
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.75\" onclick=\"setValAnswers($j,'0.75');\">
                                                               Normalmente Si
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.5\" onclick=\"setValAnswers($j,'0.5');\">
                                                               Normalmente No
                                                           </label>
                                                         </div>

                                                 </div>
                                                 <div class=\"form-group\">
                                                       <div class=\"radio\">
                                                           <label>
                                                               <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.25\" onclick=\"setValAnswers($j,'0.25');\">
                                                               Nunca
                                                           </label>
                                                         </div>

                                                 </div>
                                           </td>
                                     </tr>";
                                   }
                         }
                           $Surveys .= "         </tbody>
                                       </table><script>$('#btn-primarys').show();</script>";
                           if ($EncuestaVacia == "Si") {
                             $Surveys = "<h3>Este perfil no tiene una encuesta asignada</h3><script>$('#btn-primarys').hide();</script>";
                           }
                           echo $Surveys;
                 ?>
                 <!-- End Random Quiestion -->
               </div>
              <input type="hidden" name = "txtIdEncuesta" id="txtIdEncuesta"/>
              <input type="hidden" name = "txtIdEncuestador" id="txtIdEncuestador"  value="<?php echo $_SESSION[IdUsuario]; ?>"/>
              <input type="hidden" name = "txtIdEncuestado" id="txtIdEncuestado" />
              <input type="hidden" name = "txtNumProyectos" id="txtNumProyectos" value="<?php echo $_POST[txtNoProyecto]; ?>"/>
              <input type="hidden" name = "txtIdWorskToClose" id="txtIdWorskToClose" value="<?php echo $listofIdWorks ?>" />
              <input type="hidden" name = "txtRespuesta1" id="txtRespuesta1"/>
              <input type="hidden" name = "txtRespuesta2" id="txtRespuesta2"/>
              <input type="hidden" name = "txtRespuesta3" id="txtRespuesta3"/>
              <input type="hidden" name = "txtRespuesta4" id="txtRespuesta4"/>
              <input type="hidden" name = "txtRespuesta5" id="txtRespuesta5"/>
              <input type="hidden" name = "txtRespuesta6" id="txtRespuesta6"/>
              <input type="hidden" name = "txtRespuesta7" id="txtRespuesta7"/>
              <input type="hidden" name = "txtRespuesta8" id="txtRespuesta8"/>
              <input type="hidden" name = "txtRespuesta9" id="txtRespuesta9"/>
              <input type="hidden" name = "txtRespuesta10" id="txtRespuesta10"/>

            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-primary">Evaluar</button>
            </div>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->
        </div>
        <!--/.col (right) -->
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
     fixed layout.    -->

</body>
</html>
