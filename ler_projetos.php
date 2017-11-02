<?php
	
require 'db.php';

echo "<a href=\"ver_meus_projetos.php\">Ver meus projetos</a><hr/>";

$consulta = "SELECT * FROM projetos";

$result = mysqli_query($conn, $consulta);
if(!$result){
	die('query failed');
}



while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		echo $row['nome']."<br/>";
		echo $row['descricao']."<br/>";
		echo $row['tipo_ajuda']."<br/>";
		echo $row['palavras_chave']."<br/>";
		


		echo "<a href=\"ver_projeto.php?id=$id\">Ver projeto</a><hr/>";
}


?>
