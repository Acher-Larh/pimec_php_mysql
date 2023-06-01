
<!-- INCLOURE EL COS DE LA PÁGINA -->
<?php 
include "./src/templates/login_template.php";
?>

<!-- VERIFICAR LES CREDENCIALS -->
<?php 

session_start(); 

$mysqli = new mysqli('localhost', 'root', '|º@ssw0rd123.pP', 'gestion_alumnos');

if ($mysqli->connect_errno) {


    echo "Error de conexión.";

    echo "Error: Fallo al conectarse a MySQ: \n";

    echo "Error: " . $mysqli->connect_errno . "\n";

    echo "Error: " . $mysqli->connect_error . "\n";

    exit;


}    

$mysqli->set_charset("utf8");

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }
}

$email = validate($_POST['email']);
$password = validate($_POST['password']);
$url = $_SERVER['SERVER_NAME'];

function redirect($redirect_url){
    ?>
        <script type="text/javascript"> 
            window.location.href= "<?php echo $redirect_url; ?>"; 
        </script>
    <?php 
}
function something_went_wrong($e, $url) {
    redirect("http://$url/login.php?error=$e");
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

        if ($fila['email'] === $email && $fila['password'] === $password) {
                        
            $_SESSION['email'] = $fila['email'];

            $_SESSION['nombre'] = $fila['nombre'];

            $_SESSION['id_usuario'] = $fila['id_usuario'];

            $_SESSION['id_role'] = $fila['id_role'];

            $redirect_url = "http://" . $url . "/" . assert_role($_SESSION['id_role']) . ".php";

            redirect($redirect_url);
        }   
    }
}

$mysqli->close();

?>

</body>
</html>