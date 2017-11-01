<?php 

require "db.php";

if(isset($_GET['id'])){
$id = $_GET['id'];

$consulta = "UPDATE projetos SET estado = 0 WHERE id = $id";

$result = mysqli_query($conn,$consulta);

if (!$result) {
	die('query failed');
}
header('Location: ler_meus_projetos.php');
exit();

}else{
	header('Location: ler_meus_projetos.php');
	exit();
}



?>