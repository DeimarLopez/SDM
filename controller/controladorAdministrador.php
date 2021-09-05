<?php
require_once('model/modeloAdministrador.php');

session_start();
         $doc  = $_SESSION['doc'];
         $nomusu  = $_SESSION['nomusu'];
         $clave  = $_SESSION['clave'];
         $rol  = $_SESSION['rol'];
         $estado  = $_SESSION['estado'];
         $imagen  = $_SESSION['imagen'];
         $nom  = $_SESSION['nom'];
         $ape  = $_SESSION['ape'];
         $correo  = $_SESSION['correo'];
         $celular  = $_SESSION['celular'];
         $genero  = $_SESSION['genero'] ;
         $naci  = $_SESSION['naci'] ;
         $ingreso  = $_SESSION['ingreso'] ;
         $direccion  = $_SESSION['direccion'] ;
         $ciudad  = $_SESSION['ciudad'] ;

    if($genero == "M"){
        $saludo = 'Buenos dias Señor'; 
    }else{
        $saludo = 'Buenos dias Señorita'; 
    }
 require_once('view/vistaAdministrador.php');
?>