<?php
if(isset($_GET['id'])){
     $admin=$_GET['id'];
     $id=$_GET['id'];



$miArchivo = fopen($admin.".php", 'w') or die('No se puede abrir/crear el archivo!');
$php='
<?php
$idusuario="'.$id.'";
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>catalogo</title>   
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />    
</head>
<body>
    <div class="container-scroller">     
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
              <ul class="navbar-nav navbar-nav-right">  
                 <li class="nav-item dropdown">
              <a class="nav-link count-indicator"   href="#" >
              <i class="mdi mdi-home"></i>
               Inicio
              <span class="count-symbol bg-success"></span>
              </a>             
               </li>
              <li class="nav-item dropdown">
              <a class="nav-link count-indicator"   href="../../registro_clientes.php?id=<?php echo $idusuario; ?>" >
               ¡Para obtener precio de Mayoreo regístrate aquí!
              <i class="mdi mdi-cart-outline"></i>
              <span class="count-symbol bg-success"></span>
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
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
                <li class="list-group-item active">
                <span class="menu-title">Categorias</span>                                          
               </li>
               <li class="nav-item">
               <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]; ?>">
                  <span class="menu-title">Todos los Artucilos
               </span>                         
               </a>
               </li>
               <?php 
                include_once "../articulos/Classe.php";	
                $categorias = new Classe();                                    
                $categori = $categorias->get_categorias($idusuario);                                     
                while($fil = $categori->fetchObject()){   
                ?>
               <li class="nav-item">
               <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $fil->idcategorias; ?>">
                  <span class="menu-title"><?php echo $fil->nombre; ?>
               </span>                         
               </a>
               </li>
                <?php } ?>                    
           </ul>
       </nav>
            <!-- partial -->
            <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Catalogo de Articulos </h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                            <form class="d-flex align-items-center h-100" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text"  name="producto" class="form-control bg-transparent border-0" autofocus
                                placeholder="Buscar Producto">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary btn-rounded btn-fw">Buscar</button>
                    </form>
              
                                <div class="row product-item-wrapper">
                                    <?php 
                                    include_once "../articulos/Classe.php";	
                                    $articulos = new Classe();
                                    if(isset($_POST["producto"])){
                                     $articulo = $articulos->get_articulo_filtro($idusuario,$_POST["producto"]);
                                    }elseif(isset($_GET["id"])){
                                      $articulo = $articulos->get_categorias_filtro($idusuario,$_GET["id"]);
                                    }else{
                                      $articulo = $articulos->get_articulo($idusuario);
                                    }
                                     while($fil = $articulo->fetchObject()){   
                                     ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 product-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="action-holder">
                                                    <h6>Codigo: <?php echo $fil->codigo; ?></h6>
                                                    <label class="badge badge-gradient-info">Categoria:
                                                        <?php echo $fil->nombre; ?></label>                                                    
                                                </div>
                                                <div class="product-img-outer">
                                                  <a href="#"   data-toggle="modal" data-target="#img<?php echo $fil->idarticulos; ?>" >
                                                    <img width="300" height="400" class="img-fluid"
                                                        src="../articulos/<?php echo $fil->img; ?>"
                                                        alt="prduct image">
                                                  </a>
                                                </div>
                                                <p class="product-title"><b><?php echo $fil->nombrearticulo; ?></b>
                                                </p>
                                              
                                                
                                                <p class="product-description">
                                                    <small><?php echo $fil->descripcion; ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->                 
                                  <div class="modal fade" id="img<?php echo $fil->idarticulos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tamaño Maximo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <img src="../articulos/<?php echo $fil->img; ?>" class="img-thumbnail" alt="Cinque Terre">
                                          </div>    
                                        </div>
                                      </div>
                                    </div>                               
                              
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->              
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        </div>
 </div>

<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
</body>
</html>
';

fwrite($miArchivo, $php);
fclose($miArchivo);

header("Location:".$id.".php");
}else{

}
?>