<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Control</h1> 
    <p class="lead">llene todos los campos solicitados</p>
  </div>
</div>
<br><br>
<form method="POST" enctype="multipart/form-data" autocomplete="off">
	<!--fk_nombre_software-->
	<div class="mb-3">
	<label for="fk_nombre_software" class="form-label">nombre del software</label>
	<select class="form-select" aria-label="Default select example" name="fk_nombre_software" id="fk_nombre_software" required>
	  <option value="">software...</option>
	  <?php 
	  	$consulta = Controlador::consultadesoftwareControlador();
	  	foreach($consulta as $datos => $valores)
	  	{  ?>
			<option value="<?php echo $valores ['id_software'];?>"><?php echo $valores ['nombre_software'];?></option>
			<?php 
		}
		  ?>
		  </select>
		  </div>
		  
		<!--dia de prestamo-->
        <div class="mb-3">
  	<label for="dia_prestamo" class="form-label">Fecha de prestamo</label>
  	<input type="text" class="form-control" id="dia_prestamo"name="dia_prestamo" value="<?php echo date("Y-m-d");?>" required disabled>
	</div>

	<!--dia de devolucion-->
    <div class="mb-3">
  	<label for="dia_devolucion" class="form-label">Fecha de devolucion</label>
  	<input type="date" class="form-control" id="dia_devolucion"name="dia_devolucion" required>
	</div>
    <!--usuario-->
	<div class="mb-3">
	<label for="fk_usuario" class="form-label">usuario</label>
	<select class="form-select" aria-label="Default select example" name="fk_usuario" id="fk_usuario" required>
	  <option value="">usuario...</option>
	  <?php 
	  	$consulta = Controlador::consultaUsuarioControlador();
	  	foreach($consulta as $datos => $valores)
	  	{
	  		echo '<option value="'.$valores["id_usuario"].'">'.$valores["nombre_usuario"].'</option>';
	  	}
	  ?>
	</select>
	</div>
	<!--Boton-->
	<div class="d-grid gap-2 col-6 mx-auto">
  		<button type="submit" class="btn btn-secondary">Guardar</button>
	</div>
</form>
<?php
	$registro = new Controlador();
	$registro -> registroControlControlador();
?>