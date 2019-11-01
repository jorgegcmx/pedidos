<?php
session_start();
include_once 'Usuario.php';
$usu1 = new Usuario();

$email = trim($_POST['email']);
$contrasena = trim($_POST['contrasena']);

$usuario = $usu1->login_user($email, $contrasena);
if ($usuario == true) {
    header("Location: ../admin/view_clientes/");
} else {

    echo '<script type="text/javascript">
			     alert("Lo sentimos :( aun no estas registrado");
				 window.location.href="../registro_clientes.php";
				 </script>';
}
