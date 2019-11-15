<?php
session_start();
$_SESSION["idpedido"]=$_POST['idpedido'];
$_SESSION["importe"]=$_POST['importe'];
$_SESSION["tipo"]='Cambio de Articulos';

echo '<script type="text/javascript">
			     alert("Selecione los nuevos articulos");
				 window.location.href="../view_clientes/";
				 </script>';
?>