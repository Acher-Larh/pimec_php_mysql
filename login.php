<!-- REDIRIGIR ELS USUARIS AL FORMULARI QUE ELS HI CORRESPON -->
<?php 
$url = $_SERVER['SERVER_NAME'];
$user = $_GET['user'];
switch ($_GET['id_usuari']) {
    case 'alumne':
        // $user = 0;
        header("Location: http://$url/login_alumne.php");
        break;
    case 'professor':
        // $user = 1;
        header("Location: http://$url/login_professor.php");
        break;
    case 'administrador':
        // $user = 2;
        header("Location: http://$url/login_administrador.php");
        break;
    case 'anonimous':
        // $user = 3;
        header("Location: http://$url/login_anonimous.php");
        break;
    default:
        break;
}
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

$sql = "SELECT email, password FROM Usuarios WHERE email='$email' AND password='$password'";
$resultado = $mysqli->query($sql);
if (!$resultado) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    echo "Error: La ejecución de la consulta falló debido a: \n";

    echo "Query: " . $sql . "\n";

    echo "Errno: " . $mysqli->errno . "\n";

    echo "Error: " . $mysqli->error . "\n";

    exit;

}    

if (mysqli_num_rows($resultado) !== 1) {
    echo $user;
    switch ($user) {
        case 0:
            header("Location: http://$url/login_alumne.php?error=Incorect User name or password");
            break;
        case 1:
            header("Location: http://$url/login_professor.php?error=Incorect User name or password");
            break;
        case 2:
            header("Location: http://$url/login_administrador.php?error=Incorect User name or password");
            break;
        case 3:
            header("Location: http://$url/login_anonimous.php?error=Incorect User name or password");
            break;
        default:
            break;
    }
    exit();
}

echo "test";

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