<?php
/* require_once('model/modeloEmpleado.php'); */

session_start();
$doc  = $_SESSION['doc'];

require_once('view/vistaUsuario.php');
?>