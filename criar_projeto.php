<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "conect_ideias");

	if (!$conn){ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	}

	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$proximos_passos = $_POST['proximos_passos'];
		$quantidade_max = $_POST['numero_max'];
		$palavras_chave = $_POST['palavras_chave'];
		$tipo_ajuda = $_POST['tipo_ajuda'];
		$criado_em = "2017-02-23";
	}


	
	$consulta = "INSERT INTO projetos (nome, descricao, proximos_passos, quantidade_max, palavras_chave, tipo_ajuda, estado, criado_em, id_dono) VALUES ('sadfasdf', 'dasfdasdf', 'asdfasdfasdf',25 , 'sfgasdfasd', 'criacao', 1, 'asdfasd',1)";

	$result = mysqli_query($conn, $consulta);
	if($result){
		die('query failed');
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Criar projeto</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="post" action="criar_projeto.php">
		<input type="text" name="nome" required><br/>
		<textarea name="descricao" required></textarea><br/>
		<textarea name="proximos_passos" required></textarea><br/>
		<input type="number" name="numero_max" required><br/>
		<input type="text" name="palavras_chave" required><br/>
		<select name="tipo_ajuda" required>
			<option value="todos">Todos</option>
			<option value="criacao">Criação</option>
			<option value="consultoria">Consultoria</option>
		</select>
		<input type="submit" name="submit" value="Enviar">
	</form>

</body>
</html>