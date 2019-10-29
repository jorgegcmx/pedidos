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
                          <th>Cliente</th>
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
                          $pedido = $pedidos->get_listapedidos_admin($idadmin);                             
                           while($fil = $pedido->fetchObject()){   
                         ?>
                        <tr>
                          <td><?php echo $fil->razon_social; ?></td>
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
                          <a data-toggle="modal" data-target="#exampleModal<?php echo $fil->idpedidos ?>" class="badge badge-gradient-info">
                          <i class="mdi mdi-border-color"></i>
                          </a>
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
             <div class="form-group">
                <label for="exampleSelectGender">Status</label>
               <select name="status" class="form-control"
                   id="exampleSelectGender" required>
                   <option></option>  
                   <option value='PG'>Pagado</option>
                   <option value='EV'>Enviado</option>                 
                  
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