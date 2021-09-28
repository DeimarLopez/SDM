<?php
require_once('model/modeloAdministrador.php');

$modeloAdministrador = new ModeloAdministrador();

session_start();
if($_SESSION['login']){
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
$genero  = $_SESSION['genero'];
$naci  = $_SESSION['naci'];
$ingreso  = $_SESSION['ingreso'];
$direccion  = $_SESSION['direccion'];
$ciudad  = $_SESSION['ciudad'];

if ($genero == "M") {
    $saludo = 'Buenos dias Señor';
} else {
    $saludo = 'Buenos dias Señorita';
}

switch ($_GET['v'] ?? '') {
    /*cliente */
    case 'cliente':

        if (isset($_POST['eliminar'])) {
            $value = $_POST['id'];
            $exits = $modeloAdministrador->BusUsu($value);
            if (count($exits)>0) {
                echo '<script> alert("Elimina Primero El usuario");</script>';
            } else {
                $modeloAdministrador->EliUsuGen($value);
            }
                
        }

        $datos = $modeloAdministrador->UsuGen();
        require_once('view/admin/cliente.php');

        break;

    case 'clientebuscar':

        if (isset($_POST['buscar'])) {


            $dato = $_POST['dato'];
            if ($dato == '') {
                $dato = $nomusu;
            }
            $datos = $modeloAdministrador->BusUsuGen($dato);
            if ($datos) {
                require_once('view/admin/cliente.php');
                exit;
            } else {
                echo '<script>alert("cliente no existente");</script>';
                header('Location:Administrador.php?v=clientebuscar');
            }
        }

        require_once('view/admin/clienteBuscar.php');

        break;
    case 'clientecrear':

        if (isset($_POST['registrar'])) {
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
            if ($datos > 0) {
                echo '<script>alert("El cliente se registro")</script>';
                header('Location:Administrador.php?v=cliente');
            } else {
                echo '<script>alert("El cliente no se registro")</script>';
                header('Location:Administrador.php?v=clientecrear');
            }
        }
        require_once('view/admin/clienteCrear.php');
        break;

    case 'clienteactualizar':
        if (isset($_POST['actualizarUs'])) {

            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $celular = $_POST['celular'];
            $genero = $_POST['genero'];
            $fecha = $_POST['fecha'];
            $dirección = $_POST['dirección'];
            $ciudad = $_POST['ciudad'];

            $datos = $modeloAdministrador->actualizarUsGen($cedula, $nombre, $apellido, $correo, $celular, $genero, $fecha, $dirección, $ciudad);

            if ($datos > 0) {
                echo '<script>alert("El cliente se actualizo")</script>';
                header('Location:Administrador.php?v=cliente');
            } else {
                echo '<script>alert("El cliente no se actualizo")</script>';
                header('Location:Administrador.php?v=cliente');
            }
        }
        if (isset($_POST['actualizar'])) {
            $id = $_POST['id'];
            $datos = $modeloAdministrador->BusUsuGen($id);
        }
        require_once('view/admin/clienteActualizar.php');
        break;

    /*producto */
    case 'producto':

        if (isset($_POST['eliminar'])) {
            $value = $_POST['id'];
            $modeloAdministrador->EliPro($value);     
        }

        $datos = $modeloAdministrador->proGen();
        require_once('view/admin/productos/producto.php');
    break;
    case 'productobuscar':

        if (isset($_POST['buscar'])) {

            $dato = $_POST['dato'];
            if ($dato == '') {
                $dato = $nomPro;
            }
            $datos = $modeloAdministrador->BusPro($dato);
            if ($datos) {
                require_once('view/admin/productos/producto.php');
                exit;
            } else {
                echo '<script>alert("cliente no existente");</script>';
                header('Location:Administrador.php?v=productobuscar');
            }
        }
        require_once('view/admin/productos/productoBuscar.php');
    break;
    case 'productocrear':

        if(isset($_POST['registrar'])){
            $nombre = $_POST['nombre'];
            $description = $_POST['description'];
            $tamaño = $_POST['tamaño'];
            $imagen = $_FILES;
            $datos = $modeloAdministrador->incertarProducto($nombre, $description, $tamaño, $imagen);
            if ($datos > 0) {
                header('Location:Administrador.php?v=producto');
            } else {
                header('Location:Administrador.php?v=productocrear');
            }
        }
        require_once('view/admin/productos/productoCrear.php');

    break;

    /*usuario */
    case 'usuario':

        if (isset($_POST['eliminar'])) {
            $value = $_POST['id'];
            $exits = $modeloAdministrador->BusUsu($value);
            if (count($exits)>0) {
                echo '<script> alert("Elimina Primero El usuario");</script>';
            } else {
                $modeloAdministrador->EliUsu($value);
            }
                
        }

        $datos = $modeloAdministrador->Usuario();
        require_once('view/admin/usuario.php');

        break;

    case 'usuariobuscar':

        if (isset($_POST['buscar'])) {

            $dato = $_POST['dato'];
            if ($dato == '') {
                $dato = $nomusu;
            }
            $datos = $modeloAdministrador->BusUsu($dato);
            if ($datos) {
                require_once('view/admin/usuario.php');
            } else {
                echo '<script>alert("usuario no existente");</script>';
                header('Location:Administrador.php?v=usuariobuscar');
            }
        }
        require_once('view/admin/usuarioBuscar.php');

        break;
    case 'usuariocrear':

        if (isset($_POST['registrar'])) {
            $doc = $_POST['doc'];
            $nomusu = $_POST['nomusu'];
            $clave = $_POST['clave'];
            $rol = $_POST['rol'];
            $estado = $_POST['estado'];
            $imagen = $_FILES;

            $datos = $modeloAdministrador->registrarUsu($doc, $nomusu, $clave, $rol, $estado, $imagen);
            if ($datos > 0) {
                echo '<script>alert("El usuario se registro")</script>';
                header('Location:Administrador.php?v=usuario');
            } else {
                echo '<script>alert("El usuario no se registro")</script>';
                header('Location:Administrador.php?v=usuariocrear');
            }
        }
        require_once('view/admin/usuarioCrear.php');
        
    break;
    case 'productoactualizar':

        if(isset($_POST['actualizarPro'])){
            $id = $_POST['idProd'];
            $nombre = $_POST['nombre'];
            $description = $_POST['description'];
            $tamaño = $_POST['tamaño'];
            $imagen = $_FILES;
            $datos = $modeloAdministrador->actualizarProducto($nombre, $description, $tamaño, $imagen,$id);
            if ($datos > 0) {
                header('Location:Administrador.php?v=producto');
            } else {
                header('Location:Administrador.php?v=productoactualizar');
            }
        }

        if (isset($_POST['actualizar'])) {
            $id = $_POST['id'];
            $datos = $modeloAdministrador->BusProId($id);
        } }
        require_once('view/admin/productos/productoActualizar.php');

    break;
    case 'usuarioactualizar':
        if (isset($_POST['actualizarUsu'])) {
            $doc = $_POST['doc'];
            $nomusu = $_POST['nomusu'];
            $clave = $_POST['clave'];
            $rol = $_POST['rol'];
            $estado = $_POST['estado'];
            $imagen = $_POST['imagen'];

            $datos = $modeloAdministrador->actualizarUsu($doc, $nomusu, $clave, $rol, $estado, $imagen);

            if ($datos > 0) {
                echo '<script>alert("El usuario se actualizo")</script>';
                header('Location:Administrador.php?v=usuario');
            } else {
                echo '<script>alert("El usuario no se actualizo")</script>';
                header('Location:Administrador.php?v=usuario');
            }
        }
        if (isset($_POST['actualizarUSU'])) {
            $id = $_POST['id'];
            $datos = $modeloAdministrador->BusUsu($id);
        }
        require_once('view/admin/usuarioActualizar.php');
    break;

    default:
        require_once('view/admin/index.php');
    break;
}
}else{
    header('Location:index.php');
}