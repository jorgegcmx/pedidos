<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Catalogo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        a{
            color: white;
        }
        .fondo{
         background-color: #FFFFFF;
         border: 1px solid #0291DD;
         font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
         font-size: 11px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo.svg">
                </div>
                <h4>Quieres vender a mayoreo?</h4>
                <h6 class="font-weight-light">
                al registrarte podrás crear tu catálogo de artículos y compartirlo con tus clientes además podrás administrar tus pedidos de una forma fácil y sencilla.
                </h6>
                <form class="pt-3" action="admin/administrators/agregar.php" method="POST">
                  <div class="form-group">
                    <input type="email"    name="email"  class="form-control form-control-lg fondo" placeholder="email" required>
                  </div>
                  <div class="form-group">
                    <input type="password"  name="contrasena"  class="form-control form-control-lg fondo" placeholder="contraseña" >
                    </div>
                  <div class="form-group">
                    <input type="password"  name="contrasena2"  class="form-control form-control-lg fondo" placeholder="Repirte la contraseña" required>
                  </div>                             
                  <div class="mb-4">                  
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >Registrar</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Ya tienes una Cuenta? <a href="login_admin.php" class="text-primary">Ingresar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>      
      </div>     
    </div>   
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>    
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>    
  </body>
</html>