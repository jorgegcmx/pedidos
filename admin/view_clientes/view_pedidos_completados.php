<?php include_once 'header.php';?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">  </h3>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Pedidos Completados y Recibidos por el Cliente</h4>
                    <p class="card-description"><code></code>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-striped"  >
                      <thead>
                        <tr>
                          <th>IDPedido</th>
                          <th>Fecha de Creación</th>                          
                          <th></th>                          
                                                                                     
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos_completados($idclientes);                             
                           while($fil = $pedido->fetchObject()){   
                         ?>
                        <tr>
                          <td>#<?php echo $fil->idpedidos; ?><br><br>
                          <form action="print.php" method="POST">
                           <input type="hidden" name="idpedido" value="<?php echo $fil->idpedidos ?>">
                           <button type="submit" class="btn btn-gradient-info btn-rounded btn-icon">
                            <i class="mdi mdi-printer"></i>
                          </button>
                           </form>
                          </td>
                          <td><?php echo $fil->fecha; ?></td>
                          <td>
                  
                          <table class="table" border="5">
                          <thead>
                          <b>
                          <tr>
                          <th></th>
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>UniCost</th>
                          <th>
                          
                          <?php 
                          if($fil->status=='PD'){
                            echo "<label class='badge badge-warning'>Pendiente de Pago</label>"; 
                          }elseif($fil->status=='PR'){
                            echo "<label class='badge badge-info'>Pago Recibido</label>"; 
                          }elseif($fil->status=='EV'){
                            echo "<label class='badge badge-primary'>En proceso de Envio</label>"; 
                          } elseif($fil->status=='RC'){
                            echo "<label class='badge badge-success'>Recibido por Cliente</label>"; 
                          }                            
                          ?>                           
                          <br>
                          Subtotal                          
                          </th>
                          <th>
                        
                          </th>                         
                          </tr>
                       
                          </thead>
                          <tbody>
                          <?php 
                           include_once '../pedidos/Classpedidos.php';	
                           $detalle = new Classpedidos();                                         
                           $deta = $detalle->get_detalle_pedido($fil->idpedidos);                             
                           while($det = $deta->fetchObject()){   
                           ?>
                           <tr>
                           <td><img src="../articulos/<?php echo $det->img; ?>" 
                                       class="img-fluid"  alt="Responsive Image" 
                                       width="307" height="240" />
                           </td>
                           <td>
                           <?php echo $det->nombre; ?><br>
                           <small><?php echo $det->comentario; ?></small>
                           </td>
                           <td><?php echo $det->cantidad; ?></td>
                           <td>$<?php echo $det->costouni; ?></td>
                           <td>$<?php echo $det->subtotal; ?></td>
                           <td>
                           

                          <form action="../cambios/agregar.php" method="post">
                          <input type="hidden" name="pedido_id" value="<?php echo $det->idpedido; ?>">
                          <input type="hidden" name="articulo_id" value="<?php echo $det->idarticulo; ?>">
                          <input type="hidden"  name="iddetalle" value="<?php echo $det->iddetalle_pedidos; ?>">                          
                          <input type="hidden" name="cantidad_original" value="<?php echo $det->cantidad; ?>">                          
                          <input type="hidden" name="unicost" value="<?php echo $det->costouni; ?>">

                          <input type="number" class="form-control" name="cantidad" ><br>
                          <button type='submit' class='btn btn-block btn-success'>Solicitar Cambio</button>
                          </form>
                           </td>
                           </tr>
                           <?php } ?>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>Total</b></td>
                           <td><b>$<?php echo $fil->total; ?></b></td>
                           <td></td>
                           </tr>
                           </tbody>
                           </table>               
                          </td>                                       
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>               
          </div>                    
      </div>
<?php include_once 'footer.php';?>