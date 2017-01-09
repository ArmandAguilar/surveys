<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEncuesta.php");
$obj = new CEncuestas();
switch ($_GET[o])
  {
      case '1':
              $info->$_POST[txtEncuesta];
              $info->$_POST[txtPregunta1];
              $info->$_POST[txtPregunta2];
              $info->$_POST[txtPregunta3];
              $info->$_POST[txtPregunta4];
              $info->$_POST[txtPregunta5];
              $info->$_POST[txtPregunta6];
              $info->$_POST[txtPregunta7];
              $info->$_POST[txtPregunta8];
              $info->$_POST[txtPregunta9];
              $info->$_POST[txtPregunta10];
              $obj->save_encuesta($info);
      break;
  }

?>
