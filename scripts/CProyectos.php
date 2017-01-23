<?php
/**
 * Autor : Armando Aguilar  L.
 *Description : Class for ask the task of each rpoyect
 */
class CProyectos extends poolConnecion
{

  function apply_surveys($info)
  {
    $idEncuestador = $info->idEncuestador;
    $idEncuestado = $info->idEncuestado;
    $idTarea = $info->idTarea;
    $idEncuesta = $info->idEncuesta;
    /*get the number of questions */
    $NumAsk = 0;
    $obj = new poolConnecion();
    $Sql="SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] WHERE [IdEncuesta] = '$idEncuesta'";
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
              $ArrayID[$NumAsk] = $fila[Id];
              $NumAsk++;
           }
    $obj->CerrarSQLNorthwind($RSet,$con);
    /*insert in teh table the surveys*/
    foreach ($ArrayID as $key => $value) {
      if (!empty($value))
      {
        $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','$idTarea','$value','0','$idEncuesta')";
        $con=$obj->ConexionSQLSAP();
        $RSet=$obj->QuerySQLSAP($sql,$con);
        $obj->CerrarSQLSAP($RSet,$con);
      }
    }

    /*change tehe ststa of o in field Evaluado*/
    $Sql="UPDATE [SAP].[dbo].[AATareasTeamWork] SET [Evaluada] = 'Si' WHERE [IdTeamWork]='$idTarea'";
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);
    return $sql;
  }

}

?>
