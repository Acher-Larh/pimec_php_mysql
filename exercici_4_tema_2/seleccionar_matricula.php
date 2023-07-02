<!-- INICIALITZAR LA FUNCION GET_DB() -->

<?php 
ob_start();
include "./db_connect.php";
ob_start();
include "./get_db.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;

$site_title = "Admin Dashboard";

include getcwd()."/src/templates/header.php";
$alumne = 0;
if(isset($_POST['alumne'])){
    $alumne = $_POST['alumne'];
}else {

    echo "Couldn't find your selection, go back to the admin dashboard and make sure you've selected an option. \n";
}


$matriculas = get_db("SELECT * FROM Matricula JOIN Cursos ON Cursos.id_curso=Matricula.id_curso JOIN Alumnos ON Matricula.id_alumno=Alumnos.id_alumno WHERE Alumnos.id_alumno=$alumne;", $mysqli);
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
        <form action="modificar_matricula.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <h2>Alumne Seleccionat: "<?php echo $_POST['alumne']?>"</h2> 
                        <label for="id_matricula">Matrícula</label>
                        <select id="id_matricula" class="custom-select" name="matricula">
                            <option selected>Seleccionar la matrícula que vols modificar.</option>

                        <?php 
                        
                            
                            for($i=0; $i<count($matriculas); $i++){
                                echo "<option value='".$matriculas[$i]["id_matricula"]."'>".$matriculas[$i]["curso"]."</option>";                   
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirma</button>
            </form>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
