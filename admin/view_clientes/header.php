<?php
session_start();
if(!isset($_SESSION['idclientes'])){
  header("Location:../../");
}
 
 

if($_SESSION['idusuarios_admin']==2 && $_SESSION['idclientes']==1){
  $idusuario=2;
  $idasociado=1;
  $comision=0;
  
}elseif($_SESSION['idusuarios_admin']==2){
   $idusuario=2;
   $idasociado=1;
   $comision=0.15;
}else{
 $idusuario=$_SESSION['idusuarios_admin'];
 $comision=0;
}
$idclientes=$_SESSION['idclientes']; 
$email=$_SESSION['email_cliente'];
$contacto=$_SESSION['telefono_admin'];



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Catalogo</title>   
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css"> 
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        a {
            color: white;
        }
        .fondo {
            background-color: #eee;
        }
    </style>
</head>
<body>
<div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Perfil de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                     
                      <?php 
                          include_once '../clientes/Class_profile.php';	
                          $clientes = new Class_profile();                                         
                          $cli = $clientes->get_clientes_perfil($idclientes);                             
                           while($ad = $cli->fetchObject()){   
                     ?>                      
                    
                       <ul class="list-group">
                       <li class="list-group-item"><b>Nombre: </b> <?php echo $ad->razon_social; ?></li>
                       <li class="list-group-item"><b>email: </b> <?php echo $ad->email_cliente; ?></li>
                       <li class="list-group-item"><b>Pais: </b><?php echo $ad->pais; ?></li>
                       <li class="list-group-item"><b>Estado: </b><?php echo $ad->estado; ?></li>
                       <li class="list-group-item"><b>Municipio: </b><?php echo $ad->municipio; ?></li>
                       <li class="list-group-item"><b>Contraseña Actual: </b><?php echo $ad->contrasena_cliente; ?></li>                         
                       </ul>                    
                       <br>
                       <form action="../clientes/informacion.php" method="post"  >  
                       <input type="hidden" name="idclientes" value="<?php echo $idclientes; ?>"> 
                       <label>Telefono</label>
                       <div class="form-group">
                        <input type="text"  name="telefono" value="<?php echo $ad->telefono; ?>" class="form-control form-control-lg fondo"  >
                       </div>
                       <label>Dirección</label>
                       <div class="form-group">
                       <input type="text"  name="direccion" value="<?php echo $ad->direccion; ?>"  class="form-control form-control-lg fondo" >
                      </div>
                      <label>RFC</label>
                       <div class="form-group">
                       <input type="text"  name="rfc" value="<?php echo $ad->rfc; ?>"  class="form-control form-control-lg fondo" >
                      </div>                  
                      <button type="submit"   class="btn btn-gradient-primary mr-2">Actualizar datos de Contacto </button> 
                      </form> 
                       <br>
                       <form action="../clientes/contrasena.php" method="post"  >  
                       <input type="hidden" name="idclientes" value="<?php echo $idclientes; ?>"> 
                       <label>Nueva Contraseña</label>
                       <div class="form-group">
                        <input type="password"  name="contrasena"  class="form-control form-control-lg fondo" required >
                       </div>
                       <label>Repirta la Contraseña</label>
                       <div class="form-group">
                       <input type="password"  name="contrasena2"  class="form-control form-control-lg fondo"  required>
                      </div>
                      <button type="submit"   class="btn btn-gradient-primary mr-2">Actualizar Contraseña </button> 
                      </form>                    
                      <?php } ?>
                    
      </div>   
    </div>
  </div>
</div>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="../../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img
                        src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <?php
                if(isset($_SESSION["tipo"])!=''){
                  echo "<p class='btn btn-danger'><small> Solicitando ".$_SESSION["tipo"]."</small> Importe de $".$_SESSION["importe"]."</p>";                                       
                  }else{
                                        
                 }                  
               ?>
              <ul class="navbar-nav navbar-nav-right">                 
              <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="view_carrito.php" >
                (Carrito) <i class="mdi mdi-cart-outline"></i>
                <span class="count-symbol bg-success"></span>
              </a>             
               </li>
                 
               <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
           
                <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $email;?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#perfil">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Perfil </a>              
                </div>
                </li>

                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="../../login/logout.php" <?php echo $_SESSION['idclientes']; ?>>
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            
        </nav>
        <!-- Modal -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">
                       <span class="menu-title">Catalogo</span>
                       <i class="mdi mdi-apps menu-icon"></i>
                    </a>
                    </li>
                   
                    <li class="nav-item">
                    <a class="nav-link" href="view_pedidos.php">
                       <span class="menu-title">Pedidos</span>
                          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="view_pedidos_completados.php">
                       <span class="menu-title">Completados</span>
                       <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="view_cambios.php">
                       <span class="menu-title">Solicitud de Cambio</span>
                       <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
 
