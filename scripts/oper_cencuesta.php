<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEncuesta.php");
$obj = new CEncuestas();
switch ($_GET[o])
  {
      case '1':
              $info->IdUsuario = $_POST[txtIdUsuario];
              $info->Encuesta = $_POST[txtEncuesta];
              $info->txtPregunta1 = $_POST[txtPregunta1];
              $info->txtPregunta2 = $_POST[txtPregunta2];
              $info->txtPregunta3 = $_POST[txtPregunta3];
              $info->txtPregunta4 = $_POST[txtPregunta4];
              $info->txtPregunta5 = $_POST[txtPregunta5];
              $info->txtPregunta6 = $_POST[txtPregunta6];
              $info->txtPregunta7 = $_POST[txtPregunta7];
              $info->txtPregunta8 = $_POST[txtPregunta8];
              $info->txtPregunta9 = $_POST[txtPregunta9];
              $info->txtPregunta10 = $_POST[txtPregunta10];
              $obj->save_encuesta($info);
      break;
  }

?>
