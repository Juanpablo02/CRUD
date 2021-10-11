<?php 

    class BaseDatos{

        public $user="root";
        public $password="";

        public function conectarBD(){

            try{
                $infoBD = "mysql:host=localhost;dbname=registro";
                $conexionBD = new PDO($infoBD,$this -> user,$this -> password);
                return $conexionBD;

            } catch (PDOException $error){
                echo($error -> getMessage());
            }
        }

        public function registrarUsuarios($agregarUser){
            $conexion = $this -> conectarBD();
            $insertarDatos = $conexion -> prepare($agregarUser);
            $resultado = $insertarDatos -> execute();

            if($resultado){
                echo("<script type='text/javascript'>
                        alert('Tarea Guardada');
                        window.location.href='index.php';
                    </script>");
            } else {
                echo("Error al registar usuario");
            }
        }

        public function buscarUsuarios($buscarUsuarios){
            $conexion = $this -> conectarBD();
            $buscarDatos = $conexion -> prepare($buscarUsuarios);
            $buscarDatos -> setFetchMode(PDO::FETCH_ASSOC);
            $buscarDatos -> execute();

            return($buscarDatos -> fetchAll());
        }

        public function eliminarUsuarios($eliminarUsuarios){
            $conexion = $this -> conectarBD();
            $eliminarDatos = $conexion -> prepare($eliminarUsuarios);
            $resultado = $eliminarDatos -> execute();

            if($resultado){
                echo("Exito al eliminar el producto");
            } else {
                echo("Error al eliminar el producto");
            }
        }

        public function editarUsuario($editarUsuario){
            $conexion = $this -> conectarBD();
            $editarDatos = $conexion -> prepare($editarUsuario);
            $resultado = $editarDatos -> execute();

            if($resultado){
                echo("Exito al editar el usuario");
            } else {
                echo("Error al editar el usuario");
            }
        }
    }


?>