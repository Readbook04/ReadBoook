<link rel="stylesheet" href="../css/estilos.css">
<?php
class Usuarios{
    private $nombre_usuario;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $tipo;
    private $correo;
    private $contraseña;

    public function inicializar ($nombre_usuario, $apellidoPaterno, $apellidoMaterno, $tipo, $correo, $contraseña){
        $this->nombre_usuario = $nombre_usuario;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->tipo = $tipo;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
    }

    public function conectorBD(){
        $con=mysqli_connect("localhost", "root", "", "readbook")
        or die("Problemas con la conexion a la base de datos");
        return $con;
    }

    public function ingresarUsuario(){
        $registro = mysqli_query($this->conectorBD(), "SELECT *
        FROM usuario where correo='$this->correo'")or die(mysqli_error($this->conectorBD()));
        if($reg=mysqli_fetch_array($registro)){
         echo "<h1>El mail ya existe</h1>";
        }else{
        mysqli_query($this->conectorBD(), "INSERT INTO usuario(nombre_usuario, apellidoPaterno, apellidoMaterno, tipo, correo, contraseña)
        values ('$this->nombre_usuario','$this->apellidoPaterno','$this->apellidoMaterno', '$this->tipo', '$this->correo', '$this->contraseña')") or die
        ("Problemas en el insert".mysqli_error($this->conectorBD()));
        echo "<h1>El usuario se registro de forma correcta</h1>";
        }
    }

    public function validarUsuario($correo, $contraseña){
        $registro = mysqli_query($this->conectorBD(), "SELECT *
            FROM usuario WHERE correo='$correo' AND contraseña='$contraseña'") or die(mysqli_error($this->conectorBD()));
        if(mysqli_num_rows($registro) > 0){
            $usuario = mysqli_fetch_assoc($registro);
            $_SESSION['nombre'] = $usuario['nombre'];
            switch($usuario['tipo']){
                case 'Administrador':
                    header("Location: ../vistas/admin/adminLibros.php"); 
                    break;
                case 'Escritor':
                    header("Location: ../vistas/escritor/indexEscritor.html");
                    break;
                case 'Lector':
                    header("Location: ../vistas/lector/perfilLector.php?nombre_usuario=".$usuario['nombre_usuario']);
                    break;
            }
        } else {
            header("Location: ../html/iniciar-sesion.html"); 
        }
    }
    
    public function consultarDatosLector(){
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo = 'antonio@gmail.com'") or
        die(mysqli_error($this->conectorBD()));
        while ($reg=mysqli_fetch_array($registros)){
            echo'<section class="contenedor01">
            <div class="encabezado-iniciar-sesion">
                <img src="../../img/ReadBook4.png" alt="">
            </div>
            <div class="formulario01">
                    <br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Nombre(s): '
                    .$reg['nombre_usuario'].'
                    <br><br>
                    Apellido Paterno: '
                    .$reg['apellidoPaterno'].'
                    <br><br>
                    Apellido Materno: '
                    .$reg['apellidoMaterno'].'
                    <br><br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Tipo de cuenta: '
                    .$reg['tipo'].'
                    <br><br><br><br>
                    <a href="listarLector.php">Editar Perfil</a>
            </div>';
            echo '</section>';
        }
    }

    public function listarDatosLector(){
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo = 'antonio@gmail.com'") or
        die(mysqli_error($this->conectorBD()));
        
        while ($reg=mysqli_fetch_array($registros)){
            echo '<table><tr>'.'<th>Nombre(s)</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Correo</th>
                <th>Tipo de cuenta</th>
                <th colspan="2">Acciones</th>';
            echo '<tr>'.'<td>'.$reg['nombre_usuario'].'</td>
                <td>'.$reg['apellidoPaterno'].'</td>
                <td>'.$reg['apellidoMaterno'].'</td>
                <td>'.$reg['correo'].'</td>
                <td>'.$reg['tipo'].'</td>
                <td>'.'<a id="verde" href="../../html/modificarPerfil.html">Modificar</a></td>';
            echo '</table>';
        }
    }

    public function modificarDatos($correo) {
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo='$correo'") or
        die("Problemas en el select:".mysqli_error($this->conectorBD()));
        if ($reg=mysqli_fetch_array($registros)){
            echo"<br><form action='modificarPerfil.php' method='post'>
            Nombre(s)
            <input type='text' name='nombre_usuario' value=".$reg['nombre_usuario']." required>
            Apellido paterno
            <input type='text' name='apellidoPaterno' value=".$reg['apellidoPaterno']." required>
            Apellido materno
            <input type='text' name='apellidoMaterno'  value=".$reg['apellidoMaterno']." required>
            Correo
            <input type='email' name='correo'  value=".$reg['correo']." required>
            Contraseña
            <input type='password' name='contraseña'  value=".$reg['contraseña']." required>
            Tipo de cuenta <br>
            <select name='tipo'>
                <option value='Administrador'>Administrador</option>
                <option value='Lector'>Lector</option>
                <option value='Escritor'>Escritor</option>
            </select><br>
            <input type='hidden' name='opcion' value='2'><br><br>
          <div class='boton-enviar1'>
            <input type='submit' value='Enviar'>
          </div>
        </form>";
        }else{
            echo "No existe un usuario con dicho correo";
        }
    
    }

    public function modificar2($nombre_usuario,$apellidoPaterno,$apellidoMaterno,$correo,$contraseña,$tipo){
        mysqli_query($this->conectorBD(), "UPDATE usuario SET nombre_usuario = '$nombre_usuario', apellidoPaterno = '$apellidoPaterno', apellidoMaterno = '$apellidoMaterno', correo = '$correo', contraseña = '$contraseña', tipo = '$tipo' WHERE correo = '$correo'") or die("Error al modificar: " . mysqli_error($this->conectorBD()));
        echo '<div class="falloPublicar">Los datos fueron actualizados<button><a href="listarLector.php">Aceptar</a></button></div>';

    }
    public function lectorBorrar($correo){
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo = '$correo'") or
        die(mysqli_error($this->conectorBD()));
        if($reg=mysqli_fetch_array($registros)){
            echo'<section class="contenedor01">
            <div class="encabezado-iniciar-sesion">
                <img src="../../img/ReadBook4.png" alt="">
            </div>
            <div class="formulario01">
                    <br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Nombre(s): '
                    .$reg['nombre_usuario'].'
                    <br><br>
                    Apellido Paterno: '
                    .$reg['apellidoPaterno'].'
                    <br><br>
                    Apellido Materno: '
                    .$reg['apellidoMaterno'].'
                    <br><br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Tipo de cuenta: '
                    .$reg['tipo'].'
            </div>';
            echo '</section>';
            mysqli_query($this->conectorBD(),"delete from usuario where correo='correo'")
            or die (mysqli_error($this->conectorBD()));
            echo '<br><h1>Se efectuo el borrado</h1>';
        }else{
            echo '<h1>No existe un alumno con dicho correo</h1>';
        }
        }
    }

?>
