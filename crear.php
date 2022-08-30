<?php

include('conexion.php');
include('funciones.php');

if($_POST["operacion"] == "Crear"){
    $imagen = '';
    if($_FILES["imagen_usuario"]['name'] != ''){
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellido, identificacion, fecha_nacimiento, genero, imagen)VALUES(:nombre, :apellido, :identificacion, :fecha_nacimiento, :genero, :imagen)");
    $resultado = $stmt->execute(
        array(
            ':nombre'       => $_POST["nombre"],
            ':apellido'       => $_POST["apellido"],
            ':identificacion'       => $_POST["identificacion"],
            ':fecha_nacimiento'       => $_POST["fecha_nacimiento"],
            ':genero'       => $_POST["genero"],
            ':imagen'       => $imagen

        )
    );
    if(!empty($resultado)){
        echo 'Registro creado exitosamente';

    }
}


if($_POST["operacion"] == "Editar"){
    $imagen = '';
    if($_FILES["imagen_usuario"]['name'] != ''){
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_usuario_oculta"];
    }
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=:nombre, apellido=:apellido, identificacion=:identificacion, fecha_nacimiento=:fecha_nacimiento, genero=:genero, imagen=:imagen WHERE id = :id");
    $resultado = $stmt->execute(
        array(
            ':nombre'       => $_POST["nombre"],
            ':apellido'       => $_POST["apellido"],
            ':identificacion'       => $_POST["identificacion"],
            ':fecha_nacimiento'       => $_POST["fecha_nacimiento"],
            ':genero'       => $_POST["genero"],
            ':imagen'       => $imagen,
            ':id'           => $_POST["id_usuario"]

        )
    );
    if(!empty($resultado)){
        echo 'Registro actualizado!';

    }
}