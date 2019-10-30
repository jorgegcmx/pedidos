<?php

session_start();

     unset($_SESSION['idusuarios']);
	 
	     $_SESSION = array();
		 
		 session_destroy();
		     
			 echo'<script type="text/javascript">
			     alert("Sesión Cerrada");
				 window.location.href="../login_admin.php";
				 </script>';
?>