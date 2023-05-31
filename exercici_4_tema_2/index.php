<html>
    <head>
        <title>Ejemplo de insertar Paises</title>
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
        
        <div class="contact-form " style="display:inline-block;">
            <h2>Quedem?</h3>
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
    </body>
</html>
