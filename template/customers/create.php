<?php
    include_once("../header.php");
?>
<div class="container">
    <div class="card col-md-6 offset-md-3">
        <form action="" method="post">
            <div class="card-header text-white text-center bg-dark">
                <h3>Crear</h3>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" class="form-control">
                </div>
                <div class="form-group">
                    <label for="identificacion">Identificaci&oacute;n:</label>
                    <input type="text" name="identificacion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha nacimiento">Fecha nacimiento:</label>
                    <input type="text" name="fecha nacimiento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="genero">G&eacute;nero:</label>
                    <input type="text" name="genero" class="form-control">
                </div>
            
            </div>
            <div class="card-footer container">
                <div class="row">
                    <div class="col-md-6">
                        <button name="guardar" value="guardar" class="btn btn-success btn-block">Guardar</button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block" href="../../customers.php">Cancelar</a>
                    </div>
                </div>                
            </div>
        </form>
    </div>
</div>
<?php
    include_once("../footer.php");
?>