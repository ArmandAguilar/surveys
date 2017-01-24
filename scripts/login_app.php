<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");
if($_GET[o]=='1')
{
        $Redirecionar=0;
        $objLogin = new poolConnecion();
        $Sql="Select Id,Nombre,Apellidos,Avatar,CobranzaPerfil,Acronimo From Usuarios Where Nombre='$_POST[txtUser]' And Pwd='$_POST[txtPassword]'";
        $con=$objLogin->ConexionSQLNorthwind();
        $RSet=$objLogin->QuerySQLNorthwind($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {
                      $Redirecionar=1;
                      $_SESSION["Usuario"]="$fila[Nombre] $fila[Apellidos]";
                      $_SESSION["IdUsuario"]="$fila[Id]";
                      $_SESSION["CobranzaPerfil"]=$fila[CobranzaPerfil];
                      $_SESSION["IdEncuesta"]=$_POST[IdEncuesta];

                      $Avatar = $fila[Avatar];
                      if(!empty($Avatar))
                      {
                          $_SESSION["Avatar"] = $Avatar;
                      }
                      else{
                          $_SESSION["Avatar"] = "img/av1.png";
                  }

                }
         $objLogin->CerrarSQLNorthwind($RSet,$con);
}
 echo $Redirecionar;
?>
