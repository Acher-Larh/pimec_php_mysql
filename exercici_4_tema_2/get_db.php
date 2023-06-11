<?php 
function get_db($sql_query, $mysqli){
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
        foreach($resultado as $id=>$registro){
            array_push($resgistros, $registro);
        }

        foreach($resgistros as $i=>$item){
            array_push($db, $item);

        }
        
        return $db;
}
?>