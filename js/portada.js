function mostrarImagen() {
    const archivo = document.getElementById('imagen').files[0];
    const lector = new FileReader();
    lector.onload = function(event) {
      const vista_previa = document.getElementById('vista-previa');
      vista_previa.src = event.target.result;
    }
    lector.readAsDataURL(archivo);
  }