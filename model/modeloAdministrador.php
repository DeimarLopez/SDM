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

}
    
?>