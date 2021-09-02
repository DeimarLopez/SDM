<?php

require_once('conexion.php');

class ModeloAdministrador{
    public function ConsultaTodos(){

        try{
            $sql="select * from tb_usersgeneri;";
            $conecta=Conexion::conexionbd()->prepare($sql);
            $conecta->execute();
            while($fila=$conecta->fetch()){
                $admin[]=$fila;
            }
        }catch(Exception $e){
            echo "Error en la consulta: ".$e;
        }
        return $admin;
    }

    public function Uno($criterio){
        $admin=null;
        try{
            $sql_uno="select * from tb_usersgeneri where doc=? or nom=?;";
            $ad=Conexion::conexionbd()->prepare($sql_uno);
            $ad->bindParam(1, $criterio);
            $ad->bindParam(2, $criterio);
            $ad->execute();
            while($f=$ad->fetch()){
                $admin[]=$f;
            }
        }catch(Exception $e){
            echo "Error en la consulta: ".$e;
        }
        return $admin;
    }    

    public function InsertaAdmin($doc,$nom,$ape,$cor,$cel,$sexo,$fenaci,$fein,$dir,$ciu,$foto){
        $res=0;
        try{
            $sql_ins="insert into tb_usersgeneri value(?,?,?,?,?,?,?,?,?,?,?)";
            $ps=Conexion::conexionbd()->prepare($sql_ins);
            $ps->bindParam(1,$doc);
            $ps->bindParam(2,$nom);
            $ps->bindParam(3,$ape);
            $ps->bindParam(4,$cor);
            $ps->bindParam(5,$cel);
            $ps->bindParam(6,$sexo);
            $ps->bindParam(7,$fenaci);
            $ps->bindParam(8,$fein);
            $ps->bindParam(9,$dir);
            $ps->bindParam(10,$ciu);
            $ps->bindParam(11,$foto);
            if($ps->execute())
            $res=1;
            else
            $res=0;
        }catch(Exception $e){
            echo"Error al insertar ";
        }
        return $res;
    }
}
?>