<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Administrador</title>
</head>
<header class="encabezado">
    <div class="logo2">
        <a class="logo" href="../admin/adminLibros.php"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
    </div>
    <nav class="navegador">
        <div class="logo1">
            <a href="../admin/adminLibros.php"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <ul class="menu">
            <li><a id="esta" href="libros.html">libros</a></li>
            <li><a href="adminGeneros.php">Generos</a></li>
            <li><a href="../../php/listaSuscripcion.php
            ">Suscipciones</a></li>
            <li><a href="soporte.html">Comentarios</a></li>
            <li><a href="contacto.html">Usuarios</a></li>
            <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <h1 id="ReadBook">ReadBook</h1>
    <nav class="navegador2">
        <div class="logo1">
            <a href="../index.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <ul class="menu">
            <li><a id="esta" href="libros.html">libros</a></li>
            <li><a href="novedades.html">Generos</a></li>
            <li><a href="l../php/istaSuscripcion.php">Suscipciones</a></li>
            <li><a href="soporte.html">Comentarios</a></li>
            <li><a href="contacto.html">Usuarios</a></li>
            <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <img class="hamburguesa" src="../../img/hamburguesa.svg" alt="">
</header>
<main class="admin">
    <h1>Libros</h1>
    <h3>Genero</h3>
    <form action="../../php/adminLibroControl" method="post">
    <select name="genero" id="">
        <?php
        include_once '../../php/adminLibroControl.php';
        $lib = new adminLibro();
        $lib->listarGeneros();
        $lib->cerrarBD();
        ?>
    </select>
    <input type="hidden" name="opcion" value="2">
    <input type="submit" value="Filtrar" id="verde">
    </form>
    <div id="filtrar">
        <?php
        include_once '../../php/adminLibro.php';
        $lib->tablaLibros();
        $lib->cerrarBD();
        ?>
    </div>
</main>
<footer class="pie-pagina">
    <div class="contactos">
        <p>Nezahualcoyotl, Estado De Mexico</p>
        <small>&copy;Derechos Reservados 2023</small>
    </div>
    <div class="social-media">
        <a href="https://es-la.facebook.com/" class="social-media-icon">
            <i class='bx bxl-facebook-circle'></i>
        </a>
        <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZXMifQ%3D%3D%22%7D" class="social-media-icon">
            <i class='bx bxl-twitter'></i>
        </a>
        <a href="https://www.instagram.com/" class="social-media-icon">
            <i class='bx bxl-instagram'></i>
        </a>
        <a href="https://outlook.live.com/owa/" class="social-media-icon">
            <i class='bx bxs-envelope'></i></a>
    </div>
</footer>
</body>
<script src="https://kit.fontawesome.com/fbc3385146.js" crossorigin="fbc3385146"></script>
<script src="../../js/menu.js"></script>
<script src="../../js/menuham.js"></script>

</html>