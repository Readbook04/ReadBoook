//fecha de suscripcion por 1 mes
var hoy = new Date();
var fechaActual1 = hoy.getDate() + '/' + (hoy.getMonth()+1) + '/' + hoy.getFullYear();
var fechaTer1 = hoy.getDate() + '/' + (hoy.getMonth()+2) + '/' + hoy.getFullYear();

document.getElementById("fecha").innerHTML = fechaActual1;
document.getElementById("fechaTermino").innerHTML = fechaTer1;

//fecha de suscripcion por 3 meses 
var hoy = new Date();
var fechaActual2 = hoy.getDate() + '/' + (hoy.getMonth()+1) + '/' + hoy.getFullYear();
var fechaTer2 = hoy.getDate() + '/' + (hoy.getMonth()+4) + '/' + hoy.getFullYear();

document.getElementById("fecha2").innerHTML = fechaActual2;
document.getElementById("fechaTermino2").innerHTML = fechaTer2;

//fecha de suscripcion por 1 año
var hoy = new Date();
var fechaActual = hoy.getDate() + '/' + (hoy.getMonth()+1) + '/' + hoy.getFullYear();
var fechaTer = hoy.getDate() + '/' + (hoy.getMonth()+1) + '/' + (hoy.getFullYear()+1);

document.getElementById("fecha3").innerHTML = fechaActual;
document.getElementById("fechaTermino3").innerHTML = fechaTer;


