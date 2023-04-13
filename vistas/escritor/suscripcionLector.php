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
                <li><a href="../html/novedades.html">Novedades</a></li>
                <li><a href="../html/descubrete.html">Descubrete</a></li>
                <li><a href="../html/soporte.html">Soporte</a></li>
                <li><a href="../html/contacto.html">Contactos</a></li>
                <li><a id="esta" href="../html/suscribirse.html">Suscribirse</a></li>
                <li><a href="../html/iniciar-sesion.html">Iniciar Sesión</a></li>
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
                <li><a href="../html/suscribirse.html">Suscribirse</a></li>
                <li><a href="../html/iniciar-sesion.html">Iniciar Sesión</a></li>
            </ul>
        </nav>
        <img class="hamburguesa" src="../img/hamburguesa.svg" alt="">
    </header>
    <main class="pag-suscripcion">
<!--Primera suscripcion-->
        <div class="tarjeta-suscripcion">
            <h2>Plan mensual</h2>
            <img src="../img/ReadBook4.png" alt="">

            <p>Este plan contiene: </p> <br>
            <p>
                <li>Puedes publicar 2 libros al mes</li>
                <li>Solo puedes editarlos 3 veces</li>
            </p>
            <br><br>

            <div id="boton-suscribirse">
                <input type="button" id="toggle-form1" value="Suscribirse">
            </div>
            
            
            <form id="formulario-subs1" action="suscripcionControl.php" method="post">
                <h2>Ingrese lo siguiente</h2>
                <br>
                <label for="id">Correo:</label>
                <input type="text" placeholder="Ingrese su correo" name="mail">
                <br>
                <label for="tipoSub">Tipo de suscripcion:</label>
                <input type="text" placeholder="Plan mensual" readonly value="Mensual">
                <br>
                <label for="costo">Costo:</label>
                <input type="number" placeholder="$22.00" name="costo" value="22.00" readonly>
                <br>
                <label for="date">Fecha de inicio:</label>
                <p id="fecha"></p>
                <br>
                <label for="expiry-date">Fecha de expiracion:</label>
                <p id="fechaTermino"></p>
                <br>
                <input type="hidden" name="opcion" value="pagar1">
                <button type="submit">Pagar</button>
                

            </form>
        </div>
<!--Segunda suscripcion-->
        <div class="tarjeta-suscripcion">
            <h2>Plan cada 3 meses</h2>
            <img src="../img/ReadBook4.png" alt="">
            <p>Este plan contiene: </p> <br>
            <p>
                <li>Puedes publicar 5 libros al mes</li>
                <li>Solo puedes editarlos 7 veces</li>
            </p>
            <br><br>
            <div id="boton-suscribirse">
                <input type="button" id="toggle-form2" value="Suscribirse">
            </div>
            
            
            <form id="formulario-subs2" action="suscripcionControl.php" method="post">
                <h2>Ingrese lo siguiente</h2>
                <br>
                <label for="id">Correo:</label>
                <input type="text" placeholder="Ingrese su Correo" name="mail">
                <br>
                <label for="tipoSub">Tipo de suscripcion:</label>
                <input type="text" placeholder="Plan 3 meses" name="tipo" value="Trimestral" readonly>
                <br>
                <label for="costo">Costo:</label>
                <input type="number" placeholder="$66.00" name="costo" value="66.00" readonly>
                <br>
                <label for="date">Fecha de inicio:</label>
                <p id="fecha2"></p>
                <br>
                <label for="expiry-date">Fecha de expiracion:</label>
                <p id="fechaTermino2"></p>
                <br>
                <input type="hidden" name="opcion" value="pagar2">
                <button type="submit">Pagar</button>
            </form>
        </div>
<!--Tercera suscripcion-->
        <div class="tarjeta-suscripcion">
            <h2>Plan anual</h2>
            <img src="../img/ReadBook4.png" alt="">
            <p>Este plan contiene: </p> <br>
            <p>
                <li>Puedes publicar libros ilimitados</li>
                <li>Editalos cuando quieras</li>
                <li>Puedes descargar tus libros favoritos</li>
            </p>
            <br>
            <div id="boton-suscribirse">
                <input type="button" id="toggle-form3" value="Suscribirse">
            </div>
            
            
            <form id="formulario-subs3" action="suscripcionControl.php" method="post">
                <h2>Ingrese lo siguiente</h2>
                <br>
                <label for="id">Correo:</label>
                <input type="text" placeholder="Ingrese su correo" name="mail">
                <br>
                <label for="tipoSub">Tipo de suscripcion:</label>
                <input type="text" placeholder="Plan anual" name="tipo" value="Anual" readonly>
                <br>
                <label for="costo">Costo:</label>
                <input type="number" placeholder="$264.00" name="costo" value="264.00" readonly>
                <br>
                <label for="date">Fecha de inicio:</label>
                <p id="fecha3"></p>
                <br>
                <label for="expiry-date">Fecha de expiracion:</label>
                <p id="fechaTermino3"></p>
                <br>
                <input type="hidden" name="opcion" value="pagar3">
                <button type="submit">Pagar</button>

            </form>
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
    <script src="../js/menu.js"></script>
    <script src="../js/menuham.js"></script>
    <script src="../js/suscripcion.js"></script>
    <script src="../js/fecha-subs.js"></script>
</html>