<?php
if(isset($_GET['c'])){
    require_once('controller/controladorAdministrador' . $_GET['c'] . '.php');
}else{
    require_once('controller/controladorAdministrador.php');
}
?>