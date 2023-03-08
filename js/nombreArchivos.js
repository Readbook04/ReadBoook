var fileInput = document.getElementById('fileInput');
var fileName = document.getElementById('fileName');

fileInput.addEventListener('change', function() {
  var archivo = fileInput.files[0];
  fileName.textContent = archivo.name;
});