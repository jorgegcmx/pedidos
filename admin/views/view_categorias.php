<?php include_once 'header.php';?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">  </h3>
                        <button class="btn btn-block btn-lg btn-gradient-primary mt-4" 
                        data-toggle="modal" data-target="#exampleModal">+ Agregar Nueva Categoria </button>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Categorias</h4>
                    <p class="card-description"><code></code>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>                                          
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                           include_once '../categorias/Classe.php';	
                          $categorias = new Classe();                                         
                          $categoria = $categorias->get_categorias($idadmin);                             
                           while($fila = $categoria->fetchObject()){   
                         ?>
                        <tr>
                          <td><?php echo $fila->nombre; ?></td>
                          <td>
                           <a href="" data-toggle="modal"
                            data-target="#editarArticulo<?php echo $fila->idcategorias; ?>"
                            class="badge badge-gradient-info"><i
                            class="mdi mdi-border-color"></i></a>
                            <a href="../categorias/borrar.php?id=<?php echo $fila->idcategorias; ?>"
                            id="confirmacion" class="badge badge-gradient-danger"><i
                            class="mdi mdi-close"></i></a>
                          </td>                         
                        </tr>
                             <!-- Modal -->
                             <div class="modal fade" id="editarArticulo<?php echo $fila->idcategorias; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" action="../categorias/agregar.php"
                                                            method="POST" enctype="multipart/form-data">

                                                            <input type="hidden" name="id"
                                                                value="<?php echo $fila->idcategorias; ?>">
                                                            <input type="hidden" name="idusuarios"
                                                                value="<?php echo $idadmin; ?>">
                                                                                                                  

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Nombre</label>
                                                                <input type="text" value="<?php echo $fila->nombre; ?>"
                                                                    name="nombre" class="form-control"
                                                                    id="exampleInputName1" placeholder="CHE-01"
                                                                    required>
                                                            </div>                                                       
                                                            <button type="submit" name="editar"
                                                                class="btn btn-gradient-primary mr-2">Guardar</button>
                                                        </form>
                                                    </div>                                            
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
      <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega la Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
      <form class="forms-sample" action="../categorias/agregar.php" method="POST"   >
                    <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>"> 
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputName1"
                            required>
                    </div>
                    <button type="submit"   class="btn btn-gradient-primary mr-2">Guardar
                    </button>
      </form>
      </div>
    
  </div>
</div>
<?php include_once 'footer.php';?>