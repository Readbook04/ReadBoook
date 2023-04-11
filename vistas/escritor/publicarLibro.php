<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Publicar</title>
</head>

<body>
    <header class="encabezado">
        <div class="logo2">
            <a class="logo" href="../index.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
        </div>
        <nav class="navegador">
            <div class="logo1">
                <a href="../index.html"><img src="../../img/logo-removebg-preview (1).png" alt=""></a>
            </div>
            <ul class="menu">
                <li><a href="../html/crearCuenta.html">Unete</a></li>
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/descubrete.html">Descubrete</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h1 id="ReadBook">ReadBook</h1>
        <nav class="navegador2">
            <div class="logo1">
                <a href="../index.html"><img src="../../img/logo-removebg-preview (1).png" alt="">a>
            </div>
            <ul class="menu">
                <li><a href="../html/crearCuenta.html">Unete</a></li>
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/descubrete.html">Descubrete</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <img class="hamburguesa" src="../../img/hamburguesa.svg" alt="">
    </header>
    <main class="formPl">
        <h1>Publicar Libro</h1>
        <section class="publicarLiContenedor">
            <div class="publicarLiEncabezado">
                <img src="../../img/logo-removebg-preview (1).png" alt="">
            </div>
            <div class="publicarLiForm">
                <form action="../../php/librosControl.php" method="post" enctype="multipart/form-data">
                    <div class="publicarLiPortada">
                        <input type="file" name="foto" id="imagen" onchange="mostrarImagen()" accept="image/*" required>
                        <label for="imagen"><img id="vista-previa"></label>
                    </div>
                    <div class="publicarForm">
                        <label for="tit">Titulo</label>
                        <input type="text" name="titulo" id="ti">
                        <label for="nom">Autor</label>
                        <input type="text" name="autor" id="nom" value="">
                        <label for="hor">Fecha</label>
                        <p id="fecha"></p>
                        <label for="sinop">Sinopsis</label>
                        <textarea name="sinopsis" id="sinop"></textarea>
                        <label for="gen">Genero</label>
                        <select name="genero" id="gen">
                            <?php
                            include '../../php/libro.php';
                            $lib = new Libro();
                            $lib->listarGeneros();
                            $lib->cerrarBD();
                            ?>
                        </select>
                        <label for="fileInput"><img src="../../img/pdf.png" alt=""></label>
                        <input type="hidden" name="opcion" value="1">
                        <input type="file" name="pdf" id="fileInput" accept=".pdf" required>
                        <p id="fileName"></p>
                    </div>
                    <div></div>
                    <div class="publicar-botones">
                        <button class="botones"><a href="descubrete.php">Cancelar</a></button>
                        <input class="botones" type="submit" value="Publicar">
                    </div>
                </form>
            </div>
        </section>
        <aside>
            <div class="colum">
                <ul>
                    <li>
                        <a class="icon" href="https://es-la.facebook.com/"><i class='bx bxl-facebook-circle'></i></a>
                    </li>
                    <li>
                        <a class="icon-insta" href="https://www.instagram.com/"><i class='bx bxl-instagram-alt'></i></a>
                    </li>
                    <li>
                        <a class="icon" href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZXMifQ%3D%3D%22%7D"><i class='bx bxl-twitter'></i></a>
                    </li>
                    <li>
                        <a class="icon-correo" href="https://outlook.live.com/owa/"><i class='bx bxs-envelope'></i></a>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
    <footer class="pie-pagina">
        <div class="contactos">
            <p>Nezahualcoyotl, Estado De Mexico</p>
            <small>&copy;Derechos Reservados, ReadBook 2023</small>
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
    <script src="../../js/menu.js"></script>
    <script src="../../js/menuham.js"></script>
    <script src="https://kit.fontawesome.com/fbc3385146.js" crossorigin="fbc3385146"></script>
    <script src="../../js/fecha.js"></script>
    <script src="../../js/nombreArchivos.js"></script>
    <script src="../../js/portada.js"></script>
</body>

</html>