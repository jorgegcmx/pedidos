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
                    <table class="table" >
                      <thead>
                        <tr>                          
                          <th>IDPedido</th>
                          <th>Cliente</th>
                                  
                          <th></th>                     
                                                                                          
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos_admin($idadmin);                             
                           while($fil = $pedido->fetchObject()){   
                         ?>
                        <tr>
                          
                          <td>
                          <ul class="list-group">
                           <li class="list-group-item">#<?php echo $fil->idpedidos; ?></li>
                           <li class="list-group-item">Fecha: <?php echo $fil->fecha; ?> </li>                          
                         </ul>                        
                          </td>
                          <td>
                          <ul class="list-group">
                           <li class="list-group-item"> <?php echo $fil->razon_social; ?></li>
                           <li class="list-group-item">Direccion: <?php echo $fil->direccion; ?> </li>
                           <li class="list-group-item">Telefono: <?php echo $fil->telefono; ?> </li>
                           <li class="list-group-item">
                           <form action="print.php" method="POST">
                           <input type="hidden" name="idpedido" value="<?php echo $fil->idpedidos ?>">
                           <button type="submit" class="btn btn-gradient-info btn-rounded btn-icon">
                            <i class="mdi mdi-printer"></i>
                          </button>
                           </form>
                           </li>
                         </ul>                 
                          </td>
                          <td>                  
                          <table class="table">
                          <thead>
                          <b>
                          <tr>
                          <th></th>
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>UniCost</th>
                          <th>
                           <a  id="confirmacion" href="../pedidos/borrar.php?id=<?php echo $fil->idpedidos ?>"
                           class="badge badge-gradient-danger">
                          <i class="mdi mdi-close"></i>
                          </a>   
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
                          <a data-toggle="modal" data-target="#exampleModal<?php echo $fil->idpedidos ?>" class="badge badge-gradient-info">
                          <i class="mdi mdi-border-color"></i>
                          </a><br>
                          Subtotal</th>
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
                           <td>
                         
                           <img src="../articulos/<?php echo $det->img; ?>" >
                            
                           
                            </td>
                           <td><?php echo $det->nombre; ?><br>
                           <small><?php echo $det->comentario; ?></small>                           
                           </td>
                           <td><?php echo $det->cantidad; ?></td>
                           <td>$<?php echo $det->costouni; ?></td>
                           <td>$<?php echo $det->subtotal; ?></td>
                           </tr>
                           <?php } ?>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>Total:</b></td>
                           <td><b>$<?php echo $fil->total; ?></b></td>
                           
                           </tr>
                           </tbody>
                           </table>        
                           </td>                                      
                                                                      
                        </tr>


<!-- Modal -->
  <div class="modal fade" id="exampleModal<?php echo $fil->idpedidos ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pedido #<?php echo $fil->idpedidos ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form class="forms-sample" action="../pedidos/status.php"  method="POST">
     <input type="hidden" name="idpedidos" value="<?php echo $fil->idpedidos ?>">
             <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                   <select name="status" class="form-control"
                   id="exampleSelectGender" required>
                   <option></option>  
                   <option value='PR'>Pago Recibido</option>
                   <option value='EV'>En proceso de envio</option>
                   <option value='RC'>Recibido por Cliente</option>         
                  </select>
            </div>
            <button type="submit"  class="btn btn-gradient-primary mr-2">Guardar</button>
       </form>
      </div> 
  </div>
  </div>
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