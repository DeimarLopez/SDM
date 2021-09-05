<?php
require_once('model/modeloAdministrador.php');

$administrador = new ModeloAdministrador();

if(isset($_POST['dato'])){
    $administrador->BusUsuGen($_POST['dato']);
}else if(isset($_POST['codigoA'])){
    $values  = $administrador->BusUsuGen($_POST['codigoA']);
}else if(isset($_POST['codigoE'])){
    $administrador->EliUsuGen($_POST['codigoE']);
}else{
    $administrador->UsuGen();
}

/* $dato = $_POST['dato']; */
/* require_once('view/vistaAdministrador.php'); */
