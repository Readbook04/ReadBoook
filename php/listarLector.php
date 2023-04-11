<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Inicar Sesion</title>
</head>
<body>
    <header class="encabezado">
        <div class="logo2">    
            <a class="logo" href="../index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <nav class="navegador">
            <div class="logo1">
                <a href="../index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
            </div>    
            <ul class="menu">
                <li><a href="../html/libros.html">libros</a></li>
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../html/contacto.html">Contactos</a></li>
                <li><a id="esta" href="../php/consultarLector.php">Mi cuenta</a></li>
                <li><a href="#">Suscripción</a></li>
                <li><a href="../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h1 id="ReadBook">ReadBook</h1>
        <nav class="navegador2">
            <div class="logo1">
                <a href="../index.html"><img src="../img/logo-removebg-preview (1).png" alt=""></a>
            </div>    
            <ul class="menu">
                <li><a href="../html/libros.html">libros</a></li>
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../html/contacto.html">Contactos</a></li>
                <li><a id="esta" href="../php/consultarLector.php">Mi cuenta</a></li>
                <li><a href="#">Suscripción</a></li>
                <li><a href="../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <img class="hamburguesa" src="../img/hamburguesa.svg" alt="">
    </header>
    <main>
        <?php
        include("usuarios.php");
        $usuarios = new usuarios();
        $usuarios->conectorBD();
        $usuarios->listarDatosLector();