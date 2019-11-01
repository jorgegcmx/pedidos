<?php 
include_once 'Classe.php';
$usu1 = new Classes();

$id = $_POST['idusuarios'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

if ($contrasena == $contrasena2) {

    $usu1->set_contrasena($id, $contrasena);
    $sql = $usu1->add_contrasena();

    header("Location:../views/"); 

}else{
    echo '<script type="text/javascript">
    alert(" Error! las contraseñas no conciden");
    window.location.href="../views/";
    </script>';

}
                                           

                 
?>