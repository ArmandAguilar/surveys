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
  function apply_surveys_random($info)
  {
    $idEncuestador = $info->idEncuestador;
    $idEncuestado = $info->idEncuestado;
    $idTarea = $info->idTarea;
    $idEncuesta = $info->idEncuesta;
    /*get the number of questions */
    $NumAsk = 0;
    /*$obj = new poolConnecion();
    $Sql="SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] WHERE [IdEncuesta] = '$idEncuesta'";
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
              $ArrayID[$NumAsk] = $fila[Id];
              $NumAsk++;
           }
    $obj->CerrarSQLSAP($RSet,$con);
    /*insert in teh table the surveys*/
    /*foreach ($ArrayID as $key => $value) {
      if (!empty($value))
      {
        $sql = "INSERT INTO [SAP].[dbo].[AA_Encuestado] VALUES ('$idEncuestado','$idEncuestador','$idTarea','$value','0','$idEncuesta')";
        $con=$obj->ConexionSQLSAP();
        $RSet=$obj->QuerySQLSAP($sql,$con);
        $obj->CerrarSQLSAP($RSet,$con);
      }
    }*/

    /*change the staus of 0 in field Evaluado*/
    /*$Sql="UPDATE [SAP].[dbo].[AATareasTeamWork] SET [Evaluada] = 'Si' WHERE [IdTeamWork]='$idTarea'";
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);*/

    /* print the survey in random mode */
    /* we create a array with all ask */
    $i = 0;
    $Surveys = "<table class=\"table table-condensed\">
                    <tbody>";

    $Sql="SELECT [Id],[IdEncuesta],[Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta'";
    $objAks = new poolConnecion();
    $con=$objAks->ConexionSQLSAP();
    $RSet=$objAks->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
                  $ArrayAsk[$i] =  $fila[Id];
                  $i++;
           }
    $objAks->CerrarSQLSAP($RSet,$con);


    $claves_aleatorias = array_rand($ArrayAsk, 6);
$j = 0;
foreach ($claves_aleatorias as $key => $value)
  {
      if ($value)
       {
         $j++;
         $Sql="SELECT [Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' and [Id] = '$ArrayAsk[$claves_aleatorias[0]]'";
         $objAksAll = new poolConnecion();
         $con=$objAksAll->ConexionSQLSAP();
         $RSet=$objAksAll->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                       $Pregunta = $fila[Pregunta];

                }

         $Surveys .= "$Sql <tr><td>$Pregunta</td></tr>
              <tr>
                    <td>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"1\" onclick=\"setValPregunta('$vale','1')\">
                                        Simpre
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.75\" onclick=\"setValPregunta('$vale','0.75')\">
                                        Normalmente Si
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.5\" onclick=\"setValPregunta('$vale','0.5')\">
                                        Normalmente No
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.25\" onclick=\"setValPregunta('$vale','0.25')\">
                                        Nunca
                                    </label>
                                  </div>

                          </div>
                    </td>
              </tr>";
            }
  }
    $Surveys .= "         </tbody>
                </table>";
    return $Surveys;
  }

}

?>
