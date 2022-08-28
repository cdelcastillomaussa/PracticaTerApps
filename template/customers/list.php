<div class="container p-5 card">
    <div class="alert alert-primary">
        <a href="template/customers/create.php" class="btn btn-primary">Crear</a>
    </div>
 
        </div>
        
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
                    <tr>
                        <td>
                            <a class="btn btn-warning" href="template/customers/update.php?id=<?=$registro["id"]; ?>">Editar</a>
                            <a class="btn btn-danger btn-eliminar" href="template/customers/delete.php?id=<?=$registro["id"]; ?>">Eliminar</a>
                        </td>
                    </tr>

            <tr>
                <td colspan="7">
                    <div class="alert alert-warning text-center">No se encontraron registros</div>
                </td>
            </tr>   
            
        
            
        </tbody>
    </table>
</div>