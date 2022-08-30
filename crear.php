<?php

include('conexion.php');
include('funciones.php');

if ($_POST["operacion"] == "Crear") {
    $foto = '';
    if($_FILES["imagen_usuario"]['name'] != ''){
        $foto = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO customers ( nombre, apellido, identificacion, fecha de nacimiento, genero, foto ) VALUES ( :nombre, :apellido, :identificacion, :fecha de nacimiento, :genero, :foto ) ");

    $result = $stmt->execute(
        array(
            ':nombre'       => $_POST["nombre"],
            ':apellido'       => $_POST["apellido"],
            ':identificacion'       => $_POST["identificacion"],
            ':fecha de nacimiento'       => $_POST["fecha"],
            ':genero'                       => $_POST["genero"],
        )
    );

    if(!empty($result)){
        echo 'Registro creado';
    }
}