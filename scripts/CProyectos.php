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
  function apply_surveys_random_2($info)
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
    $obj->CerrarSQLSAP($RSet,$con);*/
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


    shuffle($ArrayAsk);
    $NewArrayAks[0] = $ArrayAsk[0];
    $NewArrayAks[1] = $ArrayAsk[1];
    $NewArrayAks[2] = $ArrayAsk[2];
    $NewArrayAks[3] = $ArrayAsk[3];
    $NewArrayAks[4] = $ArrayAsk[4];
    $j = 0;
foreach ($NewArrayAks as $key => $value)
  {
      if ($value)
       {
         $j++;
         $Sql="SELECT [Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' and [Id] = '$value'";
         $objAksAll = new poolConnecion();
         $con=$objAksAll->ConexionSQLSAP();
         $RSet=$objAksAll->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                      $Pregunta = $fila[Pregunta];
                }
         $Surveys .= "<tr><td>$Pregunta</td></tr>
              <tr>
                    <td>
                          <input type=\"hidden\" name=\"txtPregunta_$j\" id=\"txtPregunta_$j\" value=\"$Pregunta\">
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"1\" onclick=\"setValAnswers($j,'1');\">
                                        Simpre
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.75\" onclick=\"setValAnswers($j,'0.75');\">
                                        Normalmente Si
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.5\" onclick=\"setValAnswers($j,'0.5');\">
                                        Normalmente No
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.25\" onclick=\"setValAnswers($j,'0.25');\">
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
  function apply_surveys_random($info)
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
    $obj->CerrarSQLSAP($RSet,$con);
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


    shuffle($ArrayAsk);
    $NewArrayAks[0] = $ArrayAsk[0];
    $NewArrayAks[1] = $ArrayAsk[1];
    $NewArrayAks[2] = $ArrayAsk[2];
    $NewArrayAks[3] = $ArrayAsk[3];
    $NewArrayAks[4] = $ArrayAsk[4];
    $j = 0;
foreach ($NewArrayAks as $key => $value)
  {
      if ($value)
       {
         $j++;
         $Sql="SELECT [Pregunta] FROM [SAP].[dbo].[AAPreguntas] Where [IdEncuesta] = '$idEncuesta' and [Id] = '$value'";
         $objAksAll = new poolConnecion();
         $con=$objAksAll->ConexionSQLSAP();
         $RSet=$objAksAll->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                      $Pregunta = $fila[Pregunta];
                }
         $Surveys .= "<tr><td>$Pregunta</td></tr>
              <tr>
                    <td>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"1\" onclick=\"setValPregunta('$value','1')\">
                                        Simpre
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.75\" onclick=\"setValPregunta('$value','0.75')\">
                                        Normalmente Si
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.5\" onclick=\"setValPregunta('$value','0.5')\">
                                        Normalmente No
                                    </label>
                                  </div>

                          </div>
                          <div class=\"form-group\">
                                <div class=\"radio\">
                                    <label>
                                        <input type=\"radio\" name=\"rdbtn_$j\" id=\"rdbtn_$j\" value=\"0.25\" onclick=\"setValPregunta('$value','0.25')\">
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
  function Close_Surveys($idTarea)
  {
    $valor  = "Si";
    /*change the staus of 0 in field Evaluado*/
    $Sql="UPDATE [SAP].[dbo].[AATareasTeamWork] SET [Evaluada] = 'Si' WHERE [IdTeamWork]='$idTarea'";
    $obj = new poolConnecion();
    $con=$obj->ConexionSQLSAP();
    $RSet=$obj->QuerySQLSAP($Sql,$con);
    $obj->CerrarSQLSAP($RSet,$con);

    return $valor;
  }
  function Get_Surveys($Profile)
  {
    $Sql="SELECT [Id] FROM [SAP].[dbo].[AAEncuesta] Where [Area] = '$Profile'";
    $objIdSurveys = new poolConnecion();
    $con=$objIdSurveys->ConexionSQLSAP();
    $RSet=$objIdSurveys->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
                 $IdSurverys = $fila[Id];
           }
     return $IdSurverys;
  }

}

?>
