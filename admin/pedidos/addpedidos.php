<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();
include_once '../articulos/Product.php';
$p = new Product();

session_start();

$id = null;
$fecha = date('Y-m-d');
$total = $_SESSION["total"];
$idcliente = $_POST["idcliente"];
$status = 'PDP';

//echo $total;

$usu1->set_pedidos($id, $fecha, $total, $idcliente, $status);
$sql = $usu1->add_pedidos();

include_once 'Classpedidos.php';
$id = new Classpedidos();
$dato = $id->get_pedido();

while ($data = $dato->fetchObject()) {

    $ultimo = $data->id;

}
$ultimo;

$carrito = $_SESSION["carrito"];
$lista = $carrito;

include_once 'Classpedidos.php';
$save = new Classpedidos();

foreach ($carrito as $p) {

    $save->set_detalle_pedidos(null, $p->idproductos, $p->cantidad, $p->subtotal, $p->precio, $ultimo);
    $sql = $save->add_detalle_pedidos();

}

unset($_SESSION['carrito']);
$_SESSION = array();
session_destroy();
echo '<script type="text/javascript">
			     alert("Guardado Correctamente");
				 window.location.href="../view_clientes/";
				 </script>';
