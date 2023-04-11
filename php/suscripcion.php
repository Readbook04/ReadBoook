<link rel="stylesheet" href="../css/estilos.css">
<?php
class Suscripcion{
    private $correo;
    private $tipoSub;
    private $costo;

    public function inicializar($mail, $tipoS, $cos){
        $this->correo= $mail;
        $this->tipoSub= $tipoS;
        $this->costo= $cos;
    }

    public function conectorBD(){
        $con=mysqli_connect("localhost", "root", "", "readbook")
        or die("Problemas con la conexion a la base de datos");
        return $con;
    }

    public function ingresarSuscripcion(){
        $registro= mysqli_query($this->conectorBD(), "SELECT * FROM suscripcion
        where correo = '$this->correo'") or die (mysqli_error($this->conectorBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo "<div class='falloSuscripcion'> Aceptar<a href='../vistas/escritor/indexEscritor.html'>Aceptar</a></button></div>'";
           }else{
            $fecha= date('Y-m-d', strtotime('-1 day'));
            $fechaFin = date('Y-m-d', strtotime('+1 month', strtotime($fecha)));
           mysqli_query($this->conectorBD(), "INSERT INTO suscripcion(correo, tipo, costo, fechaInicio, fechaTermino)
           values ('$this->correo', '$this->tipoSub','$this->costo','$fecha', '$fechaFin')") or die
           ("Problemas en el insert".mysqli_error($this->conectorBD()));
           echo "<div class='falloSuscripcion'> Se registro correctamente la suscripcion <a href='../vistas/escritor/indexEscritor.html'>Aceptar</a></button></div>'";
           }
    }

    public function ingresarSuscripcion2(){
        $registro= mysqli_query($this->conectorBD(), "SELECT * FROM suscripcion
        where correo = '$this->correo'") or die (mysqli_error($this->conectorBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo "<div class='falloSuscripcion'> La suscripcion ya existe <a href='index.html'><button type='button'>Aceptar</button></a></div>";
           }else{
            $fecha= date('Y-m-d', strtotime('-1 day'));
            $fechaFin = date('Y-m-d', strtotime('+3 month', strtotime($fecha)));
           mysqli_query($this->conectorBD(), "INSERT INTO suscripcion(correo, tipo, costo, fechaInicio, fechaTermino)
           values ('$this->correo', '$this->tipoSub','$this->costo','$fecha', '$fechaFin')") or die
           ("Problemas en el insert".mysqli_error($this->conectorBD()));
           echo "<div class='falloSuscripcion'> Se registro correctamente la suscripcion <a href='../vistas/escritor/indexEscritor.html'><button type='button'>Aceptar</button></a></div>";
           }
    }

    public function ingresarSuscripcion3(){
        $registro= mysqli_query($this->conectorBD(), "SELECT * FROM suscripcion
        where correo = '$this->correo'") or die (mysqli_error($this->conectorBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo "<div class='falloSuscripcion'> La suscripcion ya existe <a href='index.html'><button type='button'>Aceptar</button></a></div>";
           }else{
            $fecha= date('Y-m-d', strtotime('-1 day'));
            $fechaFin = date('Y-m-d', strtotime('+1 year', strtotime($fecha)));
           mysqli_query($this->conectorBD(), "INSERT INTO suscripcion(correo, tipo, costo, fechaInicio, fechaTermino)
           values ('$this->correo', '$this->tipoSub','$this->costo','$fecha', '$fechaFin')") or die
           ("Problemas en el insert".mysqli_error($this->conectorBD()));
           echo "<div class='falloSuscripcion'> Se registro correctamente la suscripcion <a href='../vistas/escritor/indexEscritor.html'><button type='button'>Aceptar</button></a></div>";
           }
    }
    

    public function borrarSuscripcion($correo){

        $registro = mysqli_query($this->conectorBD(),"SELECT  *  from suscripcion where 
        correo='$correo'") or die (mysqli_error($this->conectorBD()));

        if($reg=mysqli_fetch_array($registro)){
            echo  $reg['correo']. "<br><br>";
            echo  $reg['tipo'] ."<br><br>";
            echo $reg['costo']. "<br><br>";

           mysqli_query($this->conectorBD(), "DELETE from suscripcion where correo = '$correo'") or
            die (mysqli_error($this->conectorBD()));
        
             echo "<script type='text/javascript'>alert('Se borro correctamente la suscripcion');</script>";
        }
        else{
             echo "<script type='text/javascript'>alert('No existe esa suscripcion');</script>";
        }
    }
    
    public function modificarSuscripcion($correo) {
        if ($_POST['accion'] == 'modificar') {
            $correo = $_POST['mail'];
            $tipoSub = $_POST['tipoSub'];
    
            $registro = mysqli_query($this->conectorBD(), "SELECT * FROM suscripcion WHERE correo = '$correo'") or die (mysqli_error($this->conectorBD()));
            $reg = mysqli_fetch_array($registro);
    
            if ($tipoSub == 'Mensual') {
                $costo = 22;
                $fechaInicio = date('Y-m-d');
                $fechaTermino = (new DateTime($fechaInicio))->add(new DateInterval('P1M'))->format('Y-m-d');
    
            } else if ($tipoSub == 'Trimestral') {
                $costo = 66;
                $fechaInicio = date('Y-m-d');
                $fechaTermino = (new DateTime($fechaInicio))->add(new DateInterval('P3M'))->format('Y-m-d');
    
            } else if ($tipoSub == 'Anual') {
                $costo = 264;
                $fechaInicio = date('Y-m-d');
                $fechaTermino = (new DateTime($fechaInicio))->add(new DateInterval('P1Y'))->format('Y-m-d');
            }
    
            $_POST['costo'] = $costo;
            $_POST['fechaInicio'] = $fechaInicio;
            $_POST['fechaTermino'] = $fechaTermino;
            $this->modificarSuscripcion2($correo, $tipoSub, $costo, $fechaInicio, $fechaTermino);
        }
    }
    
    public function modificarSuscripcion2($correo, $tipoSub, $costo, $fechaInicio, $fechaTermino) {
        mysqli_query($this->conectorBD(), "UPDATE suscripcion SET tipo = '$tipoSub', costo = '$costo', fechaInicio = '$fechaInicio', fechaTermino = '$fechaTermino' WHERE correo = '$correo'") 
        or die ("Problemas en el update".mysqli_error($this->conectorBD()));
        echo "<script type='text/javascript'>alert('Se modificó correctamente la suscripción');</script>";
    }
    
    public function listarSuscripciones(){
        $registros = mysqli_query($this->conectorBD(), "SELECT * FROM suscripcion") or die(mysqli_error($this->conectorBD()));
        if(mysqli_num_rows($registros) > 0) {
            echo "<table>";
            echo "<tr><th>Correo</th><th>Tipo de suscripción</th><th>Costo</th><th>Fecha de inicio</th><th>Fecha de término</th></tr>";
            while($reg = mysqli_fetch_array($registros)) {
                echo "<tr><td>".$reg['correo']."</td><td>".$reg['tipo']."</td><td>".$reg['costo']."</td><td>".$reg['fechaInicio']."</td><td>".$reg['fechaTermino']."</td></tr>";
            }
        }
    }    
      

public function cerrarBD(){
    mysqli_close($this->conectorBD());
}
}
?>