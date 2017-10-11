<?php

require 'db.php';



if(isset($_POST['submit'])){
	$id = $_GET['id'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$proximos_passos = $_POST['proximos_passos'];
	$palavras_chave = $_POST['palavras_chave'];

	$consulta = "UPDATE projetos SET nome='$nome',descricao='$descricao',proximos_passos='$proximos_passos',palavras_chave='$palavras_chave' WHERE id = $id ";
	$result = mysqli_query($conn, $consulta);
	if(!$result){
		die('query failed');
	}


}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar projeto</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="post" action="editar_projeto.php">
		<input type="text" name="nome" required><br/>
		<textarea name="descricao" required></textarea><br/>
		<textarea name="proximos_passos" required></textarea><br/>
		<input type="text" name="palavras_chave" required><br/>
		<input type="submit" name="submit" value="Atualizar">
	</form>

</body>
</html>