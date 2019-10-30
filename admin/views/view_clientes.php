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
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Dirección</th>
                          <th>Pais</th>
                          <th>Estado</th>
                          <th>Municipio</th>
                          <th>Nombre del Negocio</th> 
                          <th>status</th>                        
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                           include_once '../clientes/Classe.php';	
                          $clientes = new Classe();                                         
                          $cliente = $clientes->get_clientes($idadmin);                             
                           while($fil = $cliente->fetchObject()){   
                         ?>
                        <tr>
                          <td><?php echo $fil->email_cliente; ?></td>
                          <td><?php echo $fil->telefono; ?></td>
                          <td> <?php echo $fil->direccion; ?></td>
                          <td><?php echo $fil->pais; ?></td>
                          <td><?php echo $fil->estado; ?></td>
                          <td><?php echo $fil->municipio; ?></td>
                          <td><?php echo $fil->razon_social; ?></td>
                          <td><label class="badge badge-success">Activo</label></td>
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
<?php include_once 'footer.php';?>