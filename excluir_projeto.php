<?php

require '_header.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$consulta = "DELETE FROM projetos WHERE id = $id"; 

	$result = mysqli_query($conexao,$consulta);

		if(!$result){
			echo "<script>window:history.go(-1)</script>";
			exit();
		}

	header('Location: meus_projetos.php');
	exit();
}else{
	echo "<script>window:history.go(-1)</script>";
	exit();
}



?>