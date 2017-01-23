<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CProyectos.php");
$obj = new CProyectos();
switch ($_GET[o])
  {
    /*show all task */
      case '1':
            $info->idEncuestado = $_POST[idEncuestado];
            $info->idEncuetador = $_POST[idEncuetador];
            $info->idEncuesta = $_POST[idEncuesta];
            $info->idTarea = $_POST[idTarea];
            $obj->apply_surveys($info);
      break;

  }

?>
