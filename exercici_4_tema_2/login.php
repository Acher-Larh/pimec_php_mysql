
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

<!-- IMPORTAR LA BARRA DE NAVIGACIÓ -->
<?php
ob_start();
include "./src/templates/login_template.php";

$output_buffer = ob_get_contents();

ob_end_clean();

echo $output_buffer;
?>

<!-- VERIFICAR LES CREDENCIALS -->
<?php 

$email = '';
$password = '';
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($_POST['email']) && isset($_POST['password'])) {

    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

}

function redirect($redirect_url){
    ?>
        <script type="text/javascript"> 
            window.location.href= "<?php echo $redirect_url; ?>"; 
        </script>
    <?php 
}
function something_went_wrong($e, $url) {
    redirect("$url?error=$e");
}

function assert_role($id_role){
    switch($id_role) {
        case 1:
            return "user_dashboard";
            break;
        case 2:
            return "professor_dashboard";
            break;
        case 3:
            return "admin_dashboard";
            break;
        case 4:
            return "login_anonimous";
            break;
        default:
            return $id_role;
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($email)){
        something_went_wrong("Email is required", $url);
    }else if(empty($password)) {
        something_went_wrong("Password is required", $url);
    }else {
        
        $sql = "SELECT * FROM Usuarios WHERE email='$email' AND password='$password'";

        $resultado = $mysqli->query($sql);
        
        if (mysqli_num_rows($resultado) !== 1) {
            something_went_wrong("Incorect email or password", $url);
        }else {
            $fila = mysqli_fetch_assoc($resultado);
            $server_url = $_SERVER['SERVER_NAME'];
            if ($fila['email'] === $email && $fila['password'] === $password) {
                            
                $_SESSION['email'] = $fila['email'];

                $_SESSION['nombre'] = $fila['nombre'];

                $_SESSION['id_usuario'] = $fila['id_usuario'];

                $_SESSION['id_role'] = $fila['id_role'];

                $redirect_url = "http://" . $server_url . "/exercici_4_tema_2/" . assert_role($_SESSION['id_role']) . ".php";

                redirect($redirect_url);
            }   
        }
    }
}

?>

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

