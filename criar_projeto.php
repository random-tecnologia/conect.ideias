<?php

require "db.php";

	session_start();

	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$proximos_passos = $_POST['proximos_passos'];
		$quantidade_max = $_POST['quantidade_max'];
		$palavras_chave = $_POST['palavras_chave'];
		$tipo_ajuda = $_POST['tipo_ajuda'];
		$criado_em = date("d/m/Y");
		$id_dono = $_SESSION['id_usuario'];
		
		$consulta = "INSERT INTO projetos (nome, descricao, proximos_passos, quantidade_max, estado, palavras_chave, tipo_ajuda, criado_em, id_dono) VALUES ('$nome', '$descricao', '$proximos_passos',$quantidade_max, 1, '$palavras_chave', '$tipo_ajuda', '$criado_em',$id_dono)";

	$result = mysqli_query($conn, $consulta);
	if(!$result){
		die(mysql_error());
	}

		$consulta_2 = "SELECT id FROM projetos WHERE nome = '$nome' and descricao = '$descricao'and proximos_passos = '$proximos_passos' and quantidade_max = '$quantidade_max'";
	$result_2 = mysqli_query($conn,$consulta_2);
	if(!$result_2){
		die('Query failed');
	}

	while($row = mysqli_fetch_assoc($result_2)){
   $id = $row['id']; 
}
echo "<script>location.href='ver_projeto.php?id=$id';</script>";

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
		<input type="number" name="quantidade_max" required><br/>
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