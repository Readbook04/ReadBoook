<?php

class adminLibro
{
    private $foto;
    private $titulo;
    private $autor;
    private $sinopsis;
    private $genero;
    private $pdf;

    public function inicializar($fot, $tit, $aut, $sin, $gen, $pdf)
    {
        $this->foto = mysqli_real_escape_string($this->conexionBD(), $fot);
        $this->titulo = $tit;
        $this->autor = $aut;
        $this->sinopsis = $sin;
        $this->genero = $gen;
        $this->pdf = mysqli_real_escape_string($this->conexionBD(), $pdf);
    }

    public function conexionBD()
    {
        $conected = mysqli_connect("localhost", "root", "", "readbook") or die("Error con la conexiion" . mysqli_error($this->conexionBD()));
        return $conected;
    }

    public function agregarLibro()
    {
        $validar = mysqli_query($this->conexionBD(), "SELECT * FROM libros where titulo = '$this->titulo'") or die("Problemas con la validacion" . mysqli_error($this->conexionBD()));
        if ($val = mysqli_fetch_array($validar)) {
            echo '<div class="falloPublicar">Ya existe este libro<a href="../vistas/admin/adminLibros.php"><button id="verde">Aceptar</button></a></div>';
        } else {
            $fecha = date('Y-m-d');

            mysqli_query($this->conexionBD(), "INSERT INTO libros (foto, autor, titulo, sinopsis, fecha_publicacion, libro, codigo_genero) 
            values ('$this->foto', '$this->autor', '$this->titulo','$this->sinopsis','$fecha','$this->pdf',$this->genero)") or die("Fallo en la publicación" . mysqli_error($this->conexionBD()));

            echo '<div class="falloPublicar">Libro Publicado <a href="../vistas/admin/adminLibros.php"><button id="verde">Aceptar</button></a></div>';
        }
    }

    public function eliminarLibro($id)
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM libros l join generos s where l.codigo = $id") or die("Error al consultar id" . mysqli_error($this->conexionBD()));

        if (mysqli_fetch_array($registro)) {
            echo '<div class="falloPublicar">El libro fue borrado<a href="../vistas/admin/adminLibros.php"><button id="verde">Aceptar</button></a></div>';
            mysqli_query($this->conexionBD(), "DELETE FROM libros where codigo = $id") or die("Se produjo un falla al borrar el libro" . mysqli_error($this->conexionBD()));
        } else {
            echo '<div class="falloPublicar">El libro ya fue borrado<a href="../vistas/admin/adminLibros.php"><button id="verde">Aceptar</button></a></div>';
        }
    }

    public function modificar1($id)
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM libros where codigo = $id") or die("Error en la busqueda" . mysqli_error($this->conexionBD()));
        if ($reg = mysqli_fetch_array($registro)) {
            echo '<h1>Modificar Libro</h1>
            <section class="publicarLiContenedor">
                <div class="publicarLiEncabezado">
                    <img src="../img/logo-removebg-preview (1).png" alt="">
                </div>
                <div class="publicarLiForm">
                    <form action="adminLibroControl.php" method="post" enctype="multipart/form-data">
                        <div class="publicarLiPortada">
                            <input type="file" id="imagen" onchange="mostrarImagen()" accept="image/*" name="foto" required>
                            <label for="imagen"><img src="data:image/jpeg;base64,' . base64_encode($reg['foto']) . '" id="vista-previa"></label>
                        </div>
                        <div class="publicarForm">
                            <label for="tit">Titulo</label>
                            <input type="text" name="titulo" id="ti" value="' . $reg['titulo'] . '">
                            <label for="nom">Autor</label>
                            <input type="text" name="autor" id="nom" value="' . $reg['autor'] . '" readonly>
                            <label for="hor">Fecha</label>
                            <p id="fecha" value="' . $reg["fecha_publicacion"] . '">' . $reg["fecha_publicacion"] . '</p>
                            <label for="sinop">Sinopsis</label>
                            <textarea name="sinopsis" id="sinop">' . $reg['sinopsis'] . '</textarea>
                            <label for="gen">Genero</label>
                            <select name="genero" id="gen">';
            include_once 'libro.php';
            $lib = new Libro();
            $lib->listarGeneros($reg['codigo_genero']);
            $lib->cerrarBD();
            echo '</select>
                        <label for="fileInput"><img src="../img/pdf.png" alt=""></label>
                            <input type="hidden" name="opcion" value="5">
                            
                            <input type="file" name="pdf" id="fileInput" accept=".pdf">
                            <p id="fileName">' . $reg['titulo'] . '.pdf</p>
                            <input type="hidden" name="id" value="' . $reg[0] . '">
                        </div>
                        <div></div>
                        <div class="publicar-botones">
                            <button class="botones"><a href="../vistas/admin/adminLibros.php">Cancelar</a></button>
                            <input class="botones" type="submit" value="Modificar">
                        </div>
                    </form>
                </div>
            </section>';
        }
    }

    public function mostrarLibro($genero)
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM libros l join generos g on  L.codigo_genero = g.codigo where codigo_genero = '$genero'") or die("Error en la consulta" . mysqli_error($this->conexionBD()));
        echo '<h1>Libros</h1>
        <h3>Genero</h3><form action="adminLibroControl" method="post">
        <select name="genero" id="">';
        include_once "../../php/adminLibroControl.php";
        $lib = new adminLibro();
        $lib->listarGeneros();
        $lib->cerrarBD();
        echo '<select>
        <input type="hidden" name="opcion" value="2">
        <input type="submit" value="Filtrar" id="verde">
        </form>';
        echo '<table>';
        echo '<tr><th>Codigo</th><th>Foto</th><th>Autor</th><th>Titulo</th><th>Sinopsis</th><th>Fecha de Publicacion</th><th>Libro</th><th>Genero</th><th colspan="3">Acciones</th></tr>';
        while ($reg = mysqli_fetch_array($registro)) {
            echo "<tr>";
            echo "<td>" . $reg[0] . "</td>";
            echo "<td>" . '<img src="data:image/png;base64,' . base64_encode($reg[1]) . '"></td>';
            echo "<td>" . $reg[2] . "</td>";
            echo "<td>" . $reg[3] . "</td>";
            echo "<td>" . $reg[4] . "</td>";
            echo "<td>" . $reg[5] . "</td>";
            echo "<td>" . '<img src="../img/pdf.png">' . "</td>";
            echo "<td>" . $reg[9] . "</td>";
            echo '<td><form action="../../php/adminLibroControl.php" method="post">
            <input type="hidden" name="opcion" value="4">
            <input type="hidden" name="id_libro" value="' . $reg[0] . '">
            <input type="submit" value="Modificar" id="verde">
             </form></td>';
            echo '<td><form action="../../php/adminLibroControl.php" method="post">
            <input type="hidden" name="opcion" value="3">
            <input type="hidden" name="id_libro" value="' . $reg[0] . '">
            <input type="submit" value="Eliminar" id="rojo">
             </form></td>';
            echo '<td><a href="data:application/pdf;base64,' . base64_encode($reg['libro']) . '" target="_blank""><button id="azul">Leer</button></a></td></tr>';
        }
        echo "</table>";
    }

    public function modificar2($portada, $titulo, $autor, $sinopsis, $genero, $libro, $id)
    {
        $foto = mysqli_real_escape_string($this->conexionBD(), $portada);
        $pdf = mysqli_real_escape_string($this->conexionBD(), $libro);
        $fecha = date('Y-m-d');

        mysqli_query($this->conexionBD(), "UPDATE libros SET foto = '$foto', autor = '$autor', titulo = '$titulo', sinopsis = '$sinopsis', fecha_publicacion = '$fecha', libro = '$pdf', codigo_genero = $genero WHERE codigo = $id") or die("Error al modificar: " . mysqli_error($this->conexionBD()));
        echo '<div class="falloPublicar">El libro fue Modificado<button><a href="../vistas/admin/adminLibros.php">Aceptar</a></button></div>';
    }

    public function tablaLibros()
    {
        $registros = mysqli_query($this->conexionBD(), "SELECT * FROM libros l join generos s where l.codigo_genero = s.codigo");
        echo '<a href = "../../vistas/admin/publicarLibro.php"><i class="fa-solid fa-book-medical"></i>Agregar Libro</a>';
        echo '<table>';
        echo '<tr><th>Codigo</th><th>Foto</th><th>Autor</th><th>Titulo</th><th>Sinopsis</th><th>Fecha de Publicacion</th><th>Libro</th><th>Genero</th><th colspan="3">Acciones</th></tr>';
        while ($reg = mysqli_fetch_array($registros)) {
            echo "<tr>";
            echo "<td>" . $reg[0] . "</td>";
            echo "<td>" . '<img src="data:image/png;base64,' . base64_encode($reg[1]) . '"></td>';
            echo "<td>" . $reg[2] . "</td>";
            echo "<td>" . $reg[3] . "</td>";
            echo "<td>" . $reg[4] . "</td>";
            echo "<td>" . $reg[5] . "</td>";
            echo "<td>" . '<img src="../../img/pdf.png">' . "</td>";
            echo "<td>" . $reg[9] . "</td>";
            echo '<td><form action="../../php/adminLibroControl.php" method="post">
            <input type="hidden" name="opcion" value="4">
            <input type="hidden" name="id_libro" value="' . $reg[0] . '">
            <input type="submit" value="Modificar" id="verde">
             </form></td>';
            echo '<td><form action="../../php/adminLibroControl.php" method="post">
            <input type="hidden" name="opcion" value="3">
            <input type="hidden" name="id_libro" value="' . $reg[0] . '">
            <input type="submit" value="Eliminar" id="rojo">
             </form></td>';
            echo '<td><a href="data:application/pdf;base64,' . base64_encode($reg['libro']) . '" target="_blank""><button id="azul">Leer</button></a></td></tr>';
        }
        echo "</table>";
    }


    public function listarGeneros($generoSeleccionado = null)
    {
        $consulta = "SELECT * FROM generos";
        $resultado = mysqli_query($this->conexionBD(), $consulta) or die("Error en la consulta" . mysqli_error($this->conexionBD()));

        while ($fila = mysqli_fetch_array($resultado)) {
            if ($fila['codigo'] == $generoSeleccionado) {
                echo '<option value="' . $fila[0] . '" selected>' . $fila[1] . '</option>';
            } else {
                echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
            }
        }
    }



    public function cerrarBD()
    {
        mysqli_close($this->conexionBD());
    }
}
