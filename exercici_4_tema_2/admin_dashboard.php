<?php 
$mysqli = new mysqli('localhost', 'root', '|º@ssw0rd123.pP', 'gestion_alumnos');

if ($mysqli->connect_errno) {


    echo "Error de conexión.";

    echo "Error: Fallo al conectarse a MySQ: \n";

    echo "Error: " . $mysqli->connect_errno . "\n";

    echo "Error: " . $mysqli->connect_error . "\n";

    exit;


}    

$mysqli->set_charset("utf8");



$sql = "SELECT user_name, password FROM Usuarios";

if (!$resultado = $mysqli->query($sql)) {


    echo "Lo sentimos, este sitio web está experimentando problemas.";

    echo "Error: La ejecución de la consulta falló debido a: \n";

    echo "Query: " . $sql . "\n";

    echo "Errno: " . $mysqli->errno . "\n";

    echo "Error: " . $mysqli->error . "\n";

    exit;

}    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Dashboard</title>
        <?php 
            $server_url = $_SERVER['REQUEST_URI'];
            echo "<script> console.log('$server_url'); </script>";
        ?>
        <style>
            body {
                width:80vw;
                display: flex; 
                flex-direction: column; 
                margin-left: 10vw !important;
            }
            .contact-form {
                width:80vw;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
    <body>
        <?php include "./src/templates/nav-bar.php"; ?>


        <div class="jumbotron">
            <h1 class="display-4">LEARNING IS TRAINING!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        <div class="matricular">
            <form method="post" action="matricular_alumne.php">
                <h2>Matricular Alumne</h2>
                <div class="row">
                    <div class="form-group col">
                        <label for="nombre">Nom:</label>
                        <input type="text" class="form-control" id="nombre" aria-describedby="userHelp" placeholder="Introdueix el nom" name="nombre" required>
                        <label for="apellido_primero">Primer Cognom:</label>
                        <input type="text" class="form-control" id="apellido_primero" aria-describedby="userHelp" placeholder="Introdueix el primer cognom" name="apellido_primero" required>
                        <label for="apellido_segundo">Segon Cognom:</label>
                        <input type="text" class="form-control" id="apellido_segundo" aria-describedby="userHelp" placeholder="Introdueix el segon cognom" name="apellido_segundo">
                        
                        <label for="email">Correu Electrónic:</label>
                        <input type="text" class="form-control" id="email" aria-describedby="userHelp" placeholder="Introdueix el correu electrónic" name="email" required>
                    </div>
                    <div class="form-group col">
                        <label for="username" >Nom d'usuari</label>
                        <input type="text" class="form-control" id="username" aria-describedby="userHelp" placeholder="Introdueix el nom d'usuari" name="username" required>
                        <!-- <small id="userHelp" class="form-text text-muted">T'ha d'haver arribat al teu correu electrònic. Si no el trobes arreu(revisa la carpeta de spam), posat en contacte amb el teu tutor o des del següent <a href="<?php echo "/contact.php" ?>">formulari</a>.</small> -->

                        <label for="password">Contrasenya</label>
                        <input type="password" class="form-control" id="password" placeholder="Introdueix una contrasenya" name="password" required>
                    </div>
                    <div class="form-group col">
                        <label for="curso">Cursos</label>
                        <select id="curso" class="custom-select">
                            <option selected>Obre per seleccionar curs</option>
                                <?php "<option value=".$id_curso.">".$curso."</option>" ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>
        <hr>
        <div class="registrar_curs">
            <form method="post" action="registrar_curs.php">
                <h2>Donar d'alta un curs</h2>
                <div class="row">
                    <div class="form-group col">
                        <label for="curso">Nom del Curs:</label>
                        <input type="text" class="form-control" id="curso" aria-describedby="userHelp" placeholder="Introdueix un nom pel curs" name="curso" required>

                        <label for="cuerpo_curso">Descripció del curs:</label>
                        <textarea type="text" class="form-control" id="cuerpo_curso" aria-describedby="userHelp" placeholder="Introdueix un text descriptiu pel curs" name="cuerpo_curso" required></textarea>
                    </div>
                    <div class="form-group col">
                        <label for="professor" >Professor</label>
                        <select id="professor" class="custom-select">
                            <option selected>Selecciona el professor que impartirà aquest curs.</option>
                                <?php "<option value=".$id_professor.">".$professor."</option>" ?>
                        </select>
                        
                        <label for="id_estado">Estat del curs:</label>
                        <select id="id_estado" class="custom-select">
                            <option selected>Seleccionar l'estat en qué es troba el curs.</option>
                                <?php "<option value=".$id_estado.">".$estado."</option>" ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>
        <hr>
        <div class="modificar_matricula">
            <h3>Modificar matrícula</h3>
            <form action="modificar_matricula.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="id_alumne">Alumne:</label>
                        <select id="id_alumne" class="custom-select">
                            <option selected>Seleccionar l'alumne registrat amb la matrícula que vols modificar.</option>
                                <?php "<option value=".$id_alumne.">".$alumne." - ".$id_alumne."</option>" ?>
                        </select>

                        <label for="id_matricula">Matrícula</label>
                        <select id="id_matricula" class="custom-select">
                            <option selected>Selecciona la matrícula que vols modificar.</option>
                                <?php "<option value=".$id_matricula.">".$matricula."</option>" ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>
        <hr>
        <div class="assignar_professor">
            <h3>Assignar un professor a un curs</h3>
            <form action="assignar_professor.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="id_professor">Professor:</label>
                        <select id="id_professor" class="custom-select">
                            <option selected>Seleccionar el professor registrat amb el curs que vols modificar.</option>
                                <?php "<option value=".$id_professor.">".$professor." - ".$id_professor."</option>" ?>
                        </select>

                        <label for="id_curso">Curs</label>
                        <select id="id_curso" class="custom-select">
                            <option selected>Selecciona el curs al que vols assignar aquest professor.</option>
                                <?php "<option value=".$id_curso.">".$curso."</option>" ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>        
        <hr>
        <div class="veure_curs">
        <h3>Selecciona el curs que vols visualitzar</h3>
            <form action="curso_view.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="view_curso">Curs</label>
                        <select id="view_curso" class="custom-select">
                            <option selected>Selecciona el curs al que vols veure.</option>
                            <?php "<option value=".$id_curso.">".$curso."</option>" ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>

        <footer style="width: 80vw; height:500px; background-color:aqua; margin-top:30px;">
            <h3>Peu de página</h3>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>



















<?php
$mysqli->close();
?>