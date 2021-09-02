<?php

require_once('conexion.php');

class ModeloUsuario
{

    public function login($nom, $pass)
    {
        try {
            $sql = "SELECT * FROM tb_usuarios WHERE nomusu = ? and clave = ?;";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $nom);
            $cnn->bindParam(2, $pass);
            $cnn->execute();
            $res = $cnn->fetchALL();
        } catch (Exception $e) {
            echo 'Error en login = ' . $e;
        }
        return $res;
    }


    public function registrar($Cedula, $Nombre, $Apellido, $Correo, $Celular, $genero, $fecha, $Dirección, $Ciudad, $Usuario, $Password)
    {
        try {
            $sql = "SELECT doc FROM tb_usuarios WHERE doc = (?)";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $Cedula);
            $cnn->execute();

            if (!$cnn->fetch()) 
            {
                $sql1 = "CALL registroUsGen (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $cnn = Conexion::conexionbd()->prepare($sql1);
                $cnn->bindParam(1, $Cedula);
                $cnn->bindParam(2, $Nombre);
                $cnn->bindParam(3, $Apellido);
                $cnn->bindParam(4, $Correo);
                $cnn->bindParam(5, $Celular);
                $cnn->bindParam(6, $genero);
                $cnn->bindParam(7, $fecha);
                $cnn->bindParam(8, $Dirección);
                $cnn->bindParam(9, $Ciudad);
                $cnn->execute();

                $sql2 = "CALL registroUsCli (?, ?, ?)";
                $cnn = Conexion::conexionbd()->prepare($sql2);
                $cnn->bindParam(1, $Cedula);
                $cnn->bindParam(2, $Usuario);
                $cnn->bindParam(3, $Password);
                $cnn->execute();
            } else 
            {
               echo '<script>alert("Ya cuentas con un Usuario")</script>';
            }
        } catch (Exception $e) 
        {
            echo 'Error en la registrarse usuarios = ' . $e;
        }
    }
}
