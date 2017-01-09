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
              $info->Pregunta1 = $_POST[txtPregunta1];
              $info->Pregunta2 = $_POST[txtPregunta2];
              $info->Pregunta3 = $_POST[txtPregunta3];
              $info->Pregunta4 = $_POST[txtPregunta4];
              $info->Pregunta5 = $_POST[txtPregunta5];
              $info->Pregunta6 = $_POST[txtPregunta6];
              $info->Pregunta7 = $_POST[txtPregunta7];
              $info->Pregunta8 = $_POST[txtPregunta8];
              $info->Pregunta9 = $_POST[txtPregunta9];
              $info->Pregunta10 = $_POST[txtPregunta10];
              echo $obj->save_encuesta($info);
      break;
  }

?>
