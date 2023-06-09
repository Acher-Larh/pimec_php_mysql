
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

$cursos = get_db("SELECT * FROM Cursos;", $mysqli);


$profesores = get_db("SELECT * FROM Profesores JOIN Usuarios ON Profesores.id_usuario=Usuarios.id_usuario WHERE id_role=2;", $mysqli);

$alumnos = get_db("SELECT * FROM Alumnos JOIN Usuarios ON Alumnos.id_usuario=Usuarios.id_usuario;", $mysqli);

$site_title = "Admin Dashboard";



include getcwd()."/src/templates/header.php";

?>

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
                        <select id="curso" class="custom-select" name="curso">
                            <option selected>Obre per seleccionar curs</option>
                                <?php 
                                    for($i=0; $i<count($cursos); $i++){
                                        echo "<option value='".$cursos[$i]["id_curso"]."'>".$cursos[$i]["curso"]." - id:".$cursos[$i]["id_curso"]."</option>";                   
                                    }
                                ?>
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
                        <select id="professor" class="custom-select" name="professor">
                            <option selected>Selecciona el professor que impartirà aquest curs.</option>
                            <?php 
                                    for($i=0; $i<count($profesores); $i++){
                                        echo "<option value='".$profesores[$i]["id_profesor"]."'>".$profesores[$i]["nombre"]."</option>";                   
                                    }
                                ?>
                        </select>
                        <label for="id_estado">Estat del curs:</label>
                        <select id="id_estado" class="custom-select" name="id_estado">
                            <option selected>Seleccionar l'estat en qué es troba el curs.</option>
                            <option value="1">Oberta</option>
                            <option value="2">Tancada</option>
                            <option value="3">Limbo</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>
        <hr>
        <div class="modificar_matricula">
            <h3>Modificar matrícula</h3>
            <form action="seleccionar_matricula.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="id_alumne">Alumne:</label>
                        <select id="id_alumne" class="custom-select" name="alumne">
                            <option selected>Seleccionar l'alumne registrat amb la matrícula que vols modificar.</option>
                            <?php 
                                    for($i=0; $i<count($alumnos); $i++){
                                        echo "<option value='".$alumnos[$i]["id_alumno"]."'>".$alumnos[$i]["nombre"]."</option>";                   
                                    }
                            ?>                        
                        </select>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>
        <hr>
        <!-- AQUESTA SECCIÓ NO FUNCIONA, EN TOT CAS ES POT ASSIGNAR UN PROFESSOR A L'HORA DE REGISTRAR EL CURS  -->
        <!-- <div class="assignar_professor">
            <h3>Assignar un professor a un curs</h3>
            <form action="seleccionar_professor.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="id_professor">Professor:</label>
                        <select id="id_professor" class="custom-select" name="profesor">
                            <option selected>Seleccionar el professor registrat amb el curs que vols modificar.</option>
                            <?php 
                                    // for($i=0; $i<count($profesores); $i++){
                                    //     echo "<option value='".$profesores[$i]["id_profesor"]."'>".$profesores[$i]["nombre"]."</option>";                   
                                    // }
                            ?>  
                        </select>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>
        </div>        
        <hr> -->
        <div class="veure_curs">
        <h3>Selecciona el curs que vols visualitzar</h3>
            <form action="view_curso.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="view_curso">Curs</label>
                        <select id="view_curso" class="custom-select" name="curso">
                            <option selected>Selecciona el curs al que vols veure.</option>
                                <?php 
                                    for($i=0; $i<count($cursos); $i++){
                                        echo "<option value='".$cursos[$i]["id_curso"]."'>".$cursos[$i]["curso"]." - id:".$cursos[$i]["id_curso"]."</option>";                   
                                    }
                                ?>
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
    <!-- DESFER LA CONEXIÓ A LA BASE DE DADES -->
<?php
ob_start();
include "./footer.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>
</html>


















