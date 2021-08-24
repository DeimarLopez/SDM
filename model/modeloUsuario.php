<?php

require_once('conexion.php');

class ModeloUsuario{

    public function login($nom,$pass){
        try{
            $sql = "SELECT * FROM tb_usuarios WHERE nomusu = ? and clave = ?;";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $nom);
            $cnn->bindParam(2, $pass);
            $cnn->execute(); 
            $res=$cnn->fetchALL();
        }catch (Exception $e) {
            echo 'Error en login = ' . $e;
        }
        return $res;
    }

}
    
?>