<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>ReadBook</title>
</head>
<header class="encabezado">
    <div class="logo2">
        <a class="logo" href="../index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
    </div>
    <nav class="navegador">
        <div class="logo1">
            <a href="index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <ul class="menu">
            <li><a href="libros.html">libros</a></li>
            <li><a href="novedades.html">Novedades</a></li>
            <li><a href="descubrete.html">Descubrete</a></li>
            <li><a href="soporte.html">Soporte</a></li>
            <li><a href="contacto.html">Contactos</a></li>
            <li><a href="iniciar-sesion.html">Iniciar Sesión</a></li>
        </ul>
    </nav>
    <h1 id="ReadBook">ReadBook</h1>
    <nav class="navegador2">
        <div class="logo1">
            <a href="../index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <ul class="menu">
            <li><a href="libros.html">libros</a></li>
            <li><a href="novedades.html">Novedades</a></li>
            <li><a href="descubrete.html">Descubrete</a></li>
            <li><a href="soporte.html">Soporte</a></li>
            <li><a href="contacto.html">Contactos</a></li>
            <li><a href="../index.html">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <img class="hamburguesa" src="../img/hamburguesa.svg" alt="">
</header>
<main class="formPl">
    <?php
    include "libro.php";
    $lib = new Libro();
     if (isset($_REQUEST['opcion'])){
        switch($_REQUEST['opcion']){
            case 1:
                $foto = isset($_FILES['foto']['tmp_name']) ? file_get_contents($_FILES['foto']['tmp_name']) : null;
                $pdf = isset($_FILES['pdf']['tmp_name']) ? file_get_contents($_FILES['pdf']['tmp_name']) : null;
                $lib->inicializar($foto, $_REQUEST['titulo'],$_REQUEST['autor'],$_REQUEST['sinopsis'],$_REQUEST['genero'], $pdf);
                $lib->agregarLibro();
            break;

            case 2:
                $lib->mostrarLibros($_REQUEST['nombre']);
            break;
            case 3:
               $lib->eliminarLibro($_REQUEST['id_libro']);
               break;
            
            case 4:
                $lib->modificar1($_REQUEST['id_libro']);
            break;

            case 5: 
                $foto = isset($_FILES['foto']['tmp_name']) ? file_get_contents($_FILES['foto']['tmp_name']) : null;
                $pdf = isset($_FILES['pdf']['tmp_name']) ? file_get_contents($_FILES['pdf']['tmp_name']) : null;
                $lib->modificar2($foto, $_REQUEST['titulo'],$_REQUEST['autor'],$_REQUEST['sinopsis'],$_REQUEST['genero'], $pdf,$_REQUEST['id']);
            break;
         }

         $lib->cerrarBD();
    }
    ?>
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
        <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZXMifQ%3D%3D%22%7D"
            class="social-media-icon">
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
<script src="../js/menu.js"></script>
<script src="../js/menuham.js"></script>
<script src="../js/portada.js"></script>
<script src="../js/nombreArchivos.js"></script>

</html>