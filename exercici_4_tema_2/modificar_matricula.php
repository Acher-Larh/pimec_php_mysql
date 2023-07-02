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


if (isset($_POST['matricula'])) {
    $id_matricula = $_POST['matricula'];
} else {
    exit("Aquesta és una página auxiliar, només se suposa que hi accedeixis mitjançant un formulari.");
}

$sql_query = "SELECT * FROM Matricula WHERE id_matricula=$id_matricula;";
$matricula = (get_db($sql_query, $mysqli))[0];


$sql_query = "SELECT id_curso, curso, cuerpo, id_estado, id_profesor FROM Cursos WHERE id_curso=" . $matricula['id_curso'] . ";";
$curso = (get_db($sql_query, $mysqli))[0];

$sql_query = "SELECT Cursos.id_curso, Cursos.curso, Cursos.id_estado, Cursos.id_profesor, Usuarios.nombre, Usuarios.apellido_primero, Usuarios.apellido_segundo, Usuarios.email, Usuarios.user_name, Usuarios.id_usuario FROM Cursos JOIN Profesores ON Profesores.id_profesor=Cursos.id_profesor JOIN Usuarios ON Profesores.id_usuario=Usuarios.id_usuario WHERE Cursos.id_profesor=" . $curso['id_profesor'] . ";";
$profesor = get_db($sql_query, $mysqli)[0];

$sql_query = "SELECT * FROM Estado JOIN Cursos ON Estado.id_estado=Cursos.id_estado WHERE Cursos.id_estado=" . $curso['id_estado'];
$estado = get_db($sql_query, $mysqli)[0];

$sql_query = "SELECT  Cursos.curso, Cursos.cuerpo, Usuarios.id_usuario, Usuarios.nombre, Usuarios.apellido_primero, Usuarios.apellido_segundo, Usuarios.email, Usuarios.fecha_registro, Usuarios.user_name FROM Usuarios JOIN Alumnos ON Alumnos.id_usuario=Usuarios.id_usuario JOIN Matricula ON Matricula.id_alumno=Alumnos.id_alumno JOIN Cursos ON Matricula.id_curso=Cursos.id_curso WHERE Alumnos.id_alumno=" . $matricula['id_alumno'] . ";";
$alumnos = get_db($sql_query, $mysqli)[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curso['curso'] . " - " . $profesor['nombre']; ?></title>
</head>

<body>
    <!-- <script>
        function remove_enrollment(form) {
            confirm("Estas segur de que vols eliminar aquesta matrícula?", form.submit())

        }

        function reset_password(form) {
            confirm("Segur que vols restablir la contraseña d'aquest usuari?", form.submit())
        }
    </script> -->
    <?php include getcwd() . "/src/templates/header.php"; ?>
    <br>
    <h1>
        <?php echo $alumnos['nombre'] . " " . $alumnos['apellido_primero'] . " " . $alumnos['apellido_segundo']; ?>

    </h1>
    <h3>
        <?php echo $curso['curso']; ?> - Impartit per <?php echo $profesor['nombre']; ?>

    </h3>
    <br>
    <hr style="color:black; background-color:#dee2e6; width: 100%;">
    <div class="matricula">
        <h2>Modificar Matricula</h2>
        <br>
        <div class="row">
            <div class="form-group col">
            <form method="post" action="eliminar_matricula.php">
                    <button id="drop-row" class="btn btn-danger"  value="<?php echo $matricula['id_matricula'];?>" name="remove-enrollment" style="width:80vw;">Eliminar</button>
            </div>
            </form>
        </div>
            <div class="form-group col">

                <table class="table" style="border: 1px solid #dee2e6; width: 80vw; padding:10vw;">
                    <thead>
                        <tr>
                            <?php
                            foreach (array_keys($alumnos) as $key) {
                                echo "<th scope='col'>" . ucfirst($key) . "</th>";
                            }


                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($alumnos) !== 0) {
                            foreach ($alumnos as $id => $alumno) {
                                echo "<td> ".$alumno." </td>";
                            }
                        }
                        ?>
                    </tbody>
                </table>

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