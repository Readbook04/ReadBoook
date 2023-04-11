<?php
class Escritor
{

    public function conexionBD()
    {
        $conected = mysqli_connect("localhost", "root", "", "readbook") or die("Problemas con la conexión" . mysqli_error($this->conexionBD()));
        return $conected;
    }

    public function mostrarPerfil()
    {
        $escritor = mysqli_query($this->conexionBD(), "SELECT * from usuario where correo = 'yutzil@gmail.com'") or die("No se pudo recopilar la información del escritor" . mysqli_error($this->conexionBD()));
        if ($reg = mysqli_fetch_array($escritor)) {
            echo '<h2>Perfil</h2>
            <a href="publicarLibro.php">
            <input type="button" id="publicarLi" value="Publicar Libro">
            </a>
            <div class="descubrete">
                <section class="datos-perfil">
                    <div class="foto">
                    <img src="data:image/*;base64,' . base64_encode($reg[1]) . '">
                    </div>
                    <div>
                        <p>Nombre: ' . $reg[2] . " " . $reg[3] . " " . $reg[4] . '<br>
                            Biografia: ' . $reg[5] . '<br>
                            Tipo: ' . $reg[6] . '<br>
                            N° Telefono:' . $reg[7] . '<br>
                            Correo:' . $reg[8] . '</p>
                    </div>
                </section>
                <div class="libros-Per">';

            $libro = mysqli_query($this->conexionBD(), "SELECT * FROM libros where autor = '$reg[2]'");


            while ($li = mysqli_fetch_array($libro)) {
                echo '<a class="cont-libro" href="data:application/pdf;base64,' . base64_encode($li['libro']) . '" target="_blank"">
                    <section class="libro">
                        <img src="data:image/*;base64,' . base64_encode($li[1]) . '">
                    </section>
                    <section class="infoLiro-pu">
                        <p>Titulo:' . $li[3] . ' <br>
                            Autor:' . $li[2] . ' <br>
                            Genero:' . $li[7] . ' <br>
                            Sinopsis:' . $li[4] . '.</p>
                            </section>
                        <div class="des-opciones">
                            <form action="../../php/librosControl.php" method="post">
                                <input type="hidden" name="opcion" value="4">
                                <input type="hidden" name="id_libro" value="' . $li[0] . '">
                                <input type="submit" value="Modificar" id="verde">
                            </form>
                            <form action="../../php/librosControl.php" method="post">
                                <input type="hidden" name="opcion" value="3">
                                <input type="hidden" name="id_libro" value="' . $li[0] . '">
                                <input type="submit" value="Eliminar" id="rojo">
                            </form>
                        </div>
                </a>';

            }
            echo '</div>';
        }
    }

    public function cerrarBD()
    {
        mysqli_close($this->conexionBD());
    }
}
