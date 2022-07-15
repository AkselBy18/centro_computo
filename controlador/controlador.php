<?php 
class Controlador 
{
	#LLAMADA A LA PRANTILLA
	#-----------------------
	static public function pagina()
	{
		include "vistas/plantilla.php";
	}

	#LLAMADA A LOS DIVERSOS MODULOS
	#------------------------------
	static public function enlacesPaginasControlador()
	{
		if(isset($_GET['opcion']))
		{
			$enlace = $_GET['opcion'];
		}
		else
		{
			$enlace = "principal";
		}

		$respuesta = Paginas::enlacesPaginasModelo($enlace);

		include $respuesta;
	}



#Metodo para registrar al usuario
static public function registroUsuarioControlador()
{
	if(isset($_POST['nombre_usuario']))
	{
		$tabla = "usuario";

		$datosControlador = array("nombre_usuario"=>$_POST['nombre_usuario'],"apellido1"=>$_POST['apellido1'],"apellido2"=>$_POST['apellido2'],"sancionado"=>$_POST['sancionado']);

		$respuesta = Modelo::registroUsuarioModelo($datosControlador, $tabla);

		if($respuesta == 'ok')
		{
			?>
			<script>
				Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Se guardo los datos',
					  showConfirmButton: false,
					  timer: 1500
					})
			</script>
			<?php
		}
		else 
		{
			?>
			<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!'
				})
			</script>
			<?php
		}

	}
}


#Metodo para registrar al software
static public function registroSoftwareControlador()
{
	if(isset($_POST['nombre_software']))
	{
		$tabla = "software";

		$datosControlador = array("nombre_software"=>$_POST['nombre_software'],"cantidad_disquetes"=>$_POST['cantidad_disquetes'],"disponivilidad"=>$_POST['disponivilidad'],"dias_disponibilidad"=>$_POST['dias_disponibilidad'],"estado"=>$_POST['estado']);
		
		$respuesta = Modelo::registroSoftwareModelo($datosControlador, $tabla);

		if($respuesta == 'ok')
		{
			?>
			<script>
				Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Se guardo los datos',
					  showConfirmButton: false,
					  timer: 1500
					})
			</script>
			<?php
		}
		else 
		{
			?>
			<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!'
				})
			</script>
			<?php
		}

	}
}

#metodo para obtener el listado de los sancionados----------------
	#----------------------------------
	static public function listadoSancionadosControlador()
	{
		$respuesta = Modelo::listadoSancionadosModelo("usuario");

		foreach ($respuesta as $renglon => $valores) 
		{
			?>
				<tr>
					<td><?php echo $valores['nombre_usuario']; ?></td>
					<td><?php echo $valores['apellido1']; ?></td>
					<td><?php echo $valores['apellido2']; ?></td>
					<td><?php echo $valores['sancion_dias']; ?></td>
				</tr>
			<?php
		}
	

	}

#metodo para obtener el listado del control de software----------------
	#----------------------------------
	static public function listadoControlControlador()
	{
		$respuesta = Modelo::listadoControlModelo("control_usuario", "usuario", "software");

		foreach ($respuesta as $renglon => $valores) 
		{
			?>
				<tr>
					<td><?php echo $valores['nombre_software']; ?></td>
					<td><?php echo $valores['dia_prestamo']; ?></td>
					<td><?php echo $valores['dia_devolucion']; ?></td>
					<td><?php echo $valores['nombre_usuario']; ?></td>
					<td><?php echo $valores['apellido1']; ?></td>
				</tr>
			<?php
		}
	

	}
	
#Metodo para registrar al software
static public function registroControlControlador()
{
	if(isset($_POST['fk_nombre_software']))
	{
		$tabla = "control_usuario";
		$tabla2 = "software";

		$datosControlador = array("fk_nombre_software"=>$_POST['fk_nombre_software'],"dia_prestamo"=>date("Y-m-d"),"dia_devolucion"=>$_POST['dia_devolucion'],"fk_usuario"=>$_POST['fk_usuario']);
		
		$respuesta = Modelo::registroControlModelo($datosControlador, $tabla,$tabla2);

		if($respuesta == 'ok')
		{
			?>
			<script>
				Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Se guardo los datos',
					  showConfirmButton: false,
					  timer: 1500
					})
			</script>
			<?php
		}
		else 
		{
			?>
			<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!'
				})
			</script>
			<?php
		}

	}
}

		#CONSULTA PARA EL NOMBRE DEL software
	#-----------------------------------------
	static public function consultadesoftwareControlador()
	{
		$tabla = 'software';
		$respuesta = Modelo::consultadeSoftwareModelo($tabla);

		return $respuesta;
	}

	#CONSULTA PARA prestamo
	#-----------------------------------------
	static public function consultaPrestamoControlador()
	{
		$tabla = 'control_usuario';
		$respuesta = Modelo::consultaPrestamoModelo($tabla);

		return $respuesta;
	}

		#CONSULTA PARA EL NOMBRE DEL usuario
	#-----------------------------------------
	static public function actualizarUsuarioControlador()
	{
		$tabla = 'usuario';
		$respuesta = Modelo::actualizarUsuarioModelo($tabla);

		return $respuesta;
	}


	#CONSULTA PARA EL NOMBRE DEL usuario
	#-----------------------------------------
	static public function consultaUsuarioControlador()
	{
		$tabla = 'usuario';
		$respuesta = Modelo::consultaUsuarioModelo($tabla);

		return $respuesta;
	}

	
		#CONSULTA PARA EL NOMBRE DEL software
	#-----------------------------------------
	static public function actualizarSoftwareControlador()
	{
		$tabla = 'software';
		$respuesta = Modelo::actualizarSoftwareModelo($tabla);

		return $respuesta;
	}

#Metodo para registrar al usuario
static public function actualizardatosUsuarioControlador()
{
	if(isset($_POST['nombre_usuario']))
	{
		$tabla = "usuario";

		$datosControlador = array("nombre_usuario"=>$_POST['nombre_usuario'],"apellido1"=>$_POST['apellido1'],"apellido2"=>$_POST['apellido2'],"sancionado"=>$_POST['sancionado']);

		$respuesta = Modelo::actualizardatosUsuarioModelo($datosControlador, $tabla);

		if($respuesta == 'ok')
		{
			?>
			<script>
				Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Se guardo los datos',
					  showConfirmButton: false,
					  timer: 1500
					})
			</script>
			<?php
		}
		else 
		{
			?>
			<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!'
				})
			</script>
			<?php
		}

	}
}
	#metodo para obtener el listado de software
	#----------------------------------
	static public function listadoSoftwareControlador()
	{
		$respuesta = Modelo::listadoSoftwareModelo("software");

		foreach ($respuesta as $renglon => $valores) 
		{
			?>
				<tr>
					<td><?php echo $valores['nombre_software']; ?></td>
					<td><?php echo $valores['cantidad_disquetes']; ?></td>
					<td><?php echo $valores['disponivilidad']; ?></td>
					<td><?php echo $valores['dias_disponibilidad']; ?></td>
					<td><?php echo $valores['estado']; ?></td>
				</tr>
			<?php
		}
	

	}

	static public function listadoPrestamoControlador()
	{
		$respuesta = Modelo::listadoPrestamoModelo("control_usuario","usuario","software");

		foreach ($respuesta as $renglon => $valores) 
		{
			?>
				<tr>
					<td><?php echo $valores['nombre_software']; ?></td>
					<td><?php echo $valores['nombre_usuario']; ?></td>
					<td><?php echo $valores['dia_prestamo']; ?></td>
					<td><?php echo $valores['dia_devolucion']; ?></td>
				</tr>
			<?php
		}
	}

	#Metodo para actualizar al software
static public function actualizacionSoftwareControlador()
{
	if(isset($_POST['fk_nombre_software']))
	{
		$tabla = "software";
		$tabla2 = "control_usuario";
		$tabla3 = "usuario";

		$datosControlador = array("fk_nombre_software"=>$_POST['fk_nombre_software'],"id_usuario"=>$_POST['id_usuario'],"dia_prestamo"=>$_POST['dia_prestamo']);

		$respuesta = Modelo::actualizacionSoftwareModelo($datosControlador, $tabla, $tabla2,$tabla3);

		if($respuesta == 'ok')
		{
			?>
			<script>
				Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Se guardo los datos',
					  showConfirmButton: false,
					  timer: 1500
					})
			</script>
			<?php
		}
		else 
		{
			?>
			<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!'
				})
			</script>
			<?php
		}

	}
}

}