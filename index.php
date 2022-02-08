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
	<link rel="stylesheet" href="index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pacifico&family=Teko:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/2ea7566a60.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?><a href="cerrar.php" class="alto"><b>Cerrar Sesión</b></a> </h1>
			<!-- inicio insert -->
		<form method="POST" action="insertar.php" class="tareas">
		<h3>Ingresar Tarea</h3>
			<table>
				<tr>
					<td class="listas1">Lista: </td>
					<td><input type="text" name="txtPaterno"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR TAREA"></td>
				</tr>
			</table>
		</form>	 
		<hr>
		
			<!-- inicio insert -->
		
		<table class="agregados">
		<h3>Lista de Tareas Agregadas</h3>
			<tr>
				<td class="td"><b> N°Tarea</b></td>
				<td class="td"><b>Tarea a realizar</b></td>
				<td class="td" ><b>Editar</b></td>
				<td class="td"><b>Eliminar</b></td>
			</tr>
			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr>
						<td class="td"><?php echo $dato->id_alumno; ?></td>
						<td class="td"><?php echo $dato->ap_paterno; ?></td>
						<td class="td"><a href="editar.php?id=<?php echo $dato->id_alumno; ?>"class="zz"><i class="fas fa-edit"></i></a></td>
						<td class="td"><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>"class="zz"><i class="fas fa-trash-alt"></i></a></td>
					</tr>
				
					<?php
				}
			?>
		</table>
		<!-- inicio insert -->
		<hr>
		<!-- fin insert-->
	</center>
</body>
</html>