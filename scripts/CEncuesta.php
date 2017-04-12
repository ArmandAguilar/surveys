<?php
/**
 *Autor : Armando Aguilar L.
 * Class for admin the surveys
 */
class CEncuestas extends poolConnecion
{



  function save_edit_encuesta($info)
  {
    $txtEncuesta = $info->txtEncuesta;
    $IdEncuesta = $info->txtIdEncuesta;
    $txtPregunta[0] = $info->txtPregunta1;
    $txtPregunta[1] = $info->txtPregunta2;
    $txtPregunta[2] = $info->txtPregunta3;
    $txtPregunta[3] = $info->txtPregunta4;
    $txtPregunta[4] = $info->txtPregunta5;
    $txtPregunta[5] = $info->txtPregunta6;
    $txtPregunta[6] = $info->txtPregunta7;
    $txtPregunta[7] = $info->txtPregunta8;
    $txtPregunta[8] = $info->txtPregunta9;
    $txtPregunta[9] = $info->txtPregunta10;
    $txtIdPregunta[0] = $info->txtIdPregunta1;
    $txtIdPregunta[1] = $info->txtIdPregunta2;
    $txtIdPregunta[2] = $info->txtIdPregunta3;
    $txtIdPregunta[3] = $info->txtIdPregunta4;
    $txtIdPregunta[4] = $info->txtIdPregunta5;
    $txtIdPregunta[5] = $info->txtIdPregunta6;
    $txtIdPregunta[6] = $info->txtIdPregunta7;
    $txtIdPregunta[7] = $info->txtIdPregunta8;
    $txtIdPregunta[8] = $info->txtIdPregunta9;
    $txtIdPregunta[9] = $info->txtIdPregunta10;

    $arrayObligado[0] = $info->chkIdPregunta1;
    $arrayObligado[1] = $info->chkIdPregunta2;
    $arrayObligado[2] = $info->chkIdPregunta3;
    $arrayObligado[3] = $info->chkIdPregunta4;
    $arrayObligado[4] = $info->chkIdPregunta5;
    $arrayObligado[5] = $info->chkIdPregunta6;
    $arrayObligado[6] = $info->chkIdPregunta7;
    $arrayObligado[7] = $info->chkIdPregunta8;
    $arrayObligado[8] = $info->chkIdPregunta9;
    $arrayObligado[9] = $info->chkIdPregunta10;
    $Area = $info->IdArea;

    /* we update a name of surveys */
    $Sql = "UPDATE [SAP].[dbo].[AAEncuesta] SET [Encuesta] = '$txtEncuesta' ,[Area] ='$Area' WHERE Id='$IdEncuesta'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);


    /*We update or insert ask */
    foreach ($txtIdPregunta as $key => $value)
     {
          if(!empty($value))
          {
                $Pregunta = $txtPregunta[$key];
                if(!empty($Pregunta))
                {
                  if (!empty($arrayObligado[$key])) {
                      $obligado = "Si";
                  }
                  else{
                    $obligado = "No";
                  }
                  $sql = "UPDATE [SAP].[dbo].[AAPreguntas] SET [Pregunta] = '$txtPregunta[$key]',[Obligado] = '$obligado' WHERE Id='$value'";
                  $obj = new poolConnecion();
                  $con=$obj->ConexionSQLSAP();
                  $RSet=$obj->QuerySQLSAP($sql,$con);
                  $obj->CerrarSQLSAP($RSet,$con);
                }
                else
                {
                  $sql = "Delete FROM [SAP].[dbo].[AAPreguntas] WHERE Id='$value'";
                  $obj = new poolConnecion();
                  $con=$obj->ConexionSQLSAP();
                  $RSet=$obj->QuerySQLSAP($sql,$con);
                  $obj->CerrarSQLSAP($RSet,$con);
                }
          }
          else
          {
                $sql = "INSERT INTO [SAP].[dbo].[AAPreguntas] VALUES ('$IdEncuesta','$txtPregunta[$key]')";
                $obj = new poolConnecion();
                $con=$obj->ConexionSQLSAP();
                $RSet=$obj->QuerySQLSAP($sql,$con);
                $obj->CerrarSQLSAP($RSet,$con);
          }
      }
    return $sql;
  }

  function delete_encuesta($info)
  {
    /* delete survesy */
    $Id = $info->Id;
    $Sql1 = "DELETE FROM [SAP].[dbo].[AAEncuesta] WHERE  Id='$Id'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql1,$con);
    $obj->CerrarSQLSAP($RSet,$con);

    /*Delete  all ask*/
    $Sql2 = "DELETE FROM [SAP].[dbo].[AAPreguntas] WHERE  IdEncuesta = '$Id'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql2,$con);
    $obj->CerrarSQLSAP($RSet,$con);
    return "$Sql1 - $Sql2";
  }
function update_mssql_encuesta($Sql)
{
  $obj = new poolConnecion();
  $con=$obj->ConexionSQLSAP();
  $RSet=$obj->QuerySQLSAP($Sql,$con);
  $obj->CerrarSQLSAP($RSet,$con);
}

}



 ?>
