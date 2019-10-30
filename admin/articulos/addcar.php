<?php
include_once 'Product.php';
$p = new Product();

$p->idproductos = $_POST['txtidproductos'];

$p->img = $_POST['txtimg'];

$p->nombre = $_POST['txtnombre'];

$p->precio = $_POST['txtprecio'];

$p->cantidad = $_POST['txtcantidad'];

$p->subtotal = $p->precio * $p->cantidad;

session_start();

if (isset($_SESSION["carrito"])) {
    $carrito = $_SESSION["carrito"];
} else {
    $carrito = array();
}
array_push($carrito, $p);
$_SESSION["carrito"] = $carrito;

               echo '<script type="text/javascript">
			    
				 window.location.href="../view_clientes/view_carrito.php";
				 </script>';
