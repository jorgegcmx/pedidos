<?php 
include_once 'Classe.php';
$usu1 = new Classes();

if ($_FILES['logo']['size'] > 1000000) {
                echo '<script type="text/javascript">
                 alert("Error! la Imagen no puede se mayor a 1MB");
                 window.location.href="../views/";
                 </script>';
            } else {
             
                $nombre_img = $_FILES['logo']['name'];
                $tipo = $_FILES['logo']['type'];
                $tamanio = $_FILES['logo']['size'];
                $ruta = $_FILES['logo']['tmp_name'];
                
                $id = $_POST['idusuarios'];               

                $destino = "../administrators/logos/" . $idusuarios . '' . $cadenaf = str_replace(' ', '', $nombre_img);

                if ($nombre_img != "") {
                    if (copy($ruta, $destino)) {

                        $usu1->set_logo($id, $destino);
                        $sql = $usu1->add_logo();

                        header("Location:../views/");                     

                    } else {

                    }
                }
            }

?>