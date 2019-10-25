<?php

$id = $_GET['id'];
$img = $_GET['img'];

if (is_file($img)) {
    chmod($img, 0777);
    if (!unlink($img)) {
        echo false;
    }

}
include_once 'Classe.php';
$usu1 = new Classe();

$usu1->del_articulo($id);
header("Location:../views/");
