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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><span style="font-size:1.6em;">PIMEC</span> LERNE</a>

            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inici <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cursos_list_view.php">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Qui Som?</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Conectar-se
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="login.php/?id_usuari=alumne">Alumne</a>
                            <a class="dropdown-item" href="login.php/?id_usuari=professor">Professor</a>
                            <a class="dropdown-item" href="login.php/?id_usuari=anonimous">Anònim</a>
                            <a class="dropdown-item" href="login.php/?id_usuari=administrador">Administrador</a>
                        </div>
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0" action="search_index.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Busca" aria-label="Busca">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

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
