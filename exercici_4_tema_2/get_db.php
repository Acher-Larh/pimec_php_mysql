<?php
function get_db($sql_query, $mysqli)
{
    $resultado = $mysqli->query($sql_query);

    if (!$resultado) {


        echo "Lo sentimos, este sitio web está experimentando problemas.";

        echo "Error: La ejecución de la consulta falló debido a: \n";

        echo "Query: " . $sql_query . "\n";

        echo "Errno: " . $mysqli->errno . "\n";

        echo "Error: " . $mysqli->error . "\n";

        exit;
    }
    $db = array();
    $resgistros = array();
    foreach ($resultado as $id => $registro) {
        array_push($resgistros, $registro);
    }

    foreach ($resgistros as $i => $item) {
        array_push($db, $item);
    }

    return $db;
}

function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;
}

function update_db($query, $mysqli)
{
    if ($mysqli->query($query) === TRUE) {
        // echo "New record created successfully";
        return $mysqli->insert_id;
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}


function insertar_curso($values, $mysqli){
    $sql_query = "INSERT INTO Cursos (id_curso, curso, cuerpo, id_profesor, id_estado) VALUES (NULL, '".$values['curso']."', '".$values['cuerpo']."', '".$values['profesor']."', '".$values['id_estado']."') ;";
    // foreach($values as $key => $value){
    //     echo $key.":".$value."<br>";
    // }
    $id_curso = update_db($sql_query, $mysqli);

    $sql_query = "INSERT INTO Imparticion (id_imparticion, id_curso, id_profesor) VALUES (NULL, '".$id_curso."', '".$values['profesor']."');";
    $id_curso = update_db($sql_query, $mysqli);

    return $id_curso;
    
}

function matricular_alumno($values, $mysqli){
    $sql_query = "INSERT INTO Usuarios 
    (id_usuario, id_role, nombre, apellido_primero, apellido_segundo, email, user_name, password, cookie, fecha_registro, fecha_cookie) 
    VALUES (NULL, 1, '".$values['nombre']."', '".$values['apellido_primero']."', '".$values['apellido_segundo']."', '".$values['email']."', '".$values['username']."', '".$values['password']."', NULL, NULL, NULL);";

    $id_usuario = update_db($sql_query, $mysqli);

    $sql_query = "INSERT INTO Alumnos (id_alumno, id_usuario, id_curso) VALUES (NULL, '".$id_usuario."', '".$values['curso']."');";

    $id_alumno = update_db($sql_query, $mysqli);

    $sql_query = "INSERT INTO Matricula (id_matricula, id_alumno, id_curso) VALUES (NULL, '".$id_alumno."', '".$values['curso']."');";

    $id_matricula = update_db($sql_query, $mysqli);

    return $id_matricula; 
}

function eliminar_matricula($values, $mysqli){
    $sql_query = "DELETE FROM Matricula WHERE id_matricula=$values";
    update_db($sql_query, $mysqli);
}