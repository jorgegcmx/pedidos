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
                    <h4 class="card-title">Pedidos</h4>
                    <p class="card-description"><code></code>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-striped" >
                      <thead>
                        <tr>
                          <th>IDPedido</th>
                          <th>Fecha de Creación</th>                          
                          <th></th> 
                          <th>Importe Total</th> 
                          <th>Status</th>
                                                                        
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos($idclientes);                             
                           while($fil = $pedido->fetchObject()){   
                         ?>
                        <tr>
                          <td>#<?php echo $fil->idpedidos; ?></td>
                          <td><?php echo $fil->fecha; ?></td>
                          <td>
                  
                          <table class="table">
                          <thead>
                          <b>
                          <tr>
                          <th></th>
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>UniCost</th>
                          <th>Subtotal
                         
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
                                       width="307" height="240" /></td>
                           <td><?php echo $det->nombre; ?></td>
                           <td><?php echo $det->cantidad; ?></td>
                           <td>$<?php echo $det->costouni; ?></td>
                           <td>$<?php echo $det->subtotal; ?></td>
                           </tr>
                           <?php } ?>
                           </tbody>
                           </table>                         
                         
                           
             
                          </td> 
                          <td><b>$<?php echo $fil->total; ?></b></td>                       
                          <td> 
                          <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                            <i class="mdi mdi-printer"></i>
                          </button>
                          <?php 
                          if($fil->status=='PD'){
                            echo "<label class='badge badge-warning'>Pendiente de Pago</label>"; 
                          }elseif($fil->status=='PG'){
                            echo "<label class='badge badge-warning'>Pagado</label>"; 
                          }                          
                          ?>
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