<?php

session_start();
if(!isset($_SESSION['idusuarios'])){
  header("Location:../../");
}

$idadmin=$_SESSION['idusuarios']; 
$email=$_SESSION['email'];
$ruta_sitio_web=$_SESSION['ruta_sitio_web'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>    
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
<style>
@media (min-width: 768px) {
.carousel-multi-item-2 .col-md-3 {
float: left;
width: 25%;
max-width: 100%; } }

.carousel-multi-item-2 .card img {
border-radius: 2px; }
</style>

</head>
<?php
$idusuario=1;	
?>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img
                        src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
               
                <ul class="navbar-nav navbar-nav-right">
               
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-share-variant"></i>
                </span><a class="badge badge-gradient-info" href="../catalogos/generate.php?id=<?php echo $idadmin; ?>">catalogos/<?php echo $idadmin; ?></a></h3>
             
             <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                <img src="<?php echo $ruta_sitio_web; ?>"  alt="image">
                  <span class="availability-status online"></span>
                </div>
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
                        <a class="nav-link" href="../../login_admin/logout.php" <?php echo $_SESSION['idusuarios']; ?>>
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
                          include_once '../administrators/Classe.php';	
                          $administratos = new Classes();                                         
                          $adminis = $administratos->get_usuarios($idadmin);                             
                           while($ad = $adminis->fetchObject()){   
                         ?>                      
                    
                       <ul class="list-group">
                       <li class="list-group-item">email:<?php echo $ad->email; ?></li>
                       <li class="list-group-item">Contraseña:<?php echo $ad->contrasena; ?></li>  
                       </ul>
                       <br>
                       <form action="../administrators/logo.php" method="post"  enctype="multipart/form-data"> 
                       <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>">                        
                       <div class="form-group">
                        <label >Logotipo</label>
                        <img src="<?php echo $ad->ruta_sitio_web; ?>" class="img-thumbnail" alt="Cinque Terre" width="200" height="300">                       
                        <input type="file" required name="logo" class="form-control" >
                        </div>                          
                        <button type="submit"   class="btn btn-gradient-primary mr-2">Agregar Logo </button> 
                       </form>

                       <div class="dropdown-divider"></div>

                       <form action="../administrators/contrasena.php" method="post"  >  
                       <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>"> 
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
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                   <li class="nav-item">
                    <a class="nav-link" href="view_categorias.php">
                       <span class="menu-title">Tus Categorias</span>
                          <i class="mdi mdi-animation menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">
                       <span class="menu-title">Tu Catalogo</span>
                          <i class="mdi mdi-apps menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="view_clientes.php">
                       <span class="menu-title">Clientes</span>
                          <i class="mdi mdi-account-multiple menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="view_pedidos.php">
                       <span class="menu-title">Pedidos en Preceso</span>
                       <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="view_pedidos_completados.php">
                       <span class="menu-title">Pedidos Completados</span>
                       <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                    
                </ul>
            </nav>
   
    
            
     