<?php
include_once 'Classe.php';
$usu1 = new Classe();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = null;
}

 $nombre = $_POST['nombre'];
 $idusuarios = $_POST['idusuarios'];

$usu1->set_categorias($id, $nombre, $idusuarios);
$sql = $usu1->add_categorias();

header("Location:../views/view_categorias.php");
