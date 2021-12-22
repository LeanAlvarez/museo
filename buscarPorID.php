<?php

header('Content-Type: application/json; charset=utf-8');
//abro la conexion

//busco por id
$id = $_POST['id'];

$sql = "SELECT * FROM datos WHERE id = $id";

$conn = include("conexion.php");
//corro la query
$result = $conn->query($sql);
//recorro el resultado
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $edad = $row['edad'];
    $conyugue_apellido = $row['conyugue_apellido'];
    $conyugue_nombre = $row['conyugue_nombre'];
    $conyugue_edad = $row['conyugue_edad'];
    $hijos = $row['hijos'];
    $profesion = $row['profesion'];
    $anio_llegada = $row['anio_llegada'];
    $comuna = $row['comuna'];
    $region = $row['region'];
    $pais = $row['pais'];
    $latitud = $row['lat'];
    $longitud = $row['lon'];
  
}


//pasar en formato json
$json = array(
    'id' => $id,
    'nombre' => $nombre,
    'apellido' => $apellido,
    'edad' => $edad,
    'conyugue_apellido' => $conyugue_apellido,
    'conyugue_nombre' => $conyugue_nombre,
    'conyugue_edad' => $conyugue_edad,
    'hijos' => $hijos,
    'profesion' => $profesion,
    'anio_llegada' => $anio_llegada,
    'comuna' => $comuna,
    'region' => $region,
    'pais' => $pais,
    'latitud' => $latitud,
    'longitud' => $longitud
);

echo json_encode($json);

//cerrar la conexion
$conn->close();




?>