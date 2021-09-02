<?php
require_once('model/modeloAdministrador.php');



$admini=new ModeloAdministrador();

if(isset($_POST['consultaTodos'])){
  $datos=$admini->ConsultaTodos();
}
/* if(isset($_POST['uno'])|| isset($_POST['actualizar'])){
  $crit=$_POST['Criterio'];
  $datos=$admini->Uno($crit);
} */
if(isset($_POST['uno'])){
  $crit=$_POST['Criterio'];
  $datos=$usuario->Uno($crit);
}

if(isset($_POST['enviar'])){
    $doc=$_POST['doc'];
    $nom=$_POST['nom'];
    $ape=$_POST['ape'];
    $cor=$_POST['cor'];
    $cel=$_POST['cel'];
    $sexo=$_POST['sexo'];
    $fenaci=$_POST['fenaci'];
    $fein=$_POST['fein'];
    $dir=$_POST['dir'];
    $ciu=$_POST['ciu'];
    $foto=$_FILES['foto']['name'];
    $tipo=$_FILES['foto']['type'];
    $tam=$_FILES['foto']['size'];
    $existe=$admini->Uno($doc);
  
    if ($existe) {
      echo "<script type='text/javascript'>alert('El administrador ya existe');</script>";
    }else{
      if ($foto != null) {
        if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg") {
          $hoy = date('dmy');
          $foto = $hoy . "-" . $doc . "-" . $foto;
          $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/SDM/img/';
          $resultado = $admini->InsertaAdmin($doc,$nom,$ape, $cor, $cel, $sexo, $fenaci, $fein, $dir, $ciu, $foto);
          
          if ($resultado > 0) {
            move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta . $foto);
            echo "<script type='text/javascript'>alert('El administrador se inserto correctamente');</script>";
          }else{        
            echo "<script type='text/javascript'>alert('Error al insertar');</script>";
          }
        }else{
          echo "<script type='text/javascript'>alert('Formato no permitido');</script>";
          $resultado = $admini->InsertaAdmin($doc,$nom,$ape, $cor, $cel, $sexo, $fenaci, $fein, $dir, $ciu, "default.PNG");
          
          if ($resultado > 0) {        
            echo "<script type='text/javascript'>alert('El administrador se inserto correctamente pero sin foto');</script>";
          }else{
            echo "<script type='text/javascript'>alert('Error al insertar');</script>";
          }
        }
      }else{        
        $resultado = $admini->InsertaAdmin($doc,$nom,$ape, $cor, $cel, $sexo, $fenaci, $fein, $dir, $ciu, "default.PNG");
        
        if ($resultado > 0) {
          echo "<script type='text/javascript'>alert('El administrador se inserto correctamente ');</script>";
        }else{
          echo "<script type='text/javascript'>alert('Error al insertar');</script>";
        }
      }
    }
  }
/* Aqui haces el controlador de CRUD de la tabla */

require_once('view/vistaAdministrador.php');
?>