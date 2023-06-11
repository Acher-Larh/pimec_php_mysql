<?php 
session_start(); 

$mysqli = new mysqli('localhost', 'admin', '|º@ssw0rd123.pP', 'gestion_alumnos');

if ($mysqli->connect_errno) {


    echo "Error de conexión.";

    echo "Error: Fallo al conectarse a MySQ: \n";

    echo "Error: " . $mysqli->connect_errno . "\n";

    echo "Error: " . $mysqli->connect_error . "\n";

    exit;


}    

$mysqli->set_charset("utf8");


?>