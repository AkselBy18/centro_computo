<?php 
require_once "conexion.php";

class Modelo extends Conexion
{

#------------------------------------usuarios-----------------------------------
	#registro de informacion de los usuarios
	#--------------------------------------
	static public function registroUsuarioModelo($datosModelo, $tabla)
	{
		//obtener la fecha y hora del sistema
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		$num_visitas = NULL;

		//consulta para obtener en la tabla
		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_usuario,apellido1,apellido2,sancionado,sancion_dias) VALUES (:nombre_usuario, :apellido1, :apellido2, :sancionado,NULL)");	

		//obtencion de parametros desde el arreglo
		$consulta->bindParam(":nombre_usuario", $datosModelo["nombre_usuario"], PDO::PARAM_STR);
		$consulta->bindParam(":apellido1", $datosModelo["apellido1"], PDO::PARAM_STR);
		$consulta->bindParam(":apellido2", $datosModelo["apellido2"], PDO::PARAM_STR);
		$consulta->bindParam(":sancionado", $datosModelo["sancionado"], PDO::PARAM_STR);
		
		if($consulta->execute())
		{
			$resultado = "ok";
		}
		else
		{
			$resultado = "error";
		}

		return $resultado;

		$consulta->close();

	}

	#------------------------------------Software----------------------------------
	#registro de informacion de software
	#--------------------------------------
	static public function registroSoftwareModelo($datosModelo, $tabla)
	{
		//obtener la fecha y hora del sistema
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		$num_visitas = NULL;

		//consulta para obtener en la tabla
		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_software,cantidad_disquetes,disponivilidad,dias_disponibilidad,estado) VALUES (:nombre_software, :cantidad_disquetes, :disponivilidad, :dias_disponibilidad, :estado)");	

		//obtencion de parametros desde el arreglo
		$consulta->bindParam(":nombre_software", $datosModelo["nombre_software"], PDO::PARAM_STR);
		$consulta->bindParam(":cantidad_disquetes", $datosModelo["cantidad_disquetes"], PDO::PARAM_STR);
		$consulta->bindParam(":disponivilidad", $datosModelo["disponivilidad"], PDO::PARAM_STR);
		$consulta->bindParam(":dias_disponibilidad", $datosModelo["dias_disponibilidad"], PDO::PARAM_STR);
		$consulta->bindParam(":estado", $datosModelo["estado"], PDO::PARAM_STR);
		
		if($consulta->execute())
		{
			$resultado = "ok";
		}
		else
		{
			$resultado = "error";
		}

		return $resultado;

		$consulta->close();

	}


	#------------------------------------control----------------------------------
	#registro de informacion de control
	#--------------------------------------
	static public function registroControlModelo($datosModelo, $tabla,$tabla2)
	{
		//obtener la fecha y hora del sistema
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		$num_visitas = NULL;

		//consulta para obtener en la tabla
		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (fk_nombre_software,dia_prestamo,dia_devolucion,fk_usuario) VALUES (:fk_nombre_software, :dia_prestamo, :dia_devolucion, :fk_usuario);");	
		$consulta2 = Conexion::conectar()->prepare("UPDATE $tabla,$tabla2 SET disponivilidad = 'prestado' where id_software = fk_nombre_software ");	
		//obtencion de parametros desde el arreglo
		$consulta->bindParam(":fk_nombre_software", $datosModelo["fk_nombre_software"], PDO::PARAM_STR);
		$consulta->bindParam(":dia_prestamo", $datosModelo["dia_prestamo"], PDO::PARAM_STR);
		$consulta->bindParam(":dia_devolucion", $datosModelo["dia_devolucion"], PDO::PARAM_STR);
		$consulta->bindParam(":fk_usuario", $datosModelo["fk_usuario"], PDO::PARAM_STR);
	
		
		if($consulta->execute())
		{
			if($consulta2->execute())
			{
			$resultado = "ok";
			}
		}
		else
		{
			$resultado = "error";
		}

		return $resultado;

		$consulta->close();

	}

	#Metodo que obtiener la informacion del control de software----------------------
	#-------------------------
	static public function listadoControlModelo($tabla1, $tabla2, $tabla3)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_software, dia_prestamo, dia_devolucion, nombre_usuario, apellido1 FROM $tabla1, $tabla2, $tabla3 WHERE id_usuario = fk_usuario and id_software = fk_nombre_software;");

		//jejcutamos la consulta
		$consulta->execute();

		//regresamos los registros obtenidos 
		return $consulta->fetchAll();

		//cerramos la conexion a la bd
		$consulta->close();
	}
	
	#Metodo que obtiener la informacion de certificado----------------------
	#-------------------------
	static public function listadoSancionadosModelo($tabla1)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_usuario, apellido1, apellido2, sancion_dias FROM $tabla1 WHERE sancionado = 'si'");

		//jejcutamos la consulta
		$consulta->execute();

		//regresamos los registros obtenidos 
		return $consulta->fetchAll();

		//cerramos la conexion a la bd
		$consulta->close();
	}

#LISTADO DE USUARIO
	#---------------------
	static public function consultaUsuarioModelo($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT id_usuario, nombre_usuario FROM $tabla  WHERE sancionado ='no'");

		$consulta -> execute();

		return $consulta->fetchAll();

		$consulta->close();
	}

	#LISTADO DE USUARIO
	#---------------------
	static public function consultaPrestamoModelo($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT dia_prestamo FROM $tabla");

		$consulta -> execute();

		return $consulta->fetchAll();

		$consulta->close();
	}


	#LISTADO DE USUARIO
	#---------------------
	static public function consultadeSoftwareModelo($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT id_software, nombre_software FROM $tabla where disponivilidad ='no prestado'");

		$consulta -> execute();

		return $consulta->fetchAll();

		$consulta->close();
	}

	#LISTADO DE USUARIO
	#---------------------
	static public function actualizarUsuarioModelo($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_usuario, id_usuario FROM $tabla");

		$consulta -> execute();

		return $consulta->fetchAll();

		$consulta->close();
	}


	#LISTADO DE USUARIO
	#---------------------
	static public function actualizarSoftwareModelo($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_software, id_software FROM $tabla Where disponivilidad = 'prestado'");

		$consulta -> execute();

		return $consulta->fetchAll();

		$consulta->close();
	}


#------------------------------------usuarios-----------------------------------
	#registro de informacion de los usuarios
	#--------------------------------------
	static public function actualizardatosUsuarioModelo($datosModelo, $tabla)
	{
		//obtener la fecha y hora del sistema
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		$num_visitas = NULL;

		//consulta para obtener en la tabla
		$consulta = Conexion::conectar()->prepare("UPDATE $tabla  SET nombre_usuario = :nombre_usuario, apellido1 = :apellido1, apellido2 = :apellido2, sancionado = :sancionado WHERE nombre_usuario = :nombre_usuario");	

		//obtencion de parametros desde el arreglo
		$consulta->bindParam(":nombre_usuario", $datosModelo["nombre_usuario"], PDO::PARAM_STR);
		$consulta->bindParam(":apellido1", $datosModelo["apellido1"], PDO::PARAM_STR);
		$consulta->bindParam(":apellido2", $datosModelo["apellido2"], PDO::PARAM_STR);
		$consulta->bindParam(":sancionado", $datosModelo["sancionado"], PDO::PARAM_STR);
		
		if($consulta->execute())
		{
			$resultado = "ok";
		}
		else
		{
			$resultado = "error";
		}

		return $resultado;

		$consulta->close();

	}

	#registro de informacion de los usuarios
	#--------------------------------------
	static public function actualizacionSoftwareModelo($datosModelo, $tabla,$tabla2,$tabla3)
	{
		//obtener la fecha y hora del sistema
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		$num_visitas = NULL;
		
		//consulta para obtener en la tabla
		$consulta = Conexion::conectar()->prepare("UPDATE $tabla, $tabla2  SET disponivilidad = 'no prestado' WHERE id_software = :fk_nombre_software");	

		$consulta->bindParam(":fk_nombre_software", $datosModelo["fk_nombre_software"], PDO::PARAM_STR);
		
		
		if($consulta->execute())
		{
		
			$diferencia = Conexion::conectar()->prepare("UPDATE usuario set sancion_dias = (SELECT (dia_devolucion - curdate()) * 7 FROM control_usuario, software, usuario WHERE id_software = :fk_nombre_software AND dia_prestamo = :dia_prestamo AND id_usuario = :id_usuario) WHERE id_usuario=:id_usuario");
			$diferencia->bindParam(":id_usuario", $datosModelo["id_usuario"], PDO::PARAM_STR);
			$diferencia->bindParam(":dia_prestamo", $datosModelo["dia_prestamo"], PDO::PARAM_STR);
			$diferencia->bindParam(":fk_nombre_software", $datosModelo["fk_nombre_software"], PDO::PARAM_STR);	
			
			if($diferencia->execute())
			{
				$resultado = "ok";
			}
			else
			{
				$resultado = "error";
			}
		}
		else
		{
			$resultado = "error";
		}
		
		return $resultado;

		$consulta->close();

	}

//SELECT ((dia_prestamo - dia_devolucion)+7)*7 
//FROM usuario,control_usuario Where nombre_usuario = 'juanito' and id_usuario = fk_usuario;


#Metodo que obtiener la informacion de certificado
	#-------------------------
	static public function listadoSoftwareModelo($tabla1)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_software, cantidad_disquetes, disponivilidad, dias_disponibilidad, estado FROM $tabla1");

		//jejcutamos la consulta
		$consulta->execute();

		//regresamos los registros obtenidos 
		return $consulta->fetchAll();

		//cerramos la conexion a la bd
		$consulta->close();
	}


#Metodo que obtiener la informacion de certificado
	#-------------------------
	static public function listadoPrestamoModelo($tabla1,$tabla2,$tabla3)
	{
		$consulta = Conexion::conectar()->prepare("SELECT nombre_usuario, nombre_software, dia_prestamo, dia_devolucion FROM $tabla1, $tabla2,$tabla3 WHERE id_software = fk_nombre_software AND id_usuario = fk_usuario;");

		//ejcutamos la consulta
		$consulta->execute();

		//regresamos los registros obtenidos 
		return $consulta->fetchAll();

		//cerramos la conexion a la bd
		$consulta->close();
	}
}