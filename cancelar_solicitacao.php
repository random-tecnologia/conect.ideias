<?php  

require "db.php";

session_start();

if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	$id_projeto = $id;
	$id_usuario = $_SESSION['id_usuario'];

	$consulta = "DELETE FROM solicitacoes WHERE id_projeto = $id_projeto AND id_usuario = $id_usuario ";

	$result = mysqli_query($conn,$consulta);
	if(!$result){
		header('Location: ler_projetos.php');
		exit();
	}

	echo "<script>location.href='ver_projeto.php?id=$id';</script>";

}else{

	header('Location: ler_projetos.php');
	exit();
}




?>