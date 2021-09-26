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
                header('Location:Administrador.php?v=clientebuscar');
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
    default:
        require_once('view/admin/index.php');
        break;
}

