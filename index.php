<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--CSS Boopstrap 5.2.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <!-- Hacemos uso de los CSS datables-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

        <!-- Hacemos uso de bootstrap icons -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Custom CSS-->
        <link rel="stylesheet" href="css/styles.css">
        
    <title>CRUD con PHP, Ajax, DPO y Datatables.js</title>

  </head>
  <body>

    <div class="container fondo">

        <h1 class="text-center ">CRUD [ PHP | Ajax | DPO | Datatables.js ]</h1>
        <p class="text-center">&copy; Todos los derechos reservados :: Colombia 2022</p>

        <div class="row">
            <div class="col-2 offset-0">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="btn_crear">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                </div>
            </div>
        </div>
        <br />
        <br />
        <!-- Tabla de datos-->
        <div class="table-responsive">
            <table id="tablaUsuarios" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificaci&oacute;n</th>
                        <th>Fecha nacimiento</th>
                        <th>G&eacute;nero</th>
                        <th>Foto</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br />

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control">
                <br />

                <label for="identificacion">Identificaci&oacute;n:</label>
                <input type="text" name="identificacion" id="identificacion" class="form-control">
                <br />

                <label for="fecha nacimiento">Fecha nacimiento:</label>
                <input type="date" name="fecha nacimiento" id="fecha nacimiento" class="form-control">
                <br />
                
                <label for="genero">G&eacute;nero:</label>
              <div class="form-control">
                <label for="genero">Masculino
                    <input type="radio" name="genero" id="genero" value="masculino">
                </label>
                <label for="genero">Femenino
                    <input type="radio" name="genero" id="genero" value="femenino">
                </label>
              </div>
                <br />

                <label for="foto">Seleccione foto</label>
                <input type="file" name="foto_usuario" id="foto_usuario" class="form-control">
                <span id="imagen_cargada"></span>
                <br />

            </div>

            <div class="modal-footer">
                <input type="hidden" name="id_usuario" id="id_usuario">
                <input type="hidden" name="operacion" id="operacion">
                <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap js - JQuery js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>-->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

    <!-- Instanciamos a nuestro dataTable-->
    <script type="text/javascript">
      $(document).ready(function(){
        $('#tablaUsuarios').DataTable({
          //"processing": true,
          "serverSide": true,
          "order": [],
          "ajax":{
            url: "listar_registros.php",
            type: "POST"
          },
          "columnsDefs":[
            {
              "targets":[ 0, 5 ],
              "orderable":false,
            },
          ]
        });
      });

    </script>

  </body>
  
</html>
