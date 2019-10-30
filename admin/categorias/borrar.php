<?php

$id = $_GET['id'];

include_once 'Classe.php';
$usu1 = new Classe();

$usu1->del_categorias($id);
header("Location:../views/view_categorias.php");
