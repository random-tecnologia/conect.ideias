<?php

require "_header.php";

if(isset($_POST['submit'])){
							
	$id_usuario = $_SESSION['id_usuario'];
	$id_projeto = $_POST['id'];
	$tipo_ajuda = $_POST['tipo_ajuda'];
	$id = $_POST['id'];

	// Cria solicitação
	$consulta = "INSERT INTO solicitacoes(id_usuario,id_projeto,tipo_ajuda) VALUES ($id_usuario,$id_projeto,'$tipo_ajuda')";	
	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

	// Pega id_dono do projeto
	$consulta_proj = "SELECT id_dono FROM projetos WHERE id = $id_projeto";
	$result_proj = mysqli_query($conexao, $consulta_proj) or die(mysqli_error());

	while ($projeto = mysqli_fetch_assoc($result_proj)){
		// Cria notificação
		$id_dono = $projeto['id_dono'];
		$consulta_not = "INSERT INTO notificacoes(id_usuario, id_solicitante, id_projeto, tipo) VALUES ($id_dono, $id_usuario, $id_projeto,'1')";	
		$result_not = mysqli_query($conexao,$consulta_not) or die(mysqli_error());
	}	

	echo "<script>window.history.go(-1)</script>";

}else{
	echo "<script>window.history.go(-1)</script>";
	exit();
}


?>
