<?php
require_once('model/modeloUsuario.php');

$log = new ModeloUsuario();

if(isset($_POST['ingresar'])){

    $nom = $_POST['usu'];
    $pass = $_POST['pass'];

    $usu = $log->login($nom,$pass);

    if(count($usu)>=1){
        foreach($usu as $f){
            session_start();
            $_SESSION['doc'] = $f[0];
            $_SESSION['nomusu'] = $f[1];
            $_SESSION['clave'] = $f[2];
            $_SESSION['rol'] = $f[3];
            $_SESSION['estado'] = $f[4];
            $_SESSION['imagen'] = $f[5];
            
            header('Location:'.$f[3].'.php'); 
        }
    }else{
        echo '<script>
        alert("datos incorrectos");
        self.location="login.php";
        </script>';
    }
}

if(isset($_POST['registrar'])){
    $Cedula = $_POST['Cedula'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $Celular = $_POST['Celular'];
    $genero = $_POST['genero'];
    $fecha = $_POST['fecha'];
    $Dirección = $_POST['Dirección'];
    $Ciudad = $_POST['Ciudad'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];

    $log->registrar($Cedula, $Nombre , $Apellido, $Correo, $Celular, $genero, $fecha, $Dirección, $Ciudad, $Usuario, $Password);

}

require_once('view/vistalogin.php');
?>