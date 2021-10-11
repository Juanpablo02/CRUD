<?php
    include("conexion.php");

    $id = $_GET["id"];

    $transaccion = new BaseDatos();

    $eliminarDatos = "DELETE FROM usuarios WHERE id='$id'";

    $transaccion -> eliminarUsuarios($eliminarDatos);

    header("location:index.php");

?>