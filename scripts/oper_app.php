<?php
include("../sis.php");
include("$path/libs/conexion.php");
switch ($_GET[o])
  {
      case '1':
                  $objLastSurveysFormActualizar = new poolConnecion();
                  $Sql="UPDATE [SAP].[dbo].[AA_Encuestado] SET [Respuesta] = '$_POST[txtValor]' WHERE [Id] = '$_POST[txtId]'";
                  $con=$objLastSurveysFormActualizar->ConexionSQLSAP();
                  $RSet=$objLastSurveysFormActualizar->QuerySQLSAP($Sql,$con);
          break;
  }
?>
