<?php include_once 'header.php';?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Catalogo de Articulos </h3>
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
                                                    <div class="action-holder">
                                                        <h6>Codigo: <?php echo $fil->codigo; ?></h6>
                                                        <label class="badge badge-gradient-info">Categoria:
                                                            <?php echo $fil->nombre; ?></label>                                                    
                                                    </div>
                                                    <div class="product-img-outer">
                                                      <a href="#"   data-toggle="modal" data-target="#img<?php echo $fil->idarticulos; ?>" >
                                                        <img width="300" height="400" class="product_image"
                                                            src="../articulos/<?php echo $fil->img; ?>"
                                                            alt="prduct image">
                                                      </a>
                                                    </div>
                                                    <p class="product-title"><b><?php echo $fil->nombrearticulo; ?></b>
                                                    </p>
                                                    <p class="product-price"><b>
                                                     Mayoreo $<?php echo $fil->precio_mayoreo; ?></b><br>                                                    
                                                    </p>
                                                    <form action='../articulos/addcar.php' method='post' >
									                                   <input type='hidden' name='txtidproductos' value="<?php echo $fil->idarticulos; ?>">
                                                     <input type='hidden' name='txtimg' value="<?php echo $fil->img; ?>">
									                                   <input type='hidden' name='txtnombre' value="<?php echo $fil->nombrearticulo; ?>">
									                                   <input type='hidden' name='txtprecio' value="<?php echo $fil->precio_mayoreo; ?>">									                                                              
                                                     <label>Cantidad</label>
                                                    <input id='valor2' type="number" class="form-control fondo" size='5' onKeyPress='return acceptNum(event)'  required name='txtcantidad'>
                                                    <br>
                                                    <button type="submit"  name='btnanadir'
                                                        class="btn btn-gradient-info btn-rounded btn-fw">+
                                                        Agregar</button>

                                                    </form>
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
<?php include_once 'footer.php';?>