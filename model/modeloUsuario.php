<?php

require_once('conexion.php');

class ModeloUsuario
{

    public function login($nom, $pass)
    {
        try {
            $sql = "SELECT * FROM tb_usuarios inner join tb_usersgeneri using(doc) WHERE nomusu = ?;";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $nom);
            $cnn->execute();
            $res = $cnn->fetchALL();            
        } catch (Exception $e) {
            echo 'Error en login = ' . $e;
        }
        if(password_verify($pass,$res[0][2])){
            return $res;
        } 
    }


    public function registrarUsu($doc, $nomusu, $clave, $rol, $estado, $imagen, $Usuario, $Password)
    {
        try {
            $sql = "SELECT doc FROM tb_usuarios WHERE doc = (?)";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $doc);
            $cnn->execute();

            if (!$cnn->fetch()) 
            {
                $sql1 = "CALL registroUsu (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $cnn = Conexion::conexionbd()->prepare($sql1);
                $cnn->bindParam(1, $doc);
                $cnn->bindParam(2, $nomusu);
                $cnn->bindParam(3, $clave);
                $cnn->bindParam(4, $rol);
                $cnn->bindParam(5, $estado);
                $cnn->bindParam(6, $imagen);
                $cnn->execute();

                $sql2 = "CALL registroUsCli (?, ?, ?)";
                $cnn = Conexion::conexionbd()->prepare($sql2);
                $cnn->bindParam(1, $doc);
                $cnn->bindParam(2, $Usuario);
                $cnn->bindParam(3, $Password);
                $cnn->execute();
            } else 
            {
               echo '<script>alert("Ya cuentas con un Usuario")</script>';
            }
        } catch (Exception $e) 
        {
            echo 'Error en  registrar usuarios = ' . $e;
        }
    }
}
