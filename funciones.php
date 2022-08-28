<?php
    // Funcion para subir foto
    function cargar_foto(){
        if (isset($_FILES["foto_usuario"])) {
            $extension = explode('.', $_FILES["foto_usuario"]['name']);
            $new_name = rand() . '.' . $extension[1];
            $location = './img/' . $new_name;
            move_uploaded_file($_FILES["foto_usuario"]['tmp_name'], $location);
            return $new_name;
        }
    }

    // Funcion para obtener el nombre de la foto
    function get_name_photo($id_usuario){
        include('conexion.php');
        $query = $conection->prepare("SELECT foto FROM customers WHERE id = '$id_usuario'");
        $query->execute();
        $result = $query->fetchAll();
        foreach ($result as $fila) {
            return $fila['foto'];
        }

    }

        // Funcion para obtener todos los registros
        function get_all_records(){
            include('conexion.php');
            $query = $conection->prepare("SELECT * FROM customers " );
            $query->execute();
            $result = $query->fetchAll();
            return $query->rowCount();
           
    
        }