<html>
    <head>
        <title><?php echo $site_title ?></title>
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
        <?php include  getcwd()."/src/templates/nav-bar.php"; ?>

