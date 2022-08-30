<?php
    // Funcion para subir foto
    function subir_imagen(){
        if (isset($_FILES["imagen_usuario"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario"]['name']);
            $new_name = rand() . '.' . $extension[1];
            $location = './img/' . $new_name;
            move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $location);
            return $new_name;
        }
    }

    // Funcion para obtener el nombre de la foto
    function get_name_photo($id_usuario){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT foto FROM customers WHERE id = ' $id_usuario ' ");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $fila) {
            return $fila["foto"];
        }

    }

    // Funcion para obtener todos los registros
    function get_all_records(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM customers ");
        $stmt -> execute();
        $result = $stmt->fetchAll();
        return $result->rowCount();
           
    
        }