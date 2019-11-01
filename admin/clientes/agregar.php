<?php
include_once 'Classe.php';
$usu1 = new Classe();
$usu2 = new Classe();
$id = null;
$email_cliente = $_POST['email_cliente'];
$contrasena_cliente = $_POST['contrasena_cliente'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$rfc = $_POST['rfc'];
$razon_social = $_POST['razon_social'];
$idusuarios_admin = $_POST['idusuarios_admin'];

$com = $usu2->comprobar($email_cliente);

if ($com == true) {

    header("Location:../../login_clientes.php?ok=2");

} else {

    if ($contrasena == $contrasena2) {

        $usu1->set_clientes($id, $email_cliente, $contrasena_cliente, $telefono, $direccion, $pais, $estado, $municipio, $rfc, $razon_social, $idusuarios_admin);
        $sql = $usu1->add_clientes();
        header("Location:../../login_clientes.php?ok=1");

    } else {
        echo '<script type="text/javascript">
        alert(" Error! las contraseñas no conciden");
        window.location.href="../../login_clientes.php.php";
        </script>';

    }

}
