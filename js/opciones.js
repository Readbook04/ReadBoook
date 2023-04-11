document.querySelector('.opciones').addEventListener('click', function() {
    document.querySelector('.des-opciones').style.display = 'block';
});

document.addEventListener('click', function(e) {
    if (!document.querySelector('.des-opciones').contains(e.target) && e.target != document.querySelector('.opciones')) {
        document.querySelector('.des-opciones').style.display = 'none';
    }
});