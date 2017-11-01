<?php

require 'db.php';

if(isset($_GET['id'])){
$id = $_GET['id'];

$consulta = "DELETE FROM projetos WHERE id = $id"; 

$result = mysqli_query($conn,$consulta);

	if(!$result){
		die('query failed');
	}

header('Location: ler_meus_projetos.php');
exit();
}else{
	header('Location: ler_meus_projetos.php');
	exit();
}



?>