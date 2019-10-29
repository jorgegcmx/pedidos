</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="../articulos/agregar.php" method="POST"
                    enctype="multipart/form-data">

                    <input type="hidden" name="idusuarios" value="<?php echo $idusuario; ?>">
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
                             $categori = $categorias->get_categorias($idusuario);
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
                    <button type="submit" name="guardar"
                        class="btn btn-gradient-primary mr-2">Guardar
                    </button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>

<script>
    $(document).on("click", "#confirmacion", function (e) {
        var r = confirm("Esta seguro de eliminar el registro? esta acción no se podra reversar!");
        if (r == true) {
            window.location.href = link;
        } else {
            return false;
        }

    });
</script>

</body>

</html>