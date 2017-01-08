<?php
/**
 * Autor : Armando Aguilar  L.
 *Description : Class for Ask in each surveys
 */
class CPreguntas extends poolConnecion
{

  function save_pregunta($info)
  {
    $IdEcuesta = $info -> IdEcuesta;
    $Pregunta = $info -> Pregunta;
    $Sql = "INSERT INTO [SAP].[dbo].[AAPregunta] VALUES ('0','$IdEcuesta,'$Pregunta')";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);
  }
  function save_edit_pregunta($info)
  {
    $Id = $info -> Id;
    $Pregunta = $info -> Pregunta;
    $Sql = "UPDATE [SAP].[dbo].[AAPregunta] SET [Pregunta] = '$Pregunta' WHERE Id='$Id'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);

  }
  function delete_pregunta($info)
  {
    $Id = $info -> Id;
    $Sql = "DELETE FROM [SAP].[dbo].[AAPregunta] WHERE Id='$Id'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);
  }
}



 ?>
