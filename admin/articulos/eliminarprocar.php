<?php
$index = $_GET['id'];
session_start();

if (isset($_SESSION["carrito"])) {
    $carrito = $_SESSION["carrito"];
    unset($carrito[$index]);
    $carrito = array_values($carrito);
    $_SESSION["carrito"] = $carrito;

    if (count($carrito) == 0) {
        session_unset($carrito);
    }
}
header("location:../view_clientes/");
