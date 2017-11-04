<?php  

require "db.php";

session_start();

if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	$id_projeto = $id;
	$id_usuario = $_SESSION['id_usuario'];

	$consulta = "DELETE FROM solicitacoes WHERE id_projeto = $id_projeto AND id_usuario = $id_usuario ";
	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

	echo "<script>window.history.go(-1)</script>";

}else{
	echo "<script>window.history.go(-1)</script>";
	exit();
}

?>