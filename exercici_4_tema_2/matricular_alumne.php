<?php 

$nombre = "'".$_POST['nombre']."'";
$apellido_primero = "'".$_POST['apellido_primero']."'";
$apellido_segundo = "'".$_POST['apellido_segundo']."'";
$email = "'".$_POST['email']."'";
$username = "'".$_POST['username']."'";
$password = "'".$_POST['password']."'";
// $curso = $_POST['curso'] ? $_POST['curso'] : NULL ;
// echo $user." - ".$password;

$mysqli = new mysqli('localhost', 'root', '|º@ssw0rd123.pP', 'gestion_alumnos');

if ($mysqli->connect_errno) {


    echo "Error de conexión.";

    echo "Error: Fallo al conectarse a MySQ: \n";

    echo "Error: " . $mysqli->connect_errno . "\n";

    echo "Error: " . $mysqli->connect_error . "\n";

    exit;


}    

$mysqli->set_charset("utf8");


// $sql = "SELECT * FROM Usuarios";
$sql = "INSERT INTO Usuarios 
(id_usuario, id_role, nombre, apellido_primero, apellido_segundo, email, user_name, password, cookie, fecha_registro, fecha_cookie) 
VALUES (NULL, 1, $nombre, $apellido_primero, $apellido_segundo, $email, $username, $password, NULL, NULL, NULL);";

if ( $mysqli->query($sql)) {
    echo "Fila insertada";
    }
else {
    echo "Error de MySQL debido a: \n";
    echo  $mysqli->error . "\n";            
}

$mysqli->close();

?>