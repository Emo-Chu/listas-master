<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumno;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	 
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="indexx.css">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<a href="cerrar.php" class="alto"> <b>Cerrar Sesión</b></a>
		<h3>Tareas</h3>
		<table>
			<tr>
				<td><b> Código</b></td>
				<td><b>Tarea</b></td>
				<td><b>Editar</b></td>
				<td><b>Eliminar</b></td>
			</tr>

			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_alumno; ?></td>
						<td><?php echo $dato->ap_paterno; ?></td>
						<td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>"class="asul">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>"class="a">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

		<!-- inicio insert -->
		<hr>
		<h3>Ingresar Tarea</h3>
		<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>Lista: </td>
					<td><input type="text" name="txtPaterno"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR TAREA"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>