<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEncuesta.php");
$obj = new CEncuestas();
switch ($_GET[o])
  {
    /*insert */
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
      /*delete*/
      case '2':
              $info -> Id = $_POST[Id];
              echo $obj->delete_encuesta($info);
      break;
      /*update*/
      case '3':
                $info->txtEncuesta = $_POST[txtEncuesta];
                $info->txtIdEncuesta = $_POST[txtIdEncuesta];
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
                $info->txtIdPregunta1 = $_POST[txtIdPregunta1];
                $info->txtIdPregunta2 = $_POST[txtIdPregunta2];
                $info->txtIdPregunta3= $_POST[txtIdPregunta3];
                $info->txtIdPregunta4 = $_POST[txtIdPregunta4];
                $info->txtIdPregunta5 = $_POST[txtIdPregunta5];
                $info->txtIdPregunta6 = $_POST[txtIdPregunta6];
                $info->txtIdPregunta7 = $_POST[txtIdPregunta7];
                $info->txtIdPregunta8 = $_POST[txtIdPregunta8];
                $info->txtIdPregunta9 = $_POST[txtIdPregunta9];
                $info->txtIdPregunta10 = $_POST[txtIdPregunta10];

                echo $obj->save_edit_encuesta($info);
                /*echo "OKA";*/
      break;

  }

?>
