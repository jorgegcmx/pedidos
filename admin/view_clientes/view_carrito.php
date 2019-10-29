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
                    <h4 class="card-title">Clientes Mayoristas</h4>
                    <p class="card-description"><code></code>
                    </p>
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<?php
if(isset($_SESSION["carrito"])){
	$carrito=$_SESSION["carrito"];
		 ?>
		    <tr>
			<th>Img</th>
			<th>Nombre</th>
			<th>Cantidad</th>
            <th>UniCost</th>
			<th>Subtotal</th>
			<th></th>
			
		    </tr>
            <?php 
             $total=0;
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
                                       <td><?php echo $p->precio; ?></td>
									                      <td>$ <?php echo $p->subtotal; ?></td>
									                       <td>
                                        <a href="../articulos/eliminarprocar.php?id=<?php echo $i; ?>"
                                          id="confirmacion" class="badge badge-gradient-danger">
                                          <i class="mdi mdi-close"></i>
                                        </a>                                    
									                      </td>
                                       <?php 
									                       $i++;
                                        $total+=$p->subtotal;
                                         ?>
                                     </tr>
                    <?php      
                    }
                    ?>
               		<tr>
					         <td colspan='4'><b><h2>Total:</h2></b></td>
					         <td><b><h2>$ <?php echo $total; ?></h2></b></td>                   
                    <?php 
                    $_SESSION ["total"]=$total;
                    ?>
					         </tr>
					         <tr>
					            <td colspan='4'>
					 	          <form action='../pedidos/addpedidos.php' method='post'>					
						          <div class='col-sm-10'>
                      <input type='hidden' class='form-control'value='1' name='idcliente'>
						          </div>										
                      <div align='right'>
						          <input type='submit' class='btn btn-success' value='Generar Pedido'>
						          </div> 
					            </td>	
                      </form> 
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
<?php include_once 'footer.php';?>