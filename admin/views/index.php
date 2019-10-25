<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
    a { color: white; } 

   .fondo {
   background-color: #eee;  
    }
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
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
                <input type="text" name="producto" class="form-control bg-transparent border-0" autofocus placeholder="Buscar Producto">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="http://ceramicachecuan.com/wp-content/uploads/2017/03/cropped-cropped-logochecuan.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Ceramica Checuan</p>
                </div>
              </a>         
            </li>  
        
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
       
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">       
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Productos</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">+ Agregar Nuevo </button>             
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Productos </h3>            
            </div>
             <div class="row">  
             <div class="col-md-12">
                <div class="card">
                  <div class="card-body">               
                    <div class="row product-item-wrapper">   
                    <?php 
                      include_once '../articulos/Classe.php';	
                      $articulos = new Classe();
                      if(isset($_POST['producto'])){
                       $articulo = $articulos->get_articulo_filtro($idusuario,$_POST['producto']);
                      }else{
                        $articulo = $articulos->get_articulo($idusuario);
                      }
                       while($fil = $articulo->fetchObject()){   
                    ?> 
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12 product-item">
                        <div class="card">
                          <div class="card-body">
                            <div class="action-holder" > 
                            <label class="badge badge-gradient-info">Categoria: <?php echo $fil->nombre; ?></label>  
                            <a  href="" data-toggle="modal" data-target="#editarArticulo<?php echo $fil->idarticulos; ?>" class="badge badge-gradient-info"><i class="mdi mdi-border-color"></i></a> 
                            <a  href="../articulos/borrar.php?id=<?php echo $fil->idarticulos; ?>&img=<?php echo $fil->img; ?>" id="confirmacion" class="badge badge-gradient-danger"><i class="mdi mdi-close"></i></a>                             
                            </div>
                            <div class="product-img-outer">
                              <img width="300" height="400" class="product_image" src="../articulos/<?php echo $fil->img; ?>" alt="prduct image">
                            </div>
                            <p class="product-title"><b><?php echo $fil->nombrearticulo; ?></b></p>
                            <p class="product-price"><b>$ <?php echo $fil->precio_mayoreo; ?></b></p>                            
                            <label>Cantidad</label>                          
                            <input type="number" class="form-control fondo" size='5'>
                             <br>                          
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-fw">+ Agregar</button>                 
                            <p class="product-description"><small><?php echo $fil->descripcion; ?></small></p>
                          </div>
                        </div>
                      </div> 
<!-- Modal -->
   <div class="modal fade" id="editarArticulo<?php echo $fil->idarticulos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Información del Articulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" action="../articulos/agregar.php" method="POST" enctype="multipart/form-data">  

                      <input type="hidden" name="id" value="<?php echo $fil->idarticulos; ?>">  
                      <input type="hidden" name="idusuarios" value="<?php echo $idusuario; ?>">
                      <input type="hidden" name="imganterior" value="<?php echo $fil->img; ?>">

                      <div class="form-group">
                        <label for="exampleInputCity1">Imagen</label>
                        <img src="../articulos/<?php echo $fil->img; ?>" class="img-thumbnail" alt="Cinque Terre">
                        <input type="file" name="img" class="form-control" id="exampleInputCity1" >
                      </div>
                
                      <div class="form-group">
                        <label for="exampleInputName1">Codigo del Ariculo</label>
                        <input type="text" value="<?php echo $fil->codigo; ?>" name="codigo" class="form-control" id="exampleInputName1" placeholder="CHE-01" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Nombre</label>
                        <input type="text" value="<?php echo $fil->nombrearticulo; ?>" name="nombre" class="form-control" id="exampleInputEmail3" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Precio Mayoreo</label>
                        <input type="number" value="<?php echo $fil->precio_mayoreo; ?>" name="precio_mayoreo" class="form-control" id="exampleInputPassword4" placeholder="$" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Precio Menudeo</label>
                        <input type="number" value="<?php echo $fil->precio_menudeo; ?>" name="precio_menudeo" class="form-control" id="exampleInputPassword4" placeholder="$" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Categoria</label>
                        <select              name="idcategoria" class="form-control" id="exampleSelectGender" required>
                           <option></option>
                           <?php 
                           include_once '../articulos/Classe.php';	
                           $categorias = new Classe();
                           $categori = $categorias->get_categorias($idusuario);
                           while($data=$categori->fetchObject()){ 
                            ?>		
                            <option value="<?php echo $data->idcategorias; ?>">
                             <?php echo $data->nombre; ?>
                            </option>
                            <?php } ?>
                        </select>
                      </div>                      
                     
                      <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <input     value="<?php echo $fil->descripcion; ?>"    name="descripcion" class="form-control"  required>
                      </div>
                      <button type="submit" name="editar" class="btn btn-gradient-primary mr-2">Guardar</button>
                    
        </form>
       </div>
      <div class="modal-footer">      
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
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://github.com/jorgegcmx/" target="_blank">Desarrollo de Aplicaciones</a>449-257-0329</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Creado por Ing. Jorge Antonio Gonzalez <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Información del Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" action="../articulos/agregar.php" method="POST" enctype="multipart/form-data">                 
                        
                     <input type="hidden" name="idusuarios" value="<?php echo $idusuario; ?>">
                     <div class="form-group">
                        <label for="exampleInputCity1">Imagen</label>
                        <input type="file" name="img" class="form-control" id="exampleInputCity1" required>
                      </div>
                
                      <div class="form-group">
                        <label for="exampleInputName1">Codigo del Ariculo</label>
                        <input type="text" name="codigo" class="form-control" id="exampleInputName1" placeholder="CHE-01" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputEmail3" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Precio Mayoreo</label>
                        <input type="number" name="precio_mayoreo" class="form-control" id="exampleInputPassword4" placeholder="$" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Precio Menudeo</label>
                        <input type="number" name="precio_menudeo" class="form-control" id="exampleInputPassword4" placeholder="$" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Categoria</label>
                        <select              name="idcategoria" class="form-control" id="exampleSelectGender" required>
                           <option></option>
                           <?php 
                           include_once '../articulos/Classe.php';	
                           $categorias = new Classe();
                           $categori = $categorias->get_categorias($idusuario);
                           while($data=$categori->fetchObject()){ 
                            ?>		
                            <option value="<?php echo $data->idcategorias; ?>">
                             <?php echo $data->nombre; ?>
                            </option>
                            <?php } ?>
                        </select>
                      </div>                      
                      
                      <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <textarea          name="descripcion" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                      </div>
                      <button type="submit" name="guardar" class="btn btn-gradient-primary mr-2">Guardar</button>
                    
        </form>
       </div>
      <div class="modal-footer">      
      </div>
    </div>
  </div>
</div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
 
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    
    <script>
        $(document).on("click","#confirmacion", function(e){
         var r = confirm("Esta seguro de eliminar el registro? esta acción no se podra reversar!");
         if (r == true) {
          window.location.href=link;
         } else {
         return false;
          }
		
        });
    </script>

  </body>
</html>