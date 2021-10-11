<?php

    include ("conexion.php");

    if(isset($_POST["enviar"])){

        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];

        $transaccion = new BaseDatos;

        $registrarUsuario = "INSERT INTO usuarios (name,email) VALUES ('$nombre','$correo')";

        $transaccion -> registrarUsuarios($registrarUsuario);

        header("location:index.php");
    }
?>