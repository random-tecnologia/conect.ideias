<?php 
require "db.php";

if (isset($_GET['id'])) {

$id = $_GET['id'];

$consulta = "UPDATE projetos SET estado = 1 WHERE id = $id";

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