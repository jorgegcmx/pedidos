<?php
include_once 'Classe.php';
$usu1 = new Classes();
$usu2 = new Classes();

$id = null;
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];
$telefono=$_POST['telefono'];
$com = $usu2->comprobar($email);

if ($com == true) {

    header("Location:../../login_admin.php?ok=2");

}else{

    if ($contrasena == $contrasena2) {

        $usu1->set_usuarios($id, $email, $contrasena, date('Y-m-d'), 1,'../../assets/images/default-logo.png',$telefono);
        $sql = $usu1->add_usuarios();
        header("Location:../../login_admin.php?ok=1");
    }else{
        echo '<script type="text/javascript">
        alert(" Error! las contraseñas no conciden");
        window.location.href="../../index.php";
        </script>';
    
    }

}



