<?php
include_once 'header.php';
include_once '../conexion/Conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include_once '../Alumnos/Classe.php';
        $usu1 = new Classe();
        $datos = $usu1->get_formalum($id);
        $fila = $datos->fetchObject();
    }
	include_once '../Alumnos/Classe.php';	
	$estatus = new Classe();
	$filas = $estatus->get_tipodegrupo();
	?>
			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Nuevo</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nuevo Alumno</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form" method="POST" action="../Alumnos/agregar.php" enctype="multipart/form-data">	
                               <?php if(isset($id)){ echo "<input type='hidden' value='$fila->idalumnos' name='id'>"; }?>							
							
								<div class="col-md-2">
									<label>Numero de Control</label>
									<div class="form-line">
									<input type="number" name="matricula" class="form-control" required value="<?php  if(isset($id)){echo  $fila->matricula;} ?>">
								</div >
								</div>
																
								<div class="col-md-5">
									<label>Nombre Completo</label>
									<div class="form-line">
									<input type="Text" name="nombre" class="form-control" required value="<?php  if(isset($id)){echo  $fila->nombrealumno;} ?>">
								</div>
								</div>
								
								<div class="col-md-3">
									
									<div class="form-line">
									<input type="hidden"  id="reuno" name="fechan" class="form-control" required value="<?php  if(isset($id)){echo  $fila->fechanacimiento;} ?>">
								</div>
								</div>
							
									<div class="col-md-2">
									<label>Sexo</label>
									<div class="form-line">
									<select  name="sexo" required class="form-control">							
										<?php  if($fila->sexo=='MASCULINO'){?>
										<option  selected value="MASCULINO" >MASCULINO</option>
										<option value="FEMENINO" >FEMENINO</option>
										<?php }elseif($fila->sexo=='FEMENINO'){?>
										<option selected value="FEMENINO" >FEMENINO</option>
										<option   value="MASCULINO" >MASCULINO</option>
										<?php }?>										
									</select>										
									</div>										
								</div>
							
								
								<div class="col-md-2">
									<label>Tipo de Alumno</label>
									<div class="form-line">
									<select  name="tipo" required class="form-control">										
                                        <?php  if ($fila->tipo=='INTERNO'){?>									
										<option selected value="INTERNO" >INTERNO</option>
										<option  value="EXTERNO" >EXTERNO</option>
										<?php }elseif($fila->tipo=='EXTERNO'){?>
										<option selected value="EXTERNO" >EXTERNO</option>
										<option  value="INTERNO" >INTERNO</option>
										<?php }?>
																		
                                         									 
									</select>
									</div>
								</div>
									<div class="col-md-5">
									<label>Carrera</label>
									<div class="form-line">
									<select name="tipodegrupo_idtipodegrupo" required class="form-control">
	                               	<option value="" ></option>
                                       	<?php while($data=$filas->fetchObject()){ ?>                       
	                                   <option value="<?php echo $data->idtipodegrupo; ?>" <?php if(isset($id)){if ($fila->tipodegrupo_idtipodegrupo == $data->idtipodegrupo){?>selected<?php }} ?>><?php echo $data->tipodegrupo; ?></option>
                                         <?php } ?>
										 </select>
									</div>
								</div>
									<div class="col-md-3">
									<label>Grupo Carrera</label>
									<div class="form-line">
									<input type="text" name="grupo_carrera" class="form-control" value="<?php  if(isset($id)){echo  $fila->grupo_carrera;} ?>">
								</div>
								</div>
							
									<div class="col-md-3">
									<label>Turno Carrera</label>
									<div class="form-line">
									   <select  name="turno" required class="form-control">
									   <?php  if ($fila->turno=='MATUTINO'){?>							
										<option selected value="MATUTINO" >MATUTINO</option>
										<option  value="VESPERTINO" >VESPERTINO</option>
										<option  value="SABATINO" >SABATINO</option>
									   <?php }elseif($fila->turno=='VESPERTINO'){?>	
									   <option value="MATUTINO" >MATUTINO</option>
									   <option  value="SABATINO" >SABATINO</option>
										<option selected value="VESPERTINO" >VESPERTINO</option>
									   <?php }elseif($fila->turno=='SABATINO'){?>
									 	<option  selected value="SABATINO" >SABATINO</option>
                                       	<option  value="MATUTINO" >MATUTINO</option>
									    <option value="VESPERTINO" >VESPERTINO</option>							
										   <?php }else{?>
									   <option value="" ></option>
									   <option  value="MATUTINO" >MATUTINO</option>
									    <option value="VESPERTINO" >VESPERTINO</option>	
										<option value="SABATINO" >SABATINO</option>                                       									
										  <?php }?>
									</select>
									</div>
								</div>
									<div class="col-md-3">
									<label></label>
									<div class="form-line">
									<input type="hidden" name="periodo" class="form-control" required value="1">
								</div>
								</div>
									<div class="col-md-3">
									<label></label>
									<div class="form-line">
									<input type="hidden" name="nivel" class="form-control" required value="1" >
								</div>
								</div>
								
								<input type="hidden" name="users_ID" class="form-control" required value="<?php  echo $ID; ?>">
								
								<div class="col-md-6">
                                <label> </label>								
                                <div class="form-line">								
								<button type="submit" value="subir" name="subir" class="btn btn-primary">Guardar</button>
								</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		<?php
include_once 'footer.php';
?>
