<?php 

require 'db.php';

$id = $_GET['id'];

$consulta = "SELECT id,nome,descricao,proximos_passos,palavras_chave FROM projetos WHERE id =$id ";

$result = mysqli_query($conn, $consulta);
	if(!$result){
		die('query failed');
	}

while ($row = mysqli_fetch_assoc($result)) {
			echo $row['nome']."<br/>";
			echo $row['descricao'];
			echo "<a href=\"editar_projeto.php?id=$id\">Editar projeto</a><hr/>";
			
	}





?>