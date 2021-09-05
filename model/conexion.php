<?php

class Conexion{

    public static function conexionbd(){

        $_URL='mysql:host=localhost;dbname=sdm';
        $_USER = 'root';
        $_PASSWORD = 'NANCY';

        try{
            $con= new PDO($_URL,$_USER,$_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            die("ERROR EN CONEXION =".$e->getMessage());
            echo "Linea de Error ".$e->getLine();
        }
        return $con;
    } 


}
?>