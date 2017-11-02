<?php

require "db.php";

session_start(); //starta  session

if(isset($_POST['submit'])){
							
	$id_usuario = $_SESSION['id_usuario'];
	$id_projeto = $_POST['id'];
	$tipo_ajuda = $_POST['tipo_ajuda'];
	$id = $_POST['id'];
	$consulta = "INSERT INTO solicitacoes(id_usuario,id_projeto,tipo_ajuda) VALUES ($id_usuario,$id_projeto,'$tipo_ajuda') ";
	
	$result = mysqli_query($conn,$consulta);
	if(!$consulta){
		die(mysqli_error());
	}

	echo "<script>location.href='ver_projeto.php?id=$id';</script>";

}else{
	header('Location: ler_projetos.php');
	exit();
}


?>
