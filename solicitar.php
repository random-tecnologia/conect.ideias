<?php

require "db.php";

session_start(); //starta  session

if(isset($_POST['submit'])){
							
	$id_usuario = $_SESSION['id_usuario'];
	$id_projeto = $_POST['id'];
	$tipo_ajuda = $_POST['tipo_ajuda'];
	$id = $_POST['id'];

	$consulta = "INSERT INTO solicitacoes(id_usuario,id_projeto,tipo_ajuda) VALUES ($id_usuario,$id_projeto,'$tipo_ajuda')";	
	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

	echo "<script>window.history.go(-1)</script>";

}else{
	echo "<script>window.history.go(-1)</script>";
	exit();
}


?>
