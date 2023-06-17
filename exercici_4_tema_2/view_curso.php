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

// $curso = 0;

$id_curso = 0;
if (isset($_POST['curso'])) {
    $id_curso = $_POST['curso'];
}

$sql_query = "SELECT id_curso, curso, cuerpo, id_estado, id_profesor FROM Cursos WHERE id_curso=$id_curso;";
$curso = (get_db($sql_query, $mysqli))[0];

$sql_query = "SELECT Cursos.id_curso, Cursos.curso, Cursos.id_estado, Cursos.id_profesor, Usuarios.nombre, Usuarios.apellido_primero, Usuarios.apellido_segundo, Usuarios.email, Usuarios.user_name, Usuarios.id_usuario FROM Cursos JOIN Profesores ON Profesores.id_profesor=Cursos.id_profesor JOIN Usuarios ON Profesores.id_usuario=Usuarios.id_usuario WHERE Cursos.id_profesor=" . $curso['id_profesor'] . ";";
$profesor = get_db($sql_query, $mysqli)[0];

$sql_query = "SELECT * FROM Estado JOIN Cursos ON Estado.id_estado=Cursos.id_estado WHERE Cursos.id_estado=" . $curso['id_estado'];
$estado = get_db($sql_query, $mysqli)[0];

$sql_query = "SELECT Cursos.curso, Cursos.cuerpo, Usuarios.nombre, Usuarios.apellido_primero, Usuarios.apellido_segundo, Usuarios.email, Usuarios.fecha_registro FROM Usuarios JOIN Alumnos ON Alumnos.id_usuario=Usuarios.id_usuario JOIN Matricula ON Matricula.id_alumno=Alumnos.id_alumno JOIN Cursos ON Matricula.id_curso=Cursos.id_curso WHERE Cursos.id_curso=$id_curso;";

$alumnos = get_db($sql_query, $mysqli);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curso['curso'] . " - " . $profesor['nombre']; ?></title>
</head>

<body>
    <?php include getcwd() . "/src/templates/header.php"; ?>
    <br>

    <h1>
        <?php echo $curso['curso'] ?>
    </h1>
    <h3>
        Impartit per <?php echo $profesor['nombre'] ?>
    </h3>
    <br>
    <hr style="color:black; background-color:#dee2e6; width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <table class="table" style="display:flex;">
                    <thead>
                        <tr style="display:flex; flex-direction:column; border:1px solid #dee2e6;">
                            <?php
                            foreach (array_keys($curso) as $key) {
                                if ($key == "id_curso") {
                                    echo "<th style='border:none; scope='row'>Identificador Curso</th>";
                                    continue;
                                }
                                if ($key == "id_profesor" || $key == "cuerpo") continue;
                                if ($key == "id_estado") {
                                    echo "<th style='border:none; scope='row'>Estado </th>";
                                    continue;
                                }

                                echo "<th style='border:none; scope='col'>" . ucfirst($key) . "</th>";
                            }
                            echo "<th style='border:none; scope='col'>Profesor</th>";

                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="display:flex; flex-direction:column; border:1px solid #dee2e6">
                            <?php foreach ($curso as $key => $value) {
                                if ($key == "id_profesor" || $key == "cuerpo") continue;

                                if ($key == "id_estado") {
                                    echo "<td style='border:none;'>" . $estado['estado'] . "</td>";
                                    continue;
                                };
                                echo ($key == "id_curso") ? "<th scope='row'>$value</th>" : "<td style='border:none;'>$value</td>";
                            }
                            echo "<td style='border:none;'>" . $profesor['nombre'] . "</td>"
                            ?>
                        </tr>
                    </tbody>
                </table>
                <!-- <span class="border">
                    <?php echo "<strong>" . "Curso: " . $curso['curso'] . "</strong>" ?>
                    <br>
                    <?php echo "Descripción: " . $curso['cuerpo'] ?>
                    <br>
                    <?php echo "Estado: " . $estado['estado']; ?>
                    <br>
                    <?php echo "Profesor: " . $profesor['nombre'] ?>
                </span> -->
            </div>
            <div class="col-sm">
                <table class="table" style="display:flex;">
                    <thead>
                        <tr style="display:flex; flex-direction:column; border:1px solid #dee2e6;">
                            <?php echo "<th style='border:none;'><strong>Profesor: </strong></th>" ?>
                            <th style="border:none;">Apellidos</th>
                            <th style="border:none;">Identificador Profesor</th>
                            <th style="border:none;">Correo Electrónico</th>
                            <th style="border:none;">Nombre de Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="display:flex; flex-direction:column; border:1px solid #dee2e6">
                            <?php echo "<td style='border:none;'>" . $profesor['nombre'] . "</td>" ?>
                            <?php echo "<td style='border:none;'>" . $profesor['apellido_primero'] . " " . $profesor['apellido_segundo'] . "</td>" ?>
                            <?php echo "<td style='border:none;'>" . $profesor['id_profesor'] . "</td>" ?>
                            <?php echo "<td style='border:none;'>" . $profesor['email'] . "</td>" ?>
                            <?php echo "<td style='border:none;'>" . $profesor['user_name'] . "</td>" ?>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <hr style="color:black; background-color:#dee2e6; height: 1px; width: 100%;">

    <?php if (count($alumnos) !== 0) { ?>
        <table class="table" style="border: 1px solid #dee2e6;">
            <thead>
                <tr>
                    <?php
                    foreach (array_keys($alumnos[0]) as $key) {
                        if (str_starts_with($key, "id_") || $key == "") continue;
                        if ($key == "cuerpo") continue;
                        echo "<th scope='col'>" . ucfirst($key) . "</th>";
                    }


                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($alumnos) !== 0) {
                    foreach ($alumnos as $id => $alumno) {
                        echo "<tr>";
                        foreach ($alumno as $key => $value) {
                            if ($key == "cuerpo") continue;

                            if ($value == "") {
                                echo "<th scope='col'> - </th>";
                                continue;
                            }

                            if (str_starts_with($key, "id_") || $key == "") continue;

                            echo ($key == "id_curso") ? "<th scope='row'>$value</th>" : "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <br>
        <div class="container">
            <p>Encara no s'ha matriculat ningun alumne a aquest curs, prema <a href='#'>aquí</a> si vols registrar a algú.</p>
        </div>

    <?php
    }
    ?>

    <hr style="color:black; background-color:#dee2e6; width: 100%;">
    <br>
    <div class="container-fluid">
        <div class="row" style="border:1px solid #cecece;">
            <!-- Need to add theme, buttons -->
            <div class="col-xs-12">
                <h4>
                    <?php echo $curso['curso']; ?>

                </h4>
            </div>
        </div>
        <br>
        <div class="row" style="border:1px solid #cecece;">
            <!-- Need to add theme, buttons -->
            <div class="col-xs-12">
                <em><strong>Descripción:</em></strong>
                <div class="description">
                    <?php echo $curso['cuerpo']; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>