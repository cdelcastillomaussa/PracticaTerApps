<?php

include('conexion.php');
include('funciones.php');

if ($_POST["operacion"] == "Crear") {
    $foto = '';
    if($_FILES["foto_usuario"]['name'] != ''){
        $foto = cargar_foto();
    }
    $stmt = $conection->prepare("INSERT INTO customers(nombre, apellido, identificacion, fecha nacimiento, genero, foto)VALUES(:nombre, :apellido, :identificacion, :fecha nacimiento, :genero, :foto)");

    $result = $stmt->execute(
        array(
            ':nombre'       => $_POST["nombre"],
            ':apellido'       => $_POST["apellido"],
            ':identificacion'       => $_POST["identificacion"],
            ':fecha nacimiento'       => $_POST["fechaNacimiento"],
            ':genero'       =>  $_POST["genero"],
            ':foto'       => $foto
        )
    );

    if(!empty($result)){
        echo 'Registro creado';
    }
}