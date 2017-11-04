<?php 

require "db.php";

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$consulta = "UPDATE projetos SET estado = 0 WHERE id = $id";

	$result = mysqli_query($conexao,$consulta);

	if (!$result) {
		echo "<script>window:history.go(-1)</script>";
		exit();
	}
	echo "<script>window:history.go(-1)</script>";
	exit();

}else{
	echo "<script>window:history.go(-1)</script>";
	exit();
}



?>