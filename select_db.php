<?php
$consulta = "SELECT * FROM projetos";


	$result = mysqli_query($conn, $consulta);
	if(!$result){
		die('query failed');
	}
?>