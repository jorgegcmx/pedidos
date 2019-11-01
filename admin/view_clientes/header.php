<?php
session_start();
if(!isset($_SESSION['idclientes'])){
  header("Location:../../");
}

$idclientes=$_SESSION['idclientes']; 
$idusuario=$_SESSION['idusuarios_admin'];;	
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
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
</head>
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
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="." method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" name="producto" class="form-control bg-transparent border-0" autofocus
                                placeholder="Buscar Producto">
                        </div>
                    </form>
                </div>
              <ul class="navbar-nav navbar-nav-right">                 
              <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="view_carrito.php" >
                (Carrito) <i class="mdi mdi-cart-outline"></i>
                <span class="count-symbol bg-success"></span>
              </a>             
               </li>
                 
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle"  href="#" 
                            aria-expanded="false">                          
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $_SESSION['email']; ?></p>
                            </div>
                        </a>
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
                       <span class="menu-title">Pedidos Completados</span>
                       <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
