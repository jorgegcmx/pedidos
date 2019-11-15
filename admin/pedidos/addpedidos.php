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

if (isset($_POST["cambio"])) {
    $status = 'CM';
} else {
    $status = 'PDP';
}

$usu1->set_pedidos($id, $fecha, $total, $idcliente, $status);
$sql = $usu1->add_pedidos();

include_once 'Classpedidos.php';
$id = new Classpedidos();
$dato = $id->get_pedido($idcliente);

while ($data = $dato->fetchObject()) {

    $ultimo = $data->id;

}
$ultimo;

if (isset($_POST["cambio"])) {

    include_once 'Classpedidos.php';
    $cam = new Classpedidos();
    echo $idpedidos = $_POST["idpedidos"];
    echo $status_cambio = 2;
    echo $id_nuevo_pedido = $ultimo;
    $cam->set_pedidos_update_status_cambio($idpedidos, $id_nuevo_pedido, $status_cambio);
    $sql = $cam->add_pedidos_update_cambio();

}

$carrito = $_SESSION["carrito"];
$lista = $carrito;

include_once 'Classpedidos.php';
$save = new Classpedidos();

foreach ($carrito as $p) {
    $save->set_detalle_pedidos(null, $p->idproductos, $p->cantidad, $p->subtotal, $p->precio, $ultimo, $p->comentario);
    $sql = $save->add_detalle_pedidos();
}

unset($_SESSION['carrito']);
unset($_SESSION['idpedido']);
unset($_SESSION['importe']);
unset($_SESSION['tipo']);

echo '<script type="text/javascript">
			     alert("Guardado Correctamente");
				 window.location.href="../view_clientes/view_pedidos.php";
	 </script>';
