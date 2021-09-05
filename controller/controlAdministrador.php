<?php
require_once('model/modeloAdministrador.php');

$administrador = new ModeloAdministrador();

if(isset($_POST['dato'])){

    $administrador->BusUsuGen($_POST['dato']);

}else if(isset($_POST['codigoA'])){

    $values  = $administrador->BusUsuGen($_POST['codigoA']);
    
}else if(isset($_POST['codigoE'])){

    $administrador->EliUsuGen($_POST['codigoE']);

}else if(isset($_POST['genero'])){

    $administrador->registrarUsGen($_POST['Cedula'],$_POST['Nombre'],$_POST['Apellido'],$_POST['Correo'],$_POST['Celular'],$_POST['genero'],$_POST['fecha'],$_POST['Dirección'],$_POST['Ciudad']);

}else{
    $administrador->UsuGen();
}

