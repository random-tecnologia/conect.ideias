<?php 
require "_header.php";

if (isset($_GET['id'])) {
	$id_not = $_GET['id'];
	mysqli_query($conexao, "DELETE FROM notificacoes WHERE id = $id_not") or die(mysqli_error());
	header('Location: notificacoes.php');
	exit();
} else {
    echo "<script>window.history.go(-1)</script>";
    exit();
}

?>