<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();

$idpedidos = $_POST["idpedidos"];
$status = $_POST["status"];
$usu1->set_pedidos_update_status($idpedidos, $status);
$sql = $usu1->add_pedidos_update_status();
header("Location:../views/view_pedidos.php");