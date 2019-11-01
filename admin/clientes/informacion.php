<?php
include_once 'Classe.php';
$usu1 = new Classe();

$id = $_POST['idclientes'];
$telefono = trim($_POST['telefono']);
$direccion = trim($_POST['direccion']);
$rfc = trim($_POST['rfc']);

$usu1->set_informacion_contacto($id, $telefono, $direccion, $rfc);
$sql = $usu1->add_informacion_contacto();

echo '<script type="text/javascript">
    alert(" Contraseña Actualizada con Exito!");
    window.location.href="../view_clientes/";
    </script>';
