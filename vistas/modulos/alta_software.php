<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Software</h1> 
    <p class="lead">llene todos los campos solicitados</p>
  </div>
</div>
<br><br>
<form method="POST" enctype="multipart/form-data" autocomplete="off">
	<!--nombre del software-->
	<div class="mb-3">
  	<label for="nombre_software" class="form-label">Nombre del Software</label>
  	<input type="text" class="form-control" id="nombre_software"  name="nombre_software"  required>
	</div>
		<!--cantidad-->
        <div class="mb-3">
  	<label for="cantidad_disquetes" class="form-label">Cantidad de disquetes</label>
  	<input type="number" class="form-control" id="cantidad_disquetes"name="cantidad_disquetes" required>
	</div>
	<!--disponivilidad-->
	<div class="mb-3">
	<label for="disponivilidad" class="form-label">Disponibilidad</label>
    <select class="form-select" aria-label="Default select example" name="disponivilidad" id="disponivilidad" required>
      <option value="no prestado">no prestado</option>
    </select>
	</div>
    <!--dias disponibilidad-->
    <div class="mb-3">
  	<label for="dias_disponibilidad" class="form-label">dias de disponibilidad</label>
  	<input type="number" class="form-control" id="dias_disponibilidad"name="dias_disponibilidad" required>
	</div>
     <!--estado-->
     <div class="mb-3">
  	<label for="estado" class="form-label">Estado</label>
      <select class="form-select" aria-label="Default select example" name="estado" id="estado" required>
      <option value="bueno">bueno</option>
      <option value="regular">regular</option>
      <option value="malo">malo</option>
    </select>
	</div>
	<!--Boton-->
	<div class="d-grid gap-2 col-6 mx-auto">
  		<button type="submit" class="btn btn-secondary">Guardar</button>
	</div>
</form>
<?php
	$registro = new Controlador();
	$registro -> registroSoftwareControlador();
?>