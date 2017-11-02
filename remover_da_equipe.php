<?php  

require "db.php";

if(isset($_GET['id'])){

	if(isset($_GET['id_usuario'])){

		$id = $_GET['id'];
		$id_projeto = $id;
		$id_usuario = $_GET['id_usuario'];

		$consulta = "DELETE FROM usuarios_projetos WHERE id_usuario = $id_usuario AND id_projeto = $id_projeto";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}





		echo "<script>location.href='ver_equipe.php?id=$id';</script>";	

	}else{
		header('Location: ler_projetos.php');
	exit();
	}


}else{
	header('Location: ler_projetos.php');
	exit();
}





?>