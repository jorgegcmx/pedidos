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
                            <form class="d-flex align-items-center h-100" action="." method="POST">
                            <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" name="producto" class="form-control bg-transparent border-0" autofocus
                                placeholder="Buscar Producto">
                           </div>
                             <button type="submit" class="btn btn-gradient-primary btn-rounded btn-fw">Buscar</button>
                            </form>
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
                                                        <img width="300" height="400" class="img-fluid"
                                                            src="../articulos/<?php echo $fil->img; ?>"
                                                            alt="prduct image">
                                                      </a>
                                                    </div>
                                                 
                                                   
                                                    <ul class="list-group">
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <b><?php echo $fil->nombrearticulo; ?>  </b>                                                     
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                       Mayoreo
                                                       <span class="badge badge-primary badge-pill">$<?php 
                                                       if($comision != 0){
									                           echo $fil->precio_mayoreo+($fil                        ->precio_mayoreo * $comision);   
									                                   }else{
									                               echo $fil->precio_mayoreo;  
									                                   }
									                                   ?>
									                 </span>
                                                     </li>
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <form action='../articulos/addcar.php' method='post' >
									                                   <input type='hidden' name='txtidproductos' value="<?php echo $fil->idarticulos; ?>">
                                                     <input type='hidden' name='txtcategoria' value="<?php echo $fil->nombre; ?>">
                                                     <input type='hidden' name='txtimg' value="<?php echo $fil->img; ?>">
									                                   <input type='hidden' name='txtnombre' value="<?php echo $fil->nombrearticulo; ?>">
									                                   <input type='hidden' name='txtprecio' value="<?php
									                           if($comision != 0){
									                           echo $fil->precio_mayoreo+($fil                        ->precio_mayoreo * $comision);   
									                                   }else{
									                               echo $fil->precio_mayoreo;  
									                                   }
									                                   ?>">									                                                              
                                                     <label>Cantidad</label>
                                                    <input  type="number" class="form-control fondo" size='5' onKeyPress='return acceptNum(event)'  required name='txtcantidad'>
                                                    <br>
                                                    <label>Agrega Una descripción</label>
                                                    <input  type="text" class="form-control fondo" size='5'  name='txtcomentario'>
                                                    <br>
                                                    <button type="submit"  name='btnanadir'
                                                        class="btn btn-gradient-info btn-rounded btn-fw">+
                                                        Agregar a Pedido
                                                    </button>
                                                    </form>
                                                     </li>
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <p class="product-description">
                                                        <small><?php echo $fil->descripcion; ?></small>
                                                    </p>                                                       
                                                     </li>
                                                   </ul>
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