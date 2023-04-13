<?php
class Escritor{

    public function conexionBD()
    {
        $conected = mysqli_connect("localhost", "root", "", "readbook") or die("Problemas con la conexión" . mysqli_error($this->conexionBD()));
        return $conected;
    }

    public function mostrarPerfil()
    {
        $escritor = mysqli_query($this->conexionBD(), "SELECT * from escritor where correo = 'yutzil@gmail.com'") or die("No se pudo recopilar la información del escritor" . mysqli_error($this->conexionBD()));
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
                    </div><br>
                    <a id="verde" href="../../vistas/escritor/listarEscritor.php">Editar perfil</a>
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

    public function listarDatosEscritor(){
        $registros=mysqli_query($this->conexionBD(),"SELECT * FROM escritor WHERE correo = 'yutzil@gmail.com'") or
        die(mysqli_error($this->conexionBD()));

        while ($reg=mysqli_fetch_array($registros)){
            echo '<table><tr>'.'<th>Foto</th>
                <th>Nombre(s)</th>
                <th>Apellido paterno</th>
                <th>Apellido Materno</th>
                <th>Biografia</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>';
                echo '<tr>'.'<td><img src="data:image/jpeg;base64,'. base64_encode($reg['foto']).'" /></td>
                <td>'.$reg['nombre'].'</td>
                <td>'.$reg['apellido_paterno'].'</td>
                <td>'.$reg['apellido_materno'].'</td>
                <td>'.$reg['biografia'].'</td>
                <td>'.$reg['telefono'].'</td>
                <td>'.$reg['correo'].'</td>
                <td>'.'<a id="verde" href="../../vistas/escritor/modificarPerfil.html">Modificar</a></td>';
            echo '</table>';
                
        }
    }

    public function modificarDatos($correo) {
        $registros=mysqli_query($this->conexionBD(),"SELECT * FROM escritor WHERE correo='$correo'") or
        die("Problemas en el select:".mysqli_error($this->conexionBD()));
        if ($reg=mysqli_fetch_array($registros)){
            echo"<br><form action='modificarPerfil.php' method='post'>";
            echo '<img src="data:image/jpeg;base64,'. base64_encode($reg['foto']).'" /><br><br><br>';
            echo "Foto<br><input type='file' onchange='mostrarImagen()' accept='image/*' name='foto' required>";
            echo "Nombre(s)
            <input type='text' name='nombre' value=".$reg['nombre']." required>
            Apellido Paterno
            <input type='text' name='apellido_paterno'  value=".$reg['apellido_paterno']." required>
            Apellido Materno
            <input type='text' name='apellido_materno'  value=".$reg['apellido_materno']." required>
            Biografia<br>
            <textarea name='biografia'>" .$reg['biografia']. "</textarea>
            Tipo de cuenta<br>
            <select name='tipo'>
                <option value='Administrador'>Administrador</option>
                <option value='Lector'>Lector</option>
                <option value='Escritor'>Escritor</option>
            </select><br><br>
            Telefono
            <input type='number' name='telefono'  value=".$reg['telefono']." required>
            correo
            <input type='email' name='correo'  value=".$reg['correo']." required>
            Contraseña
            <input type='password' name='contraseña'  value=".$reg['contraseña']." required><br><br>
            <input type='hidden' name='opcion' value='2'>
            <div class='boton-enviar1'>
            <input type='submit' value='Enviar'>
            </div>
            </form>";
        }else{
            echo "No existe un usuario con dicho correo";
        }
    }

    public function modificar2($foto,$nombre,$apellido_paterno,$apellido_materno,$biografia,$tipo,$telefono,$correo, $contraseña){
        $foto = mysqli_real_escape_string($this->conexionBD(), $foto);
        mysqli_query($this->conexionBD(), "UPDATE escritor SET foto = '$foto', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', biografia = '$biografia', tipo = '$tipo', telefono = '$telefono', correo = '$correo', contraseña = '$contraseña'  WHERE correo = '$correo'") or die("Error al modificar: " . mysqli_error($this->conexionBD()));
        echo '<div class="falloPublicar">Los datos fueron actualizados<button><a href="listarEscritor.php">Aceptar</a></button></div>';

    }

    public function cerrarBD()
    {
        mysqli_close($this->conexionBD());
    }
}
