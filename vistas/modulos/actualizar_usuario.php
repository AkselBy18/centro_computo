<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Usuarios</h1> 
    <p class="lead">llene todos los campos solicitados</p>
  </div>
</div>
<br><br>
<form method="POST" enctype="multipart/form-data" autocomplete="off">
	 <!--usuario-->
	 <div class="mb-3">
	<label for="nombre_usuario" class="form-label">usuario</label>
	<select class="form-select" aria-label="Default select example" name="nombre_usuario" id="nombre_usuario" required>
	  <option value="">usuario...</option>
	  <?php 
	  	$consulta = Controlador::actualizarUsuarioControlador();
	  	foreach($consulta as $datos => $valores)
	  	{
	  		echo '<option value="'.$valores["nombre_usuario"].'">'.$valores["nombre_usuario"].'</option>';
	  	}
	  ?>
	</select>
	</div>
		<!--apellido uno-->
        <div class="mb-3">
  	<label for="apellido1" class="form-label">primer apellido</label>
  	<input type="text" class="form-control" id="apellido1"name="apellido1" required>
	</div>
	<!--apellido dos-->
	<div class="mb-3">
	<label for="apellido2" class="form-label">segundo apellido</label>
	<input type="text" class="form-control" id="apellido2"name="apellido2" required>
	</div>
	 <!--sancionado-->
     <div class="mb-3">
  	<label for="sancionado" class="form-label">sancionado</label>
      <select class="form-select" aria-label="Default select example" name="sancionado" id="sancionado" required>
      <option value="si">si</option>
      <option value="no">no</option>
    </select>
	</div>
	<!--Boton-->
	<div class="d-grid gap-2 col-6 mx-auto">
  		<button type="submit" class="btn btn-secondary">Guardar</button>
	</div>
</form>
<?php
	$registro = new Controlador();
	$registro -> actualizardatosUsuarioControlador();
?>