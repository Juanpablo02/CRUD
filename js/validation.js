function agregarUsuario(){

    let nombre = document.getElementById("nombre").value;
    let correo = document.getElementById("correo").value;

    if(nombre.length<5 || nombre.length>30){
        alert("Porfavor digite un nombre, no tan largo, ni tan corto");
        return false;
    } else if(correo.length<8 || correo.length>100){
                alert("Porfavor digite un correo, no tan largo, ni tan corto");
                return false;
    } else {
            function alertRegistro(){
                alert("Registro exitoso");
            }
        return alertRegistro();
    }
}


    function alertEditar(){
        alert("Usuario editado con exito");
    }


    function alertEliminar(){
        alert("Usuario eliminado con exito");
    }