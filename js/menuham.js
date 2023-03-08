const menu = document.querySelector('.hamburguesa');
const opciones = document.querySelector('.navegador2');

menu.addEventListener('click', ()=>{
    opciones.classList.toggle('visible')
})

window.addEventListener('click', e=>{
    if(opciones.classList.contains('visible') && e.target != opciones && e.target != menu){
        opciones.classList.toggle("visible")
    }
})