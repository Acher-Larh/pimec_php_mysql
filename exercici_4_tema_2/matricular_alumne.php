<!-- FER LA CONEXIÓ A LA BASE DE DADES -->
<?php
ob_start();
include "./db_connect.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>

<!-- INICIALITZAR LA FUNCION GET_DB() -->
<?php
ob_start();
include "./get_db.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>
<?php

if (isset($_POST['nombre']) and isset($_POST['apellido_primero']) and isset($_POST['apellido_segundo']) and isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password'])){
    $values = array(
        'nombre' => validate($_POST['nombre']),
        'apellido_primero' => validate($_POST['apellido_primero']),
        'apellido_segundo' => validate($_POST['apellido_segundo']),
        'email' => validate($_POST['email']),
        'username' => validate($_POST['username']),
        'password' => validate($_POST['password']),
        'curso' => validate($_POST['curso'])
    );
} 

matricular_alumno($values, $mysqli);

?>
<?php
ob_start();
include "./src/templates/header.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>

<h1 style="margin-left: 30vw;">Matricula registrada</h1>

<!-- DESFER LA CONEXIÓ A LA BASE DE DADES -->
<?php
ob_start();
include "./footer.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>
</body>

</html>