<?php include_once 'header.php';?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">  </h3>
                        <button class="btn btn-block btn-lg btn-gradient-primary mt-4" 
                        data-toggle="modal" data-target="#exampleModal">+ Agregar Nueva Articulo </button>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"> Catalogo de Articulos</h4>
                 
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
                                          
                                          if($idadmin==2){
                                           
                                            if(isset($_POST['producto'])){
                                           $articulo = $articulos->get_articulo_filtro($idadmin,$_POST['producto']);
                                            }else{
                                            $articulo = $articulos->get_articulo($idadmin);
                                            }
                                           
                                           }else{
                                               
                                          if(isset($_POST['producto'])){
                                           $articulo = $articulos->get_articulo_filtro($idadmin,$_POST['producto']);
                                          }else{
                                            $articulo = $articulos->get_articulo($idadmin);
                                          }
                                           
                                           }
                                          
                                           while($fil = $articulo->fetchObject()){  
                                               
                                         ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 product-item">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="action-holder">
                                                        <h6>Codigo: <?php echo $fil->codigo; ?></h6>
                                                        <label class="badge badge-gradient-info">
                                                            <?php echo $fil->nombre; ?></label>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#editarArticulo<?php echo $fil->idarticulos; ?>"
                                                            class="badge badge-gradient-info"><i
                                                                class="mdi mdi-border-color"></i></a>
                                                        <a href="../articulos/borrar.php?id=<?php echo $fil->idarticulos; ?>&img=<?php echo $fil->img; ?>"
                                                            id="confirmacion" class="badge badge-gradient-danger"><i
                                                                class="mdi mdi-close"></i></a>
                                                    </div>
                                                    <div class="product-img-outer">
                                                      <a href="#"   data-toggle="modal" data-target="#img<?php echo $fil->idarticulos; ?>" >
                                                        <img width="300px" height="300px" class="img-thumbnail"
                                                            src="../articulos/<?php echo $fil->img; ?>"
                                                            alt="prduct image">
                                                      </a>
                                                    </div>
                                                 
                                                    <ul class="list-group">
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <b><?php echo $fil->nombrearticulo; ?>  </b>                                                     
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                       Mayoreo
                                                       <span class="badge badge-primary badge-pill">$<?php echo $fil->precio_mayoreo; ?></span>
                                                     </li>
                                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                                       Menudeo
                                                       <span class="badge badge-primary badge-pill">$<?php echo $fil->precio_menudeo; ?></span>
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
                                        <div class="modal fade" id="editarArticulo<?php echo $fil->idarticulos; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Información
                                                            del Articulo</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" action="../articulos/agregar.php"
                                                            method="POST" enctype="multipart/form-data">

                                                            <input type="hidden" name="id"
                                                                value="<?php echo $fil->idarticulos; ?>">
                                                            <input type="hidden" name="idusuarios"
                                                                value="<?php echo $idadmin; ?>">
                                                            <input type="hidden" name="imganterior"
                                                                value="<?php echo $fil->img; ?>">

                                                            <div class="form-group">
                                                                <label for="exampleInputCity1">Imagen</label>
                                                                <img src="../articulos/<?php echo $fil->img; ?>"
                                                                    class="img-thumbnail" alt="Cinque Terre" width="200" height="300">
                                                                <input type="file" name="img" class="form-control"
                                                                    id="exampleInputCity1">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Codigo del
                                                                    Ariculo</label>
                                                                <input type="text" value="<?php echo $fil->codigo; ?>"
                                                                    name="codigo" class="form-control"
                                                                    id="exampleInputName1" placeholder="CHE-01"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail3">Nombre</label>
                                                                <input type="text"
                                                                    value="<?php echo $fil->nombrearticulo; ?>"
                                                                    name="nombre" class="form-control"
                                                                    id="exampleInputEmail3" placeholder="" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword4">Precio
                                                                    Mayoreo</label>
                                                                <input type="number"
                                                                    value="<?php echo $fil->precio_mayoreo; ?>"
                                                                    name="precio_mayoreo" class="form-control"
                                                                    id="exampleInputPassword4" placeholder="$" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword4">Precio
                                                                    Menudeo</label>
                                                                <input type="number"
                                                                    value="<?php echo $fil->precio_menudeo; ?>"
                                                                    name="precio_menudeo" class="form-control"
                                                                    id="exampleInputPassword4" placeholder="$" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Categoria</label>
                                                                <select name="idcategoria" class="form-control"
                                                                    id="exampleSelectGender" required>
                                                                    <option></option>
                                                                    <?php 
                                                                     include_once '../articulos/Classe.php';	
                                                                     $categorias = new Classe();
                                                                     $categori = $categorias->get_categorias($idadmin);
                                                                     while($data=$categori->fetchObject()){ 
                                                                      ?>
                                                                    <option value="<?php echo $data->idcategorias; ?>">
                                                                        <?php echo $data->nombre; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleTextarea1">Descripción</label>
                                                                <input value="<?php echo $fil->descripcion; ?>"
                                                                    name="descripcion" class="form-control" required>
                                                            </div>
                                                            <button type="submit" name="editar"
                                                                class="btn btn-gradient-primary mr-2">Guardar</button>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
      <form class="forms-sample" action="../articulos/agregar.php" method="POST"
                    enctype="multipart/form-data">

                    <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>">
                    <div class="form-group">
                        <label for="exampleInputCity1">Imagen</label>
                        <input type="file" name="img" class="form-control" id="exampleInputCity1" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Codigo del Ariculo</label>
                        <input type="text" name="codigo" class="form-control" id="exampleInputName1"
                            placeholder="CHE-01" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputEmail3"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Precio Mayoreo</label>
                        <input type="number" name="precio_mayoreo" class="form-control"
                            id="exampleInputPassword4" placeholder="$" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Precio Menudeo</label>
                        <input type="number" name="precio_menudeo" class="form-control"
                            id="exampleInputPassword4" placeholder="$" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Categoria</label>
                        <select name="idcategoria" class="form-control" id="exampleSelectGender" required>
                            <option></option>
                            <?php 
                             include_once '../articulos/Classe.php';	
                             $categorias = new Classe();
                             $categori = $categorias->get_categorias($idadmin);
                             while($data=$categori->fetchObject()){ 
                              ?>
                            <option value="<?php echo $data->idcategorias; ?>">
                                <?php echo $data->nombre; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="exampleTextarea1" rows="4"
                            required></textarea>
                    </div>
                    <button type="submit" name="guardar"    class="btn btn-gradient-primary mr-2">Guardar
                    </button>
                </form>
      </div>
    
  </div>
</div>
<?php include_once 'footer.php';?>