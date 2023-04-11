<?php

class Genero
{
    private $nombre;

    public function conexionBD()
    {
        $conected = mysqli_connect("localhost", "root", "", "readbook");
        return $conected;
    }

    public function inicializar($nombre)
    {
        $this->nombre = $nombre;
    }

    public function agregarGenero()
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM generos where nombre = '$this->nombre'");

        if (mysqli_fetch_array($registro)) {
            echo '<div class="falloPublicar">El genero ya existe<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        } else {
            mysqli_query($this->conexionBD(), "INSERT INTO generos (nombre) VALUES ('$this->nombre')") or die("No se pudo agregar el género" . mysqli_error($this->conexionBD()));
            echo '<div class="falloPublicar">El género fue agregado<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        }
    }

    public function eliminarGenero($id){
        $registro = mysqli_query($this->conexionBD(),"SELECT * FROM generos where codigo = $id")or die("No se encontro el genero a borrar".mysqli_error($this->conexionBD()));

        if(mysqli_fetch_array($registro)){
            mysqli_query($this->conexionBD(),"DELETE FROM generos where codigo = $id")or die("No se encontro el libro a borrar".mysqli_error($this->conexionBD()));
            echo '<div class="falloPublicar">El género fue borrado<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        }else{
            echo '<div class="falloPublicar">El género ya ha sido borrado<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        }
    }

    public function tablaGenero()
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM generos");

        echo '<a href = "../../vistas/admin/agregarGenero.html"><i class="fa-solid fa-book-medical"></i>Agregar Genero</a>';
        echo '<table>';
        echo '<tr><th>Codigo</th><th>Genero</th><th colspan="2">Acciones</th></tr>';
        while ($reg = mysqli_fetch_array($registro)) {
            echo "<tr>";
            echo "<td>" . $reg[0] . "</td>";
            echo "<td>" . $reg[1] . "</td>";
            echo '<td><form action="../../php/adminGenerosC.php" method="post">
            <input type="hidden" name="opcion" value="3">
            <input type="hidden" name="id_genero" value="'.$reg[0] .'">
            <input type="submit" value="Modificar" id="verde">
             </form></td>';
            echo '<td><form action="../../php/adminGenerosC.php" method="post">
            <input type="hidden" name="opcion" value="2">
            <input type="hidden" name="id_genero" value="'.$reg[0] .'">
            <input type="submit" value="Eliminar" id="rojo">
             </form></td>';
        }
        echo "</table>";
    }

    public function modificar1($id){
        $registro = mysqli_query($this->conexionBD(),"SELECT * FROM generos where codigo = $id")or die("No se encontro el id del genero a modificar".mysqli_error($this->conexionBD()));
        if($reg = mysqli_fetch_array($registro)){
        echo '<h1>Modificar Genero</h1>
        <section class="publicarLiContenedor">
            <div class="publicarLiEncabezado">
                <img src="../img/logo-removebg-preview (1).png" alt="">
            </div>
            <div class="publicarLiForm">
                <form action="adminGenerosC.php" method="post" enctype="multipart/form-data">
                    <div class="publicarLiPortada">
                    </div>
                    <div class="publicarForm">
                        <label for="tit">Genero</label>
                        <input type="text" name="Genero" id="tit" value="'.$reg[1].'">
                    </div>
                    <div></div>
                    <div class="publicar-botones">
                        <input type="hidden" name="opcion" value="4">
                        <input type="hidden" name="id_genero" value="'.$reg[0].'">
                        <button class="botones"><a href="../vistas/admin/adminGeneros.php">Cancelar</a></button>
                        <input class="botones" type="submit" value="Modificar">
                    </div>
                </form>';
        }
    }

    public function modificar2($genero,$id){
        $registro = mysqli_query($this->conexionBD(),"SELECT * FROM generos where nombre = '$genero'")or die("Fallo en la busqueda del genero");

        if(mysqli_fetch_array($registro)){
            echo '<div class="falloPublicar">El género ya existe<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        }else{
            mysqli_query($this->conexionBD(),"UPDATE generos set nombre ='$genero' where codigo = $id");
            echo '<div class="falloPublicar">El género fue modificado<button><a href="../vistas/admin/adminGeneros.php">Aceptar</a></button></div>';
        }    
    }

    public function cerrarBD()
    {
        mysqli_close($this->conexionBD());
    }
}
