<?php
$entrada[0][Prgunta0] ="Pregunta 0";
$entrada[1][Prgunta1] ="Pregunta 1";
$entrada[2][Prgunta2] ="Pregunta 2";
$entrada[3][Prgunta3] ="Pregunta 3";
$entrada[4][Prgunta4] ="Pregunta 4";

$entrada[0][Prgunta0][Id0] ="P0";
$entrada[1][Prgunta1][Id1] ="P1";
$entrada[2][Prgunta2][Id2] ="P2";
$entrada[3][Prgunta3][Id3] ="P3";
$entrada[4][Prgunta4][Id4] ="P4";

 array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$claves_aleatorias = array_rand($entrada, 2);
echo $entrada[$claves_aleatorias[0][PRegunta0]] ."-" . $entrada[$claves_aleatorias[0][PRegunta0][Id0]] . "\n";
#echo $entrada[$claves_aleatorias[1]] . . "\n";
?>
