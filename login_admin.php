<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>    
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> 
    <link rel="stylesheet" href="assets/css/style.css">    
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
                <h4>Bienvenido</h4>
                <h6 class="font-weight-light">
                administra tus pedidos y el catalogo de tus productos
                </h6>
                <form class="pt-3" action="login_admin/login.php" method="POST">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg fondo" required placeholder="Correo">
                  </div>
                  <div class="form-group">
                    <input type="password" name="contrasena" class="form-control form-control-lg fondo" required placeholder="Contraseña">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >Ingresar</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">                    
                    <a href="#" class="auth-link text-black">Olvidaste tu Contraseña?</a>
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