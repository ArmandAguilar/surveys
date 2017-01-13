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
                $txtEncuesta->$_POST[txtEncuesta];
                $txtIdEncuesta->$_POST[txtIdEncuesta];
                $txtPregunta1->$_POST[txtPregunta1];
                $txtPregunta2->$_POST[txtPregunta2];
                $txtPregunta3->$_POST[txtPregunta3];
                $txtPregunta4->$_POST[txtPregunta4];
                $txtPregunta5->$_POST[txtPregunta5];
                $txtPregunta6->$_POST[txtPregunta6];
                $txtPregunta7->$_POST[txtPregunta7];
                $txtPregunta8->$_POST[txtPregunta8];
                $txtPregunta9->$_POST[txtPregunta9];
                $txtPregunta10->$_POST[txtPregunta10];
                $txtIdPregunta1->$_POST[txtIdPregunta1];
                $txtIdPregunta2->$_POST[txtIdPregunta2];
                $txtIdPregunta3->$_POST[txtIdPregunta3];
                $txtIdPregunta4->$_POST[txtIdPregunta4];
                $txtIdPregunta5->$_POST[txtIdPregunta5];
                $txtIdPregunta6->$_POST[txtIdPregunta6];
                $txtIdPregunta7->$_POST[txtIdPregunta7];
                $txtIdPregunta8->$_POST[txtIdPregunta8];
                $txtIdPregunta9->$_POST[txtIdPregunta9];
                $txtIdPregunta10->$_POST[txtIdPregunta10];
                echo $obj->save_edit_encuesta($info);

      break;

  }

?>
