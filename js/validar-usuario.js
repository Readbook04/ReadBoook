function loguear(){
    let user=document.getElementById("correo").value;
    let pass=document.getElementById("contraseña").value;

    if(user=="cliente@readbook.com" && pass=="user*1"){
        window.location="../index.html"
    }else if(user== "administrador@readbook.com" && pass=="admin*1"){
        window.location="../IndexAdministrador.html"
    }else{
        alert("Datos incorrectos");
    }
}

