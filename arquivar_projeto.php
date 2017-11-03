<?php 

require "db.php";

if(isset($_GET['id'])){
$id = $_GET['id'];

$consulta = "UPDATE projetos SET estado = 0 WHERE id = $id";

$result = mysqli_query($conn,$consulta);

if (!$result) {
	header('Location: ler_projetos.php');
	exit();
}
header('Location: ler_projetos.php');
exit();

}else{
	header('Location: ler_projetos.php');
	exit();
}



?>