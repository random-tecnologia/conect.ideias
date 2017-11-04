<?php  

require "db.php";

session_start();

if(isset($_GET['id'])){

	if(isset($_GET['id_usuario'])){

		$id = $_GET['id'];
		$id_projeto = $id;
		$id_usuario = $_GET['id_usuario'];

		$consulta = "SELECT tipo_ajuda FROM solicitacoes WHERE id_projeto = $id AND id_usuario = $id_usuario";
		$result  = mysqli_query($conexao,$consulta);
		if(!$result){
			header('Location: ler_projetos.php');
			exit();
		}

		while($row = mysqli_fetch_assoc($result)){

			$tipo_ajuda = $row['tipo_ajuda'];

			$consulta2 = "INSERT INTO usuarios_projetos (id_usuario, id_projeto, tipo_ajuda)";
			$consulta2 .= "VALUES ($id_usuario, $id_projeto, '$tipo_ajuda')";
			$result2 = mysqli_query($conexao,$consulta2);
			if(!$result2){
				header('Location: ler_projetos.php');
				exit();
			}

		}

		$consulta3 = "DELETE FROM solicitacoes WHERE id_projeto = $id AND id_usuario = $id_usuario";
		$result3 = mysqli_query($conexao,$consulta3);
			if(!$result3){
				header('Location: ler_projetos.php');
				exit();
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