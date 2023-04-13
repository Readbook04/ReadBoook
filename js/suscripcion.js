const form1 = document.getElementById("formulario-subs1");
const form2 = document.getElementById("formulario-subs2");
const form3 = document.getElementById("formulario-subs3");

const toggleButton1 = document.getElementById("toggle-form1");
const toggleButton2 = document.getElementById("toggle-form2");
const toggleButton3 = document.getElementById("toggle-form3");

toggleButton1.addEventListener("click", () => {
  form1.style.display = form1.style.display === "none" ? "block" : "none";
});

toggleButton2.addEventListener("click", () => {
  form2.style.display = form2.style.display === "none" ? "block" : "none";
});

toggleButton3.addEventListener("click", () => {
  form3.style.display = form3.style.display === "none" ? "block" : "none";
});
