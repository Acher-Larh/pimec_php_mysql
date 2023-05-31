<html>
    <head>
        <title>Ejemplo de insertar Paises</title>
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
        <form method="post" action="login.php">
            <h3>Iniciar Sessió</h3>
            <div class="row">
                <div class="form-group col">
                    <label for="email" >Correu Electrónic</label>
                    <input type="text" class="form-control" id="email" aria-describedby="userHelp" placeholder="Introdueix el teu correu electrónic" name="email" required>
                    
                </div>
                <div class="form-group col">
                    <label for="password">Contrasenya</label>
                    <input type="password" class="form-control" id="password" placeholder="Introdueix la teva contrasenya" name="password" required>
                    
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <small id="userHelp" class="form-text text-muted">T'ha d'haver arribat al teu correu electrònic. Si no el trobes arreu(revisa la carpeta de spam), posat en contacte amb el teu tutor o des del següent <a href="<?php echo "/contact.php" ?>">formulari</a>.</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirma</button>
        </form>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
