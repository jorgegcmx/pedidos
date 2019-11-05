<?php 
include_once '../articulos/Product.php';
$p = new Product();
include_once 'header.php';
?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">  </h3>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                   <input type="button" OnClick="location.href='index.php'" class="btn btn-gradient-primary btn-rounded btn-fw" value="+ Agregar más Articulos"> 
                    <div class="card-body">
                    <h4 class="card-title">Articulos en Carrito</h4>                    
                    
                    <div class="table-responsive">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<?php
if(isset($_SESSION["carrito"])){
	$carrito=$_SESSION["carrito"];
		 ?>
		  <tr>
			<th>Img</th>
			<th>Nombre</th>
			<th>Cantidad</th>
      <th>Costo Unitario</th>
			<th>Subtotal</th>
      <th>Comentario</th>
			<th></th>
			</tr>
            <?php 
             $total=0;
             $cantArticulos=0;
             $i=0;
           foreach( $carrito as $p){
            ?>
                                    <tr>
                                       <td>
                                       <img src="../articulos/<?php echo $p->img; ?>" 
                                       class="img-fluid"  alt="Responsive Image" 
                                       width="307" height="240" /> 
                                        </td>
									                      <td><?php echo $p->nombre; ?></td>
									                      <td><?php echo $p->cantidad; ?></td>
                                        <td>$<?php echo $p->precio; ?></td>
									                      <td><b>$<?php echo $p->subtotal; ?></b></td>
                                        <td><p><?php echo $p->comentario; ?></p></td>
									                       <td>
                                        <a href="../articulos/eliminarprocar.php?idcar=<?php echo $i; ?>"
                                          id="confirmacion" class="badge badge-gradient-danger">
                                          <i class="mdi mdi-close"></i>
                                        </a>                                    
									                      </td>
                                       <?php 
									                       $i++;
                                         $total+=$p->subtotal;
                                        $cantArticulos= $cantArticulos+ $p->cantidad;
                                         ?>
                                     </tr>
                    <?php      
                    }
                    ?>
               		<tr>
					         <td colspan='3'></td>
                   <td ><b><h2>Total:</h2></b></td>
					         <td><b><h2>$ <?php echo $total; ?></h2></b></td>   
                   <td></td>
                   <td></td>                      
                    <?php 
                    $_SESSION ["total"]=$total;
                    ?>
					         </tr>
					         <tr>
					            <td colspan='7'>
					 	          <!--form action='../pedidos/addpedidos.php' method='post'>					
						          <div class='col-sm-10'>
                      <input type='hidden' class='form-control'value='<?php echo $idclientes; ?>' name='idcliente'>
						          </div>										
                      <div align='right'>
						          <input type='submit' class='btn btn-success' value='Generar Pedido'>
						          </div> 
                      </form-->
                       
                        <?php 
                        require 'vendor/autoload.php';                         
                        MercadoPago\SDK::setAccessToken('TEST-746453493573070-110421-edafea5b7e2fcbd452fc65f02db466b5-486125513');                                                                      
                        $preference = new MercadoPago\Preference(); 
                        $item = new MercadoPago\Item();
                        $item->id = $idclientes;
                        $item->title = date('d-m-Y'); 
                        $item->quantity =1;
                        $item->unit_price =  $_SESSION ["total"];                        
                        $preference->items = array($item);                        
                        $preference->save();                      
                        
                        ?>
                         <div align='right'>
                        <form action="../pedidos/addpedidos.php" method="POST">
                        <input type='hidden' class='form-control'value='<?php echo $idclientes; ?>' name='idcliente'>
                        <script
                        src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
                        data-preference-id="<?php echo $preference->id; ?>">
                        </script>
                       </form> 
                       </div>              
					            </td>	
					            </tr>                   
                      <?php 

	                   }else{
		  
                   	}

                    ?>
                  </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>               
          </div>                    
      </div>
<?php include_once 'footer.php';?>