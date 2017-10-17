<?php

require 'db.php';

$id = $_GET['id'];

$consulta = "DELETE FROM projetos WHERE id = $id"; 

$result = mysqli_query($conn,$consulta);

	if(!$result){
		die('query failed');
	}

header('Location: ler_projetos.php');
exit();



?>