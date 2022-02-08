<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$paterno2 = $_POST['txt2Paterno'];
	$sentencia = $bd->prepare("UPDATE alumno SET ap_paterno = ? WHERE id_alumno = ?;");
	$resultado = $sentencia->execute([$paterno2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>