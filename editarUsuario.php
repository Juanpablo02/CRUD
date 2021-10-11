<?php
    include("conexion.php");

    $id = $_GET["id"];

    if(isset($_POST["editar"])){

        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];

        $transaccion = new BaseDatos();

        $editarUsuario = "UPDATE usuarios SET name='$nombre', email='$correo' WHERE id='$id'";

        $transaccion -> editarUsuario($editarUsuario);

        header("location:index.php");
    }
?>