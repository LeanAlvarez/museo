<?php
    $conectar = require('conexion.php');
    //creo una variable conexion que llama a la funcion conexion
    $conexion = $conectar;
    $salida = "" ;
    $query = "SELECT * FROM datos ORDER BY id LIMIT 10";


    if(isset($_POST['consulta'])){
        $q=$conexion->real_escape_string($_POST['consulta']);

        $query = "SELECT * FROM datos WHERE apellido LIKE '%" .$q. "%' OR nombre LIKE '%" .$q."'";

    }

    $resultado=$conexion->query($query);
    $noHay = "No hay resultados con ese apellido";
    if($resultado->num_rows > 0){
        
        $salida.= "<ul><ul>";


        

        while($fila = $resultado->fetch_assoc()){
        
            $salida.= "<li class='resultado' id='resultados' ><a class='resultadoPersona' id=".$fila['id'].">" .$fila['nombre']. " " .$fila['apellido']. "</a></li>"; 
            
         }
           
        }else{
            $salida.= "<ul><li class='resultadoPersona'>". $noHay . "</li></ul>"; 
        }   

    

    echo $salida;
    
    







    



    // <?php
	// 		//abrir conexión
	// 		$conexion = mysqli_connect("localhost", "root", "", "museo");
	// 		$conexion->set_charset("utf8");
	// 		//consulta para traer de a 10 registros
	// 			$sql = "SELECT * FROM datos LIMIT 10";
	// 			$result = $conexion->query($sql);
	// 			if ($result->num_rows > 0) {
	// 				while($row = $result->fetch_assoc()) {
	// 					echo "<li class='resultadoPersona'>" .$row['nombre']. " " .$row['apellido']. "</li>";
	// 				}
	// 			}
	// // 		?>

