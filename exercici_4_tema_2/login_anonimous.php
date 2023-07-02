<html>
    <?php 
    $server_name = $_SERVER['REQUEST_URI'];
    echo "<script> console.log('$server_name'); </script>";
    ?>
    <head>
        <title>Anònim</title>
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
            <h1 class="display-4">ANÒNIM!</h1>
            <p class="lead">Si vols matricularte a PIMCE LERNE hauràs de posar-te en contacte amb nosaltres amb el formulari que trobaràs més abaix.</p>
            <hr class="my-4">
            <p>Una vegada ens arribi el teu correu, ens posarem en contacte el més aviat possible.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Cursos</a>
            </p>
        </div>
        
        <div class="contact-form " style="display:inline-block;">
            <h3>Ens encarreguem de tot el process</h3>
            <form action="contact_form.php" method="POST">
                <div class="form-group">
                    <label for="contactEmail">Correu electrònic</label>
                    <input type="email" class="form-control" id="contactEmail" aria-describedby="emailHelp" placeholder="Introdueix l'adreça electrònica"><br>

                    <label for="contactSubject">Subjecte</label>
                    <input type="text" class="form-control" id="contactSubject" placeholder="Introdueix un subjecte"><br>
                
                    <label for="contactBody">Description</label>
                    <textarea  class="form-control" id="contactBody" aria-describedby="emailHelp" placeholder="Cos del correu. Descriu la consulta." rows="3"></textarea>

                </div>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>

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
