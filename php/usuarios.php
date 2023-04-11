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
                    header("Location: ../vistas/perfilAdministrador.php?nombre_usuario=".$usuario['nombre_usuario']); 
                    break;
                case 'Escritor':
                    header("Location: ../vistas/perfilEscritor.php?nombre_usuario=".$usuario['nombre_usuario']);
                    break;
                case 'Lector':
                    header("Location: ../vistas/perfilLector.php?nombre_usuario=".$usuario['nombre_usuario']);
                    break;
            }
        } else {
            echo "Usuario y/o contraseña incorrectos";
        }
    }
    
    public function consultarDatosLector(){
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo = 'antonio@gmail.com'") or
        die(mysqli_error($this->conectorBD()));
        while ($reg=mysqli_fetch_array($registros)){
            echo'<section class="contenedor01">
            <div class="encabezado-iniciar-sesion">
                <img src="../img/ReadBook4.png" alt="">
            </div>
            <div class="formulario01">
                    <br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Nombre(s): '
                    .$reg['nombre'].'
                    <br><br>
                    Apellido Paterno: '
                    .$reg['apellido_paterno'].'
                    <br><br>
                    Apellido Materno: '
                    .$reg['apellido_materno'].'
                    <br><br>
                    Correo: '
                    .$reg['correo'].'
                    <br><br>
                    Tipo de cuenta: '
                    .$reg['tipo'].'
                    <br><br><br><br>
                    <a href="../php/listarLector.php">Editar Perfil</a>
            </div>';
            echo '</section>';
        }
    }

    public function listarDatosLector(){
        $registros=mysqli_query($this->conectorBD(),"SELECT * FROM usuario WHERE correo = 'antonio@gmail.com'") or
        die(mysqli_error($this->conectorBD()));
        
        while ($reg=mysqli_fetch_array($registros)){
            echo '<table class="admin"><tr>'.'<th>Nombre(s)</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Correo</th>
                <th>Tipo de cuenta</th>
                <th>Acciones</th>';
            echo '<tr>'.'<td>'.$reg['nombre_usuario'].'</td>
                <td>'.$reg['apellidoPaterno'].'</td>
                <td>'.$reg['apellidoMaterno'].'</td>
                <td>'.$reg['correo'].'</td>
                <td>'.$reg['tipo'].'</td>
                <td>'.'<a href="../html/modificarPerfil.html">Modificar</a>'.
                '<a href="">Eliminar</a>';
            echo '</section>';
        }
    }

    public function modificarDatos($nombre_usuario, $apellidoPaterno, $apellidoMaterno, $correo, $contraseña, $tipo){
        $registros=mysqli_query($this->conectorBD(),"UPDATE usuario SET nombre_usuario='$nombre_usuario', apellido_paterno='$apellidoPaterno', apellido_materno='$apellidoMaterno', correo='$correo', contraseña='$contraseña', tipo='$tipo' WHERE correo='antonio@gmail.com'") or
        die(mysqli_error($this->conectorBD()));
        echo "El nombre se modifico con exito";
    }
}

?>
