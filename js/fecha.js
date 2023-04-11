var hoy = new Date();
var fechaActual = hoy.getDate() + '/' + (hoy.getMonth()+1) + '/' + hoy.getFullYear();

document.getElementById("fecha").innerHTML = fechaActual;