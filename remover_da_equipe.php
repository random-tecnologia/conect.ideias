<?php  

require "db.php";

if(isset($_GET['id'])){

	if(isset($_GET['id_usuario'])){

		$id = $_GET['id'];
		$id_projeto = $id;
		$id_usuario = $_GET['id_usuario'];

		$consulta = "DELETE FROM usuarios_projetos WHERE id_usuario = $id_usuario AND id_projeto = $id_projeto";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		echo "<script>window.history.go(-1)</script>";

	}else{
		echo "<script>window.history.go(-1)</script>";
	exit();
	}


}else{
	echo "<script>window.history.go(-1)</script>";
	exit();
}





?>