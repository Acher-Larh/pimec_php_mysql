<!-- REDIRIGIR ELS USUARIS AL FORMULARI QUE ELS HI CORRESPON -->

<?php 
include "./src/templates/login_template.php";
// $url = $_SERVER['SERVER_NAME'];
// $user = $_GET['user'];
// switch ($_GET['id_usuari']) {
//     case 'alumne':
//         // header("Location: http://$url/login.php/?id_usuari=alumne");
//         include "login_alumne.php";
//         break;
//     case 'professor':
//         include "login_professor.php";
//         // header("Location: http://$url/login_professor.php");
//         break;
//     case 'administrador':
//         include "login_administrador.php";
//         // header("Location: http://$url/login_administrador.php");
//         break;
//     case 'anonimous':
//         include "login_anonimous.php";
//         // header("Location: http://$url/login_anonimous.php");
//         break;
//     default:
//         break;
// }
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

function something_went_wrong($e, $url) {
    header("Location: http://$url/login.php?error=$e");
    // switch ($user) {
    //     case 0:
    //         header("Location: http://$url/login.php?error=$e");
    //         break;
    //     case 1:
    //         header("Location: http://$url/login.php?error=$e");
    //         break;
    //     case 2:
    //         header("Location: http://$url/login.php?error=$e");
    //         break;
    //     case 3:
    //         header("Location: http://$url/login.php?error=$e");
    //         break;
    //     default:
    //         break;
    // }
    exit();
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
            
            echo "Logged in!";
            
            $_SESSION['email'] = $fila['email'];

            $_SESSION['nombre'] = $fila['nombre'];

            $_SESSION['id_usuario'] = $fila['id_usuario'];

            $_SESSION['id_role'] = $fila['id_role'];
            
            header("Location: ".assert_role($fila['id_role']).".php");

            exit();
        }   
    }
}

$registros = [];

while ($registro=$resultado->fetch_assoc()) {
    $registros[] = $registro;
}
// $isEmail = false;
// $emailList = array();
// // $emailList = array();
// foreach($registros as $id=>$registro) {
//     foreach($registro as $columna => $fila){
//         if($columna=="email"){
//             array_push($emailList, $fila);
//         }
//     }
// }
// if(in_array($email, $emailList)){
//     foreach($registros as $id=>$registro) {
//         foreach($registro as $columna => $fila){
//             if($columna=="password"){
//                 if($fila == $password){
//                     echo "success";
//                 }
//             }
//         }
//     }
// }


// foreach($registros as $id=>$registro) {
//     foreach($registro as $columna => $fila){
//         if($columna=="email"){
//             if($fila == $email){
//                 echo  $columna.'"'.$fila.'"<br>';
//                 $isEmail = true;
//             }
//         }
//         if($columna=="password" and $id >0 and $isEmail){
//             if($fila == $password){
//                 echo  $columna.'"'.$fila.'"<br>';
//             }
//         }
//         $isEmail = false;
//     }
// }

$mysqli->close();

?>