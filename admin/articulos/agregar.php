<?php
include_once 'Classe.php';
$usu1 = new Classe();

if (isset($_POST['id'])) {

    if (isset($_POST['editar'])) {

        if ($_FILES['img']['name'] != '') {

            if ($_FILES['img']['size'] > 1000000) {
                echo '<script type="text/javascript">
                 alert("Error! la Imagen no puede se mayor a 1MB");
                 window.location.href="../views/";
                 </script>';
            } else {

                $nombre_img = $_FILES['img']['name'];
                $tipo = $_FILES['img']['type'];
                $tamanio = $_FILES['img']['size'];
                $ruta = $_FILES['img']['tmp_name'];

                $imganterior = $_POST['imganterior'];
                $id = $_POST['id'];
                $codigo = $_POST['codigo'];
                $nombre = $_POST['nombre'];
                $precio_mayoreo = $_POST['precio_mayoreo'];
                $precio_menudeo = $_POST['precio_menudeo'];
                $idcategoria = $_POST['idcategoria'];
                $descripcion = $_POST['descripcion'];
                $idusuarios = $_POST['idusuarios'];

                $destino = "imagenes/" . $idusuarios . 'chuan01' . $cadenaf = str_replace(' ', '', $nombre_img);

                if ($nombre_img != "") {
                    if (copy($ruta, $destino)) {

                        $usu1->set_articulo($id, $codigo, $nombre, $precio_mayoreo, $precio_menudeo, $idcategoria, $destino, $descripcion, $idusuarios);
                        $sql = $usu1->add_articulo();

                        /*ELIMINAMOS LA IMAGEN ANTERIOR PARA LIBERAR ESPACIO */
                        if (is_file($imganterior)) {
                            chmod($imganterior, 0777);
                            if (!unlink($imganterior)) {
                                echo false;
                            }

                        }

                        header("Location:../views/");
                        //echo "<script> window.history.go(-1);</script>";

                    } else {

                    }
                }
            }
        } else {

            $id = $_POST['id'];
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $precio_mayoreo = $_POST['precio_mayoreo'];
            $precio_menudeo = $_POST['precio_menudeo'];
            $idcategoria = $_POST['idcategoria'];
            $imganterior = $_POST['imganterior'];
            $descripcion = $_POST['descripcion'];
            $idusuarios = $_POST['idusuarios'];

            $usu1->set_articulo($id, $codigo, $nombre, $precio_mayoreo, $precio_menudeo, $idcategoria, $imganterior, $descripcion, $idusuarios);
            $sql = $usu1->add_articulo();
            header("Location:../views/");
        }
    }
/**************************************************************/

} else {

    $id = null;
    if (isset($_POST['guardar'])) {

        if ($_FILES['img']['size'] > 1000000) {
            echo '<script type="text/javascript">
                     alert("Error! la Imagen no puede se mayor a 1MB");
                     window.location.href="../views/";
                     </script>';
        } else {

            $nombre_img = $_FILES['img']['name'];
            $tipo = $_FILES['img']['type'];
            $tamanio = $_FILES['img']['size'];
            $ruta = $_FILES['img']['tmp_name'];

           /* $original = imagecreatefromjpeg($ruta);
            $alto = imagesx($original);
            $ancho = imagesy($original);

            $copiar = imagecreatetruecolor(800, 600);

            imagecopyresampled($copiar, $original, 0, 0, 0, 0, 800, 600, $ancho, $alto);
            imagejpeg($copiar,"imagenes/".$nombre_img,100);*/

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio_mayoreo = $_POST['precio_mayoreo'];
        $precio_menudeo = $_POST['precio_menudeo'];
        $idcategoria = $_POST['idcategoria'];
        $descripcion = $_POST['descripcion'];
        $idusuarios = $_POST['idusuarios'];

        $destino = "imagenes/" . $idusuarios . 'chuan01' . $cadenaf = str_replace(' ', '', $nombre_img);

        if ($nombre_img != "") {
        if (copy($ruta, $destino)) {

        $usu1->set_articulo($id, $codigo, $nombre, $precio_mayoreo, $precio_menudeo, $idcategoria, $destino, $descripcion, $idusuarios);
        $sql = $usu1->add_articulo();
        header("Location:../views/");

        } else {

        }
        }
        }
    }

}
