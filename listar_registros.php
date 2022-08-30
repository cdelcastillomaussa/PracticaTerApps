<?php

    include('conexion.php');
    include('funciones.php');

    $query = '';
    $output = array();
    $query = "SELECT * FROM customers ";

    if (isset($POST["search"]["value"])) {
        $query .= 'WHERE nombre LIKE "%' . $POST["search"]["value"] . '%" ';
        $query .= 'OR apellido LIKE "%' . $POST["search"]["value"] . '%" ';

    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $_POST["order"][0]['column'] .' '.$_POST["order"][0]['dir'] . ' ';
    } else {
        $query .= 'ORDER BY id DESC ';
    }

    if ($_POST["length"] != -1) {
        $query .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach ($result as $fila) {
        $foto = '';
        if ($fila["imagen"] != '') {
            $foto = '<img src="img/' . $fila["imagen"] . '" class="img-thumbnail" width="50" heigth="35" />';
        } else {
            $foto = '';
        }
        $sub_array = array();
        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["apellido"];
        $sub_array[] = $fila["identificacion"];
        $sub_array[] = $fila["fecha de nacimiento"];
        $sub_array[] = $fila["genero"];
        $sub_array[] = $foto;
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $output = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => get_all_records(),
        "data"              => $datos
    );

    echo json_encode($output);

