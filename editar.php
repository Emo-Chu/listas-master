<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM alumno WHERE id_alumno = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema, no se puede puede relizar accion";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Alumno</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="editar.css">
</head>
<body>
	<center>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>	
		<br>
		<h3>Editar Tarea:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
<<<<<<< HEAD
					<td class="apellido">Tarea: </td>
=======
					<td>Apellido paterno : </td>
>>>>>>> ce8f274af1e73ee775ebb2d8e2cdf779cbccc9ad
					<td><input type="text" name="txt2Paterno" value="<?php echo $persona->ap_paterno; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
					<td colspan="2"><input type="submit" value="AGREGAR"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>