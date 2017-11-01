<?php  

require "db.php";


if(isset($_POST['submit'])){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha']; 
	$descricao = $_POST['descricao'];
	$telefone = $_POST['telefone'];
	
	$verifica = "INSERT INTO usuarios (nome, senha, email, descricao, avatar, telefone) VALUES ('$nome','$senha', '$email','$descricao', 'avatar', '$telefone')";

	$result = mysqli_query($conn,$verifica);

	if(!$result){
		die("query failed");
	}



}




?>




<!DOCTYPE html>
<html>
<head>
	<title>Criar projeto</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="post" action="cadastro_session.php">
		<input type="text" name="nome" required><br/>
		<input type="password" name="senha" required><br/>
		<input type="email" name="email" required><br/>
		<textarea name="descricao" required></textarea><br/>
		<input type="tel" name="telefone" required><br/>
		<input type="submit" name="submit" value="Enviar">
	</form>

</body>
</html>