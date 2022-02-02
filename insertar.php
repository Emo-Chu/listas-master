<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$paterno = $_POST['txtPaterno'];

	$sentencia = $bd->prepare("INSERT INTO alumno(ap_paterno) VALUES (?);");
	$resultado = $sentencia->execute([$paterno]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>