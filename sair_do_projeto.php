<?php  

require "db.php";

session_start();

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$id_projeto = $id;
	$id_usuario = $_SESSION['id_usuario'];

	$consulta = "DELETE FROM usuarios_projetos WHERE id_usuario = $id_usuario AND id_projeto = $id";
	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

	echo "<script>location.href='descricao.php?id=$id';</script>";

}else{
	echo "<script>window.history.go(-1)</script>";
	exit();
}


?>