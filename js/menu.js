const navegar = document.querySelector('.navegador');

window.addEventListener('scroll', function(){
    navegar.classList.toggle('activar', window.scrollY>0)
});
