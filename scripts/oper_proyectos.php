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

                echo $obj->apply_surveys_random_2($info);
                /*echo "Good";*/
        break;

        case '3':
                echo $obj->Close_Surveys($_POST[idTarea]);
        break;

        case '4':
                  $objLastSurveysFormActualizar = new poolConnecion();
                  $Sql="UPDATE [SAP].[dbo].[AA_Encuestado] SET [Respuesta] = '$_POST[txtValor]' WHERE [IdPregunta] = '$_POST[txtId]' and IdTarea = '$_POST[txtIdTarea]'";
                  $con=$objLastSurveysFormActualizar->ConexionSQLSAP();
                  $RSet=$objLastSurveysFormActualizar->QuerySQLSAP($Sql,$con);
                  echo $Sql;
        break;
        case '5':
                    $idEncuestador = $_POST[idEncuestador];
                    $idEncuestado = $_POST[idEncuestado];
                    $idTarea = $_POST[idTarea];
                    $idEncuesta = $_POST[idEncuesta];
                    /*Set the date */
                    $D = date(d);
                    $M = date(m);
                    $Y = date(Y);
                    $Fecha = "$D/$M/$Y";
                    /*Pregunta 1*/
                    $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta1]','$idEncuesta','$_POST[txtPregunta1]','$Fecha')";
                    $con=$obj->ConexionSQLSAP();
                    $RSet=$obj->QuerySQLSAP($sql,$con);
                    $obj->CerrarSQLSAP($RSet,$con);

                    /*Pregunta 2*/
                    $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta2]','$idEncuesta','$_POST[txtPregunta2]','$Fecha')";
                    $con=$obj->ConexionSQLSAP();
                    $RSet=$obj->QuerySQLSAP($sql,$con);
                    $obj->CerrarSQLSAP($RSet,$con);

                    /*Pregunta 3*/
                    $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta3]','$idEncuesta','$_POST[txtPregunta3]','$Fecha')";
                    $con=$obj->ConexionSQLSAP();
                    $RSet=$obj->QuerySQLSAP($sql,$con);
                    $obj->CerrarSQLSAP($RSet,$con);

                    /*Pregunta 4*/
                    $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta4]','$idEncuesta','$_POST[txtPregunta4]','$Fecha')";
                    $con=$obj->ConexionSQLSAP();
                    $RSet=$obj->QuerySQLSAP($sql,$con);
                    $obj->CerrarSQLSAP($RSet,$con);

                    /*Pregunta 5*/
                    $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta5]','$idEncuesta','$_POST[txtPregunta5]','$Fecha')";
                    $con=$obj->ConexionSQLSAP();
                    $RSet=$obj->QuerySQLSAP($sql,$con);
                    $obj->CerrarSQLSAP($RSet,$con);

                    /*Pregunta 6*/
                    if (!empty($_POST[txtRespuesta6])) {
                      $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta6]','$idEncuesta','$_POST[txtPregunta6]','$Fecha')";
                      $con=$obj->ConexionSQLSAP();
                      $RSet=$obj->QuerySQLSAP($sql,$con);
                      $obj->CerrarSQLSAP($RSet,$con);
                    }
                    /*Pregunta 7*/
                    if (!empty($_POST[txtRespuesta7])) {
                      $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta7]','$idEncuesta','$_POST[txtPregunta7]','$Fecha')";
                      $con=$obj->ConexionSQLSAP();
                      $RSet=$obj->QuerySQLSAP($sql,$con);
                      $obj->CerrarSQLSAP($RSet,$con);
                    }
                    /*Pregunta 8*/
                    if (!empty($_POST[txtRespuesta8])) {
                      $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta8]','$idEncuesta','$_POST[txtPregunta8]','$Fecha')";
                      $con=$obj->ConexionSQLSAP();
                      $RSet=$obj->QuerySQLSAP($sql,$con);
                      $obj->CerrarSQLSAP($RSet,$con);
                    }
                    /*Pregunta 9*/
                    if (!empty($_POST[txtRespuesta9])) {
                      $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta9]','$idEncuesta','$_POST[txtPregunta9]','$Fecha')";
                      $con=$obj->ConexionSQLSAP();
                      $RSet=$obj->QuerySQLSAP($sql,$con);
                      $obj->CerrarSQLSAP($RSet,$con);
                    }
                    /*Pregunta 10*/
                    if (!empty($_POST[txtRespuesta10])) {
                      $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','0','0','$_POST[txtRespuesta10]','$idEncuesta','$_POST[txtPregunta10]','$Fecha')";
                      $con=$obj->ConexionSQLSAP();
                      $RSet=$obj->QuerySQLSAP($sql,$con);
                      $obj->CerrarSQLSAP($RSet,$con);
                    }
                    /* Procesing ListTask */
                    $ArrayTask = split(",", $_POST[txtIdWorskToClose]);
                    foreach ($ArrayTask as $key => $value) {
                      if (!empty($value))
                      {
                          $sql = "UPDATE [SAP].[dbo].[AATareasTeamWork] SET [Evaluada] = 'Si' WHERE IdTeamWork = '$value'";
                          $con=$obj->ConexionSQLSAP();
                          $RSet=$obj->QuerySQLSAP($sql,$con);
                          $obj->CerrarSQLSAP($RSet,$con);
                      }
                    }
        break;

  }
?>
