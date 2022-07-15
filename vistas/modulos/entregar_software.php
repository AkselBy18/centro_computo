<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">entrega de software</h1> 
    <p class="lead">llene todos los campos del software a entregar</p>
  </div>
</div>
<br><br>
<form method="POST" enctype="multipart/form-data" autocomplete="off">
	 <!--software-->
	 <div class="mb-3">
	<label for="fk_nombre_software" class="form-label">software</label>
	<select class="form-select" aria-label="Default select example" name="fk_nombre_software" id="fk_nombre_software" required>
	  <option value="">software...</option>
	  <?php 
	  	$consulta = Controlador::actualizarSoftwareControlador();
	  	foreach($consulta as $datos => $valores)
	  	{
	  		echo '<option value="'.$valores["id_software"].'">'.$valores["nombre_software"].'</option>';
	  	}
	  ?>
	</select>
	</div>
    <!--usuario-->
	<div class="mb-3">
	<label for="id_usuario" class="form-label">usuario</label>
	<select class="form-select" aria-label="Default select example" name="id_usuario" id="id_usuario" required>
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
	<!--hoy-->
	<div class="mb-3">
	<label for="dia_prestamo" class="form-label">prestamo</label>
	<select class="form-select" aria-label="Default select example" name="dia_prestamo" id="dia_prestamo" required>
	  <option value="">dia de prestamo...</option>
	  <?php 
	  	$consulta = Controlador::consultaPrestamoControlador();
	  	foreach($consulta as $datos => $valores)
	  	{
	  		echo '<option value="'.$valores["dia_prestamo"].'">'.$valores["dia_prestamo"].'</option>';
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
	$registro -> actualizacionSoftwareControlador();
?>