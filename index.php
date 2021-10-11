<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de usuarios
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>
<body>

    <?php 

        include("conexion.php");

        $transaccion = new BaseDatos();
        $buscarUsuarios = "SELECT * FROM usuarios";
        $usuarios = $transaccion ->  buscarUsuarios($buscarUsuarios);

    ?>

    <div class="container">
        <div class="from-title">
            <h2 class="my-4 text-center">CRUD de usuarios</h2>
        </div>
        <form class="text-center" method="POST" action="registrarUsuarios.php" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="name" class="form-control" placeholder="Nombre" required name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Correo" required name="correo" id="correo">
            </div>
            <button type="submit" class="btn btn-success my-3" name="enviar" onclick="agregarUsuario()">Agregar</button>
        </form>
        
        <table class="table mt-5">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
            <?php foreach($usuarios as $usuario):?>
            <tr>
                <th><?php echo($usuario["id"])?></th>
                <td><?php echo($usuario["name"])?></td>
                <td><?php echo($usuario["email"])?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar<?php echo($usuario["id"])?>">Editar</button>
                    <a href="eliminarUsuario.php?id=<?php echo($usuario["id"])?>" class="btn btn-danger" onclick="alertEliminar()">Eliminar</a>
                </td>
            </tr>
            <div class="modal fade" id="editar<?php echo($usuario["id"])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center" method="POST" action="editarUsuario.php?id=<?php echo($usuario["id"])?>" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name">Nombre del usuario</label>
                                    <input type="name" class="form-control" placeholder="Nombre" name="nombre" id="nombreEditar" required value="<?php echo($usuario["name"])?>">
                                </div>
                                <div class="mb-3">
                                    <label for="name">Correo del usuario</label>
                                    <input type="email" class="form-control" placeholder="Correo" name="correo" id="correoEditar" required value="<?php echo($usuario["email"])?>">
                                </div>
                                <div class="mt-4 mb-2 text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" name="editar" onclick="alertEditar()">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </table> 
    </div>
    <script src="js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>