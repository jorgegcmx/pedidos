<?php

session_start();

     unset($_SESSION['idclientes']);
	 
	     $_SESSION = array();
		 
		 session_destroy();
		     
			 echo'<script type="text/javascript">
			     alert("Sesión Cerrada");
				 window.location.href="../login_clientes.php";
				 </script>';
?>