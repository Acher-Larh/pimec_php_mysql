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

if (isset($_POST['curso']) and isset($_POST['cuerpo_curso']) and isset($_POST['professor']) and isset($_POST['id_estado'])) {
    $values = array(
        "curso" => validate($_POST['curso']),
        "cuerpo" => validate($_POST['cuerpo_curso']),
        "profesor" => validate($_POST['professor']),
        "id_estado" => validate($_POST['id_estado'])
    );
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$$" ?></title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="form-group col">
                <?php $id_curso = insertar_curso($values, $mysqli); ?>
                <?php 
                echo "El curs ha sigut registrat amb la ID: ".$id_curso.".";
                ?>
            </div>
        </div>
    </div>
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