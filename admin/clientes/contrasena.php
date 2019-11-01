<?php
include_once 'Classe.php';
$usu1 = new Classe();

$id = $_POST['idclientes'];
$contrasena = trim($_POST['contrasena']);
$contrasena2 = trim($_POST['contrasena2']);

if ($contrasena == $contrasena2) {

    $usu1->set_contrasena($id, $contrasena);
    $sql = $usu1->add_contrasena();

    echo '<script type="text/javascript">
    alert(" Contraseña Actualizada con Exito!");
    window.location.href="../view_clientes/";
    </script>';

} else {
    echo '<script type="text/javascript">
    alert(" Error! las contraseñas no conciden");
    window.location.href="../view_clientes/";
    </script>';

}
