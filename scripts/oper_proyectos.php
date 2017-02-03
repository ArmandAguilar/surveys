<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CProyectos.php");
$obj = new CProyectos();
switch ($_GET[o])
  {
    /*show all task */
      case '1':
            $info->idEncuestador = $_POST[idEncuestador];
            $info->idEncuestado = $_POST[idEncuestado];
            $info->idTarea = $_POST[idTarea];
            $info->idEncuesta = $_POST[idEncuesta];

            echo $obj->apply_surveys($info);
      break;
      case '2':
                $info->idEncuestador = $_POST[idEncuestador];
                $info->idEncuestado = $_POST[idEncuestado];
                $info->idTarea = $_POST[idTarea];
                $info->idEncuesta = $_POST[idEncuesta];

                /*echo $obj->apply_surveys_random($info);*/
                echo "Good";
        break;

  }
?>
