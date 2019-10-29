<?php
session_start();
include_once 'Usuario.php';
$usu1 = new Usuario();

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$usuario = $usu1->login_user($email, $contrasena);
if ($usuario == true) {
    header("Location: ../admin/views/");
} else {

    echo '<script type="text/javascript">
			     alert("Lo sentimos :( aun no estas registrado");
				 window.location.href="../login_admin.php";
				 </script>';
}
