<?php
/**
 *Autor : Armando Aguilar L.
 * Class for admin the surveys
 */
class CEncuestas extends poolConnecion
{

  function save_encuesta($info)
  {
    /*we create a inser to AAEncuesta*/
    $IdUsuario = $info->IdUsuario;
    $Encuesta = $info->Encuesta;
    $arrayAks[0] = $info->Pregunta1;
    $arrayAks[1] = $info->Pregunta2;
    $arrayAks[2] = $info->Pregunta3;
    $arrayAks[3] = $info->Pregunta4;
    $arrayAks[4] = $info->Pregunta5;
    $arrayAks[5] = $info->Pregunta6;
    $arrayAks[6] = $info->Pregunta7;
    $arrayAks[7] = $info->Pregunta8;
    $arrayAks[8] = $info->Pregunta9;
    $arrayAks[9] = $info->Pregunta10;

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
    $d = date(d);
    $m = date(m);
    $y = date(Y);
    $Fecha = "$d/$m/$y";
      $Sql = "INSERT INTO [SAP].[dbo].[AAEncuesta] VALUES ('$IdUsuario','$Encuesta','$Area','$Fecha')";
      $obj = new poolConnecion();
      $con=$obj->ConexionSQLSAP();
      $RSet=$obj->QuerySQLSAP($Sql,$con);
      $obj->CerrarSQLSAP($RSet,$con);
    /* get the id of surveys */
    $objLastId = new poolConnecion();
    $SqlID="SELECT [Id] FROM [SAP].[dbo].[AAEncuesta] order by [Id] asc";
    $con=$objLastId->ConexionSQLSAP();
    $RSet=$objLastId->QuerySQLSAP($SqlID,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
               $IdEncuesta = $fila[Id];
           }
     $objLastId->CerrarSQLSAP($RSet,$con);
     /* save the ask in the table AAPreguntas */
     foreach ($arrayAks as $key => $value) {
       if (!empty($value)) {

               $obligado = "No";
               if ($arrayObligado[$key] == 'true') {
                   $obligado = "Si";
               }
               else{
                 $obligado = "No";
               }
                $SqlAsk = "INSERT INTO [SAP].[dbo].[AAPreguntas] VALUES ('$IdEncuesta','$value','$obligado')";
                $obj = new poolConnecion();
                $con=$obj->ConexionSQLSAP();
                $RSet=$obj->QuerySQLSAP($SqlAsk,$con);
                $obj->CerrarSQLSAP($RSet,$con);
       }
     }
      return $SqlAsk;
  }

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
                $obligado = "No";
                $Pregunta = $txtPregunta[$key];
                if(!empty($Pregunta))
                {
                  if ($arrayObligado[$key] == 'true') {
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

            if (!empty($txtPregunta[$key]))
            {
              $obligado = "No";

              if ($arrayObligado[$key] == 'true')
                {
                   $obligado = "Si";
               }
              else{
                    $obligado = "No";
                 }
                $sql = "INSERT INTO [SAP].[dbo].[AAPreguntas] VALUES ('$IdEncuesta','$txtPregunta[$key]','$obligado')";
                $obj = new poolConnecion();
                $con=$obj->ConexionSQLSAP();
                $RSet=$obj->QuerySQLSAP($sql,$con);
                $obj->CerrarSQLSAP($RSet,$con);
            }

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
