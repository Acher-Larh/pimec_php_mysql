<!-- <?php echo "search:success";?> -->

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
?><div class="container-fluid" style="display: flex; flex-wrap:wrap;">
    <?php
foreach($cursos as $id=> $curso){
    ?>

        <div class="card" style="width: 30%; margin: 20px;">
            <a href="#">
            <img class="card-img-top" src="https://img.wattpad.com/554479b33e8365360597f4d353e3d43c23c1d203/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f5a616e416c50674f4242303169673d3d2d313136383136353339372e313663323532353463363934623630653233303230363831303930362e6a7067" alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title"><?php 
                echo $curso['curso'];
                ?></h5>
                <p class="card-text"><?php 
                echo $curso['cuerpo']
                ?></p>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
        <?php
    // foreach($curso as $key => $value ){
        
        //     echo $key.": ".$value."<br>";
        // }
    }
    ?>
    </div>
<!-- DESFER LA CONEXIÓ A LA BASE DE DADES -->
<?php
ob_start();
include "./footer.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>