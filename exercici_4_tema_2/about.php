<?php 
$site_title = "Catàleg de cursos";

?>
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

<!-- OBTENIR L'ENCAPÇALAT -->
<?php
ob_start();
include "./src/templates/header.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>

<?php 
$cursos= get_db("SELECT * FROM Cursos", $mysqli);
?><hr>
<div class="container-fluid" style="display: flex; justify-content: center; ">
    <h1>Aqueta és una página d'exemple i no té cap ús per l'exercici.</h1>
    </div>
<!-- DESFER LA CONEXIÓ A LA BASE DE DADES -->
<?php
ob_start();
include "./footer.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>