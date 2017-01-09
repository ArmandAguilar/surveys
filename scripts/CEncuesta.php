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
    $Area = ".";
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
    					 $IdEcuesta = $fila[Id];
    			 }
     $objLastId->CerrarSQLSAP($RSet,$con);
     /* save the ask in the table AAPreguntas */
     foreach ($arrayAks as $key => $value) {
       if (!empty($vale)) {
                $SqlAsk = "INSERT INTO [SAP].[dbo].[AAPregunta] VALUES ('$IdEcuesta','$value')";
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
    $Id = $info->Id;
    $Encuesta = $info->Encuesta;
    $Area = $info->Area;
    $Sql = "UPDATE [SAP].[dbo].[AAEncuesta] SET [Encuesta] = '$Encuesta' ,[Area] = '$Area' WHERE Id='$Id'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);
    return $Sql;
  }
  function delete_encuesta($info)
  {
    $Id = $info->Id;
    $Sql = "DELETE FROM [SAP].[dbo].[AAEncuesta] WHERE  Id=''";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);
    return $Sql;
  }


}



 ?>
