<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Descubrete</title>
</head>

<body>
    <header class="encabezado">
        <div class="logo2">
            <a class="logo" href="indexEscritor.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <nav class="navegador">
            <div class="logo1">
                <a href="indexEscritor.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
            </div>
            <ul class="menu">
                <li><a id="esta" href="libros.php">Libros</a></li>
                <li><a href="descubrete.php">Descubrete</a></li>
                <li><a href="soporte.html">Soporte</a></li>
                <li><a href="contacto.html">Contactos</a></li>
                <li><a href="">Suscribirse</a></li>
                <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h1 id="ReadBook">ReadBook</h1>
        <nav class="navegador2">
            <div class="logo1">
                <a href="../index.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
            </div>
            <ul class="menu">
                <li><a href="libros.php">Libros</a></li>
                <li><a href="descubrete.php">Descubrete</a></li>
                <li><a href="soporte.html">Soporte</a></li>
                <li><a href="contacto.html">Contactos</a></li>
                <li><a href="">Suscribirse</a></li>
                <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <img class="hamburguesa" src="../../img/hamburguesa.svg" alt="">
    </header>
    <main>
        <h1>Lista de libros</h1>
        <form action="#" method="post" class="buscar">
            <input type="text" name="buscar" placeholder="Nombre del libro">
            <i class='bx bx-search-alt'></i>Buscar
        </form>
        <br>
        <br>
        <div class="tabla_libros">
            <?php
            include_once "../../php/libro.php";
            $lib =  new Libro();
            $lib->listarLibros();
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
<script src="../../js/menu.js"></script>
<script src="../../js/menuham.js"></script>

</html>