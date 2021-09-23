<?php
require_once('model/modeloAdministrador.php');

$modeloAdministrador = new ModeloAdministrador();

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

    switch($_GET['v'] ?? ''){
        case 'usuario':

            $datos = $modeloAdministrador->UsuGen();
            require_once('view/admin/usuario.php');

        break;

        case 'usuariobuscar':
            
            if(isset($_POST['buscar'])){
                $dato = $_POST['dato'];
                if($dato == ''){
                    $dato = $nomusu;
                }
                $datos = $modeloAdministrador->BusUsuGen($dato);
                if($datos){
                    require_once('view/admin/usuario.php');
                }else{
                    echo '<script>alert("Usuario no existente");</script>';
                    header('Location:Administrador.php?v=usuariobuscar');
                }
            }
            require_once('view/admin/usuarioBuscar.php');
            
        break;
        case 'usuariocrear':

            if(isset($_POST['registrar'])){
                $cedula = $_POST['cedula'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $celular = $_POST['celular'];
                $genero = $_POST['genero'];
                $fecha = $_POST['fecha'];
                $dirección = $_POST['dirección'];
                $ciudad = $_POST['ciudad'];

                $datos = $modeloAdministrador->registrarUsGen($cedula, $nombre, $apellido, $correo, $celular, $genero, $fecha, $dirección, $ciudad);
                if($datos > 0){
                    echo'<script>alert("El usuario se registro")</script>';
                    header('Location:Administrador.php?v=usuario');
                }else{
                    echo'<script>alert("El usuario no se registro")</script>';
                    header('Location:Administrador.php?v=usuariocrear');
                }
            }
            require_once('view/admin/usuarioCrear.php');
        break;

        case 'usuarioactualizar':
            if(isset($_POST['actualizar'])){
                $id = $_POST['id'];
                $datos = $modeloAdministrador->BusUsuGen($id);
                var_dump($datos) ;
                /* exit; */
                require_once('view/admin/usuarioActualizar.php');
            }else{
                require_once('view/admin/index.php');     
            }
        break;

        default:
            require_once('view/admin/index.php');
        break;
    }

   function eliminarUsuGen(){
       if(isset($_POST['eliminar'])){
           echo "si esta ";
           /* $value = $_POST['id'];
           if($usuario->BusUsu($value)){
               echo "si exite";
            }else{
                echo "no exite";
            } */
            /* $usuario->EliUsuGen($value); */
            
        }
    }
?>