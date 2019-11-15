<?php
include_once 'Classe.php';
$usu1 = new Classe();

if (isset($_POST['id'])) {
    $idcambios = $_POST['id'];
} else {
    $idcambios = null;
}


$cantidad_original =$_POST['cantidad_original'];
$cantidad =$_POST['cantidad'];

if($cantidad_original<$cantidad){
    echo '<script type="text/javascript">
    alert("Error la acntidad no puede ser superior a la del pedido");
    window.location.href="../view_clientes/view_pedidos_completados.php";
    </script>';
}else{
    $pedido_id =$_POST['pedido_id'];
    $articulo_id =$_POST['articulo_id'];
    $iddetalle =$_POST['iddetalle'];
    $unicost =$_POST['unicost'];
    $cambio_subtotal =$cantidad*$unicost;
    $status =0;
    
    $usu1->set_cambio($idcambios, $pedido_id, $articulo_id, $iddetalle, $cantidad, $unicost, $cambio_subtotal, $status);
    $sql = $usu1->add_cambio();
    
    header("Location:../view_clientes/view_cambios.php");
}


