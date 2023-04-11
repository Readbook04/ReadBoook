const selectTabla = document.getElementById('Seleccion');
selectTabla.addEventListener('change', () => {
  const tablaId = selectTabla.value;
  const tabla = document.querySelector(`#${tablaId}`);
  document.querySelectorAll('table').forEach((t) => {
    t.style.display = 'none';
  });
  tabla.style.display = 'block';
});