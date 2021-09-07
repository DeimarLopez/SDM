<?php

require_once('conexion.php');

class ModeloAdministrador{
    public function UsuGen()
    {
        try {
            $sql = 'SELECT * FROM tb_usersgeneri;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->execute();
            $datos=$cnn->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error en la consulta empleado = ' . $e;
        }
        echo json_encode($datos);
    }

    public function BusUsuGen($value)
    {
        try {
            $sql = 'SELECT * FROM tb_usersgeneri WHERE doc=? or nom=?';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->bindParam(2, $value);
            $cnn->execute();
            $datos=$cnn->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error en la consulta empleado = ' . $e;
        }
        echo json_encode($datos);
    }

    public function EliUsuGen($value)
    {
        try {
            $sql = 'DELETE FROM tb_usersgeneri WHERE doc=?';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->execute();
        } catch (Exception $e) {
            echo 'Error en la consulta empleado = ' . $e;
        }
    }
    public function registrarUsGen($Cedula, $Nombre, $Apellido, $Correo, $Celular, $genero, $fecha, $Dirección, $Ciudad)
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
            } else 
            {
               echo '<script>alert("Ya cuenta con un Usuario")</script>';
            }
        } catch (Exception $e) 
        {
            echo 'Error en la registrarse usuarios = ' . $e;
        }
    }


}