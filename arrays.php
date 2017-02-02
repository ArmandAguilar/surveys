<?php
$entrada = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$claves_aleatorias = array_rand($entrada, 2);
echo $entrada[$claves_aleatorias[0]] . "\n";
echo $entrada[$claves_aleatorias[1]] . "\n";
?>
