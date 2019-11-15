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
                    <h4 class="card-title">Cambios Solicitados</h4>
                    <p class="card-description"><code></code>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-striped" >
                      <thead>
                        <tr>
                          <th>IDPedido</th>
                          <th>Fecha de Creación</th>                          
                          <th>Detalle de Cambio</th>                          
                                                                                     
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
                          <td>#<?php echo $fil->idpedidos;?></td>
                          <td><?php echo $fil->fecha; ?></td>
                          <td>
                          <table border="5">
                          <tr>
                          <th> </th>      
                          <th> Articulo </th>
                          <th> Cantidad  </th>
                          <th> Costo Unitario  </th>
                          <th> Subtotal  </th>
                          </tr>
                          <?php 
                         
                          include_once '../cambios/Classe.php';	
                          $cambio = new Classe();
                          $total=0;
                          $procesado=0;                                         
                          $cambi = $cambio->get_cambios($fil->idpedidos);                             
                          while($cam = $cambi->fetchObject()){
                          
                          ?>
                          <tr>
                          <td><img src="../articulos/<?php echo $cam->img; ?>" alt="Responsive Image"  width="307px" height="240px" /> </td>
                          <td><?php echo $cam->nombre; ?> </td>
                          <td><?php echo $cam->cantidad; ?> </td>
                          <td>$<?php echo $cam->unicost; ?> </td>
                          <td>$<?php echo $cam->cambio_subtotal;echo $cam->sta; ?> 
                          </td>
                          </tr>
                          <?php 
                            $total=$total+$cam->cambio_subtotal;
                            $procesado=$procesado+$cam->sta;
                         } ?>  
                         <tr>
                         <td colspan='4'> </td>                         
                         <td >
                         <?php if($total!=0){?>
                         <b>Total: $<?php echo $total;  ?> </b><br><br>
                         <?php } ?>
                          <?php if($total==0){?>
                            <button type='submit' class='btn btn-block btn-primary'>No se ha solicitado cambio</button>
                            <?php }else{ ?>
                           <?php if($procesado!=0){?>
                            <button type='submit' class='btn btn-block btn-info'>El cambio se solicito correctamente</button>
                          <?php }else{ ?>
                          <form action="../cambios/start_importe.php" method="post">                          
                          <input type="hidden" name="importe" value="<?php echo $total; ?>">
                          <input type="hidden" name="idpedido" value="<?php echo  $fil->idpedidos; ?>">
                          <button type='submit' class='btn btn-block btn-success'>Seleccionar Articulos Nuevos</button>
                          </form>
                          <?php } ?>
                          <?php } ?>
                         </td>
                        
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