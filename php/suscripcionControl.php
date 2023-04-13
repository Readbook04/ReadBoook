<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Suscripcion</title>
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
                <li><a href="../html/libros.html">Libros</a></li>
                <li><a href="../html/descubrete.html">Descubrete</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../html/contacto.html">Contactos</a></li>
                <li><a id="esta" href="../php/suscribirseEsc.php">Suscribirse</a></li>
                <li><a href="../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h1 id="ReadBook">ReadBook</h1>
        <nav class="navegador2">    
            <ul class="menu">
                <li><a href="../html/libros.html">Libros</a></li>
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/descubrete.html">Descubrete</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../html/contactos.html">Contactos</a></li>
                <li><a href="../php/suscribirseEsc.php">Suscribirse</a></li>
                <li><a href="../html/iniciar-sesion.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <img class="hamburguesa" src="../img/hamburguesa.svg" alt="">
    </header>

    <main class="accion-Suscripcion">
        <section class="contenedor002">

        <?php
        include ('../vistas/escritor/suscripcion.php');
        

        $suscripcion = new Suscripcion();
        $suscripcion->conectorBD();

        if(isset($_REQUEST['accion'])){
            switch ($_REQUEST['accion']){
                case 'modificar':
                    $suscripcion->modificarSuscripcion($_REQUEST['mail']);
                    $tipoSub = isset($_POST['tipoSub']) ? $_POST['tipoSub'] : null;
                    $costo = isset($_POST['costo']) ? $_POST['costo'] : null;
                    $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaTermino'] : null;
                    $fechaTermino = isset($_POST['fechaTermino']) ? $_POST['fechaTermino'] : null;
                    $suscripcion->modificarSuscripcion2($_REQUEST['mail'], $_REQUEST['tipoSub'], $costo, $fechaInicio, $fechaTermino);
                    break;
                case 'eliminar':
                    $suscripcion->borrarSuscripcion($_REQUEST['mail']);
            }
        }
        if(isset($_REQUEST['opcion'])){
            switch ($_REQUEST['opcion']){
                case 'pagar1':
                    $suscripcion->inicializar($_REQUEST['mail'], isset($_REQUEST['tipo']), $_REQUEST['costo']);
                    $suscripcion->ingresarSuscripcion();
                    break;
                case 'pagar2':
                    $suscripcion->inicializar($_REQUEST['mail'], $_REQUEST['tipo'], $_REQUEST['costo']);
                    $suscripcion->ingresarSuscripcion2();
                    break;
                case 'pagar3':
                    $suscripcion->inicializar($_REQUEST['mail'], $_REQUEST['tipo'], $_REQUEST['costo']);
                    $suscripcion->ingresarSuscripcion3();
            }
        }
        $suscripcion->cerrarBD();
     ?>
            
            <form class="formModificar" action="../php/suscripcionControl.php" method="post">
                <label for="mail">Correo electrónico:</label>
                <input type="email" name="mail" id="mail" placeholder="Email" required>
                <br><br>
                <label for="tipoSub">Tipo de suscripción:</label>
                <select name="tipoSub" id="tipoSub" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Trimestral">Trimestral</option>
                    <option value="Anual">Anual</option>
                </select>
                <input type="hidden" name="costo" id="costo" value="">
                <input type="hidden" name="fechaInicio" id="fechaInicio" value="">
                <input type="hidden" name="fechaTermino" id="fechaTermino" value="">
                <br><br>
                <input type="hidden" name="accion" value="modificar">
                <button type="submit">Modificar</button>
            </form>


              <form class="formEliminar" action="../php/suscripcionControl.php" method="post">
              <input type="hidden" name="accion" value="eliminar">
              <label for="mail">Correo electrónico:</label>
              <input type="email" name="mail" placeholder="Email" required>
              <br><br>
              <button type="submit">Eliminar</button>
              </form>


        </section>

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
    <script src="../js/menu.js"></script>
    <script src="../js/menuham.js"></script>
    <script src="../js/suscripcion.js"></script>
    <script src="../js/fecha-subs.js"></script>
</html>