<div class="container p-5 card">
    <div class="alert alert-primary">
        <a href="template/customers/create.php" class="btn btn-primary">Crear</a>
    </div>
    <?php
        session_start();
        if(isset($_SESSION["error"])){
        ?>
        <div class="alert alert-danger">
        <?php
        switch($_SESSION["error"]){
            case 'eliminando_no_id':
                echo 'No proporciono un ID al eliminar';
            break;
            case 'eliminado_no_existe':
                echo 'ID no valido al eliminar';
            break;
            default:
                echo "Error no terminado";

        }
        session_destroy();
        ?>
        </div>
        <?php    
        }
    ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Identificaci&oacute;n</th>
                <th>Fecha nacimiento</th>
                <th>G&eacute;nero</th>
                <th>Foto</th>
        </thead>
        <tbody>
        <?php
            include_once("config/conexion.php");
            $sql = "SELECT * FROM customers";
            $result = mysqli_query($conection, $sql);
            if(mysqli_num_rows($result)>0){                
                $i=0;
                while($registro = mysqli_fetch_assoc($result)){
                    $i++;
                    ?>

                    <tr>
                        <td><?=$i; ?></td>
                        <td><?=$registro["nombres"]; ?></td>
                        <td><?=$registro["nota1"]; ?></td>
                        <td><?=$registro["nota2"]; ?></td>
                        <td><?=$registro["nota3"]; ?></td>
                        <td>
                        <?php
                            $clase = "";
                            $promedio = ($registro["nota1"]+$registro["nota2"]+$registro["nota3"])/3;
                            if($promedio<3){
                                $clase="text-danger";
                            }                            
                            echo '<span class="'.$clase.'">'.$promedio.'</span>';
                        ?>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="template/customers/update.php?id=<?=$registro["id"]; ?>">Editar</a>
                            <a class="btn btn-danger btn-eliminar" href="template/customers/delete.php?id=<?=$registro["id"]; ?>">Eliminar</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else{
            ?>
            <tr>
                <td colspan="7">
                    <div class="alert alert-warning text-center">No se encontraron registros</div>
                </td>
            </tr>
            <?php    
            }
        ?>
            
        </tbody>
    </table>
</div>