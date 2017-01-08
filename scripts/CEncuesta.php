<?php
/**
 *Autor : Armando Aguilar L.
 * Class for admin the surveys
 */
class CEncuestas extends poolConnecion
{

  function save_encuesta($info)
  {
    $IdUsuario = $info->IdUsuario;
    $Encuesta = $info->Encuesta;
    $Area = $info->Area;
    $d = date(d);
    $m = date(m);
    $y = date(Y);
    $Fecha = "$d/$m/$y";
      $Sql = "INSERT INTO [SAP].[dbo].[AAEncuesta] VALUES ('$IdUsuario','$Encuesta','$Area','$Fehca')";
      $obj = new poolConnecion();
      $con=$obj->ConexionSQLSAP();
      $RSet=$obj->QuerySQLSAP($Sql,$con);
      $obj->CerrarSQLSAP($RSet,$con);
      return $Sql;
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
