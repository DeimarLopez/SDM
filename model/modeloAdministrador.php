<?php

require_once('conexion.php');

class ModeloAdministrador
{
    /*cliente conexion */
    public function UsuGen()
    {
        try {
            $sql = 'SELECT * FROM tb_usersgeneri;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta usuariogenerico = ' . $e;
        }
        return $datos;
    }

    public function BusUsuGen($value)
    {
        try {
            $sql = 'SELECT * FROM tb_usersgeneri WHERE doc=? or nom=?';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->bindParam(2, $value);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta empleado = ' . $e;
        }
        return $datos;
    }

    public function BusUsu($value)
    {
        $datos = [];
        try {
            $sql = 'SELECT * FROM tb_usuarios WHERE doc=? or nomusu=?';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->bindParam(2, $value);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta empleado = ' . $e;
        }
        return $datos;
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

            if (!$cnn->fetch()) {
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
                if ($cnn->execute()) {
                    $res = 1;
                } else {
                    $res = 0;
                }
                return $res;
            } else {
                echo '<script>alert("Ya cuenta con un Usuario")</script>';
            }
        } catch (Exception $e) {
            echo 'Error en registrar usuarios = ' . $e;
        }
    }

    public function actualizarUsGen($Cedula, $Nombre, $Apellido, $Correo, $Celular, $genero, $fecha, $Dirección, $Ciudad)
    {
        try {
            $sql1 = "UPDATE tb_usersgeneri SET nom = ?, ape = ?, correo = ?, celular = ?, sexo = ?, fechanaci = ?, direc = ?, ciudad = ? WHERE (doc = ?);";
            $cnn = Conexion::conexionbd()->prepare($sql1);
            $cnn->bindParam(1, $Nombre);
            $cnn->bindParam(2, $Apellido);
            $cnn->bindParam(3, $Correo);
            $cnn->bindParam(4, $Celular);
            $cnn->bindParam(5, $genero);
            $cnn->bindParam(6, $fecha);
            $cnn->bindParam(7, $Dirección);
            $cnn->bindParam(8, $Ciudad);
            $cnn->bindParam(9, $Cedula);
            if ($cnn->execute()) {
                $res = 1;
            } else {
                $res = 0;
            }
        } catch (Exception $e) {
            echo 'Error en registrar usuarios = ' . $e;
        }
        return $res;
    }

    /*productos conexion */
    public function proGen()
    {
        try {
            $sql = 'SELECT * FROM tb_productos;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta producto = ' . $e;
        }
        return $datos;
    }

    public function BusPro($value)
    {
        $datos = [];
        try {
            $value = '%'.$value.'%';
            $sql = 'SELECT * FROM sdm.tb_productos WHERE nomProd like  ? or desProd like ?;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->bindParam(2, $value);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta producto = ' . $e;
        }
        return $datos;
    }

    public function BusProId($value)
    {
        $datos = [];
        try {
            $sql = 'SELECT * FROM sdm.tb_productos WHERE idProd = ?;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta producto = ' . $e;
        }
        return $datos;
    }

    public function incertarProducto($nombre,$description,$tamaño,$imagen)
    {
        $res = 0;
        try{
            $sql = "INSERT INTO tb_productos (tamaPro, imgProd, nomProd, desProd) VALUES (?, ?, ?, ?);";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $tamaño);

            $array = explode(".",$imagen['imagen']['name']);
            $termination = ".".$array[1];

            $ruta = 'view/img/' . $nombre . rand() . $termination;
            move_uploaded_file($imagen['imagen']['tmp_name'] , $ruta);

            $cnn->bindParam(2, $ruta);
            $cnn->bindParam(3, $nombre);
            $cnn->bindParam(4, $description);
            if ($cnn->execute()) {
                $res = 1;
            } else {
                $res = 0;
            }
        }catch(Exception $e){
            echo 'Error en insertar producto = ' . $e;
        }
        return $res;
    }

    /*usuario conexion */
    public function Usuario()
    {
        try {
            $sql = 'SELECT * FROM tb_usuarios;';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->execute();
            while ($fila = $cnn->fetch()) {
                $datos[] = $fila;
            }
        } catch (Exception $e) {
            echo 'Error en la consulta usuario = ' . $e;
        }
        return $datos;
    }

    public function insertarUsu($doc, $nomusu, $clave, $rol, $estado, $imagen)
    {
        $res = 0;
        try{
            $sql = "INSERT INTO tb_usuarios (doc, nomusu, clave, rol, estado,imagen) VALUES (?, ?, ?, ?, ?, ?);";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $doc);
            $cnn->bindParam(2, $nomusu);
            $cnn->bindParam(3, $clave);
            $cnn->bindParam(4, $rol);
            $cnn->bindParam(5, $estado);
    public function actualizarProducto($nombre,$description,$tamaño,$imagen,$id)
    {
        $res = 0;
        try{
            $sql = "UPDATE tb_productos SET tamaPro = ?, imgProd = ?, nomProd = ?, desProd = ? WHERE (idProd = ?);";
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $tamaño);

            $array = explode(".",$imagen['imagen']['name']);
            $termination = ".".$array[1];

            $ruta = 'view/img/' . $nombre . rand() . $termination;
            move_uploaded_file($imagen['imagen']['tmp_name'] , $ruta);

            $cnn->bindParam(6, $ruta);
            

            $producto = new ModeloAdministrador();

            $values=$producto->BusProId($id);

            if($imagen['imagen']['name'] == null){
                $ruta = $values[0][2];
            }else{
                $ruta = $values[0][2];
                unlink($ruta);
                $ruta = 'view/img/' . $nombre . rand() . $termination;
            }

            move_uploaded_file($imagen['imagen']['tmp_name'] , $ruta);

            $cnn->bindParam(2, $ruta);
            $cnn->bindParam(3, $nombre);
            $cnn->bindParam(4, $description);
            $cnn->bindParam(5, $id);
            if ($cnn->execute()) {
                $res = 1;
            } else {
                $res = 0;
            }
        }catch(Exception $e){
            echo 'Error en insertar producto = ' . $e;
        }
        return $res;
    }

    public function EliUsu($value)
    {
        try {
            $sql = 'DELETE FROM tb_usuarios WHERE doc=?';
    public function EliPro($value)
    {
        try {
            $sql = 'DELETE FROM tb_productos  WHERE idProd=?';
            $cnn = Conexion::conexionbd()->prepare($sql);
            $cnn->bindParam(1, $value);
            $cnn->execute();
        } catch (Exception $e) {
            echo 'Error en la consulta = ' . $e;
        }
    }

    public function actualizarUsu($doc, $nomusu, $clave, $rol, $estado, $imagen)
    {
        try {
            $sql1 = "UPDATE tb_usuarios SET nomusu = ?, clave = ?, rol = ?, estado = ?, imagen = ? WHERE (doc = ?);";
            $cnn = Conexion::conexionbd()->prepare($sql1);
            $cnn->bindParam(1, $nomusu);
            $cnn->bindParam(2, $clave);
            $cnn->bindParam(3, $rol);
            $cnn->bindParam(4, $estado);
            $cnn->bindParam(5, $imagen);
            $cnn->bindParam(6, $doc);
            if ($cnn->execute()) {
                $res = 1;
            } else {
                $res = 0;
            }
        } catch (Exception $e) {
            echo 'Error en registrar usuarios = ' . $e;
        }
        return $res;
    }
            echo 'Error en la consulta producto = ' . $e;
        }
    }
}
