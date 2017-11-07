<?php

$conn = mysqli_connect("localhost", "root", "", "conect_ideias"); //para fazer a conexão com o banco de dados

session_start();

$id_usuario = $_SESSION['id_usuario'];

$consulta = "select email, senha from usuarios where id like $id_usuario";//seleciona de onde vc quer tirar os dados

$resultado = mysqli_query($conn, $consulta);//faz a consulta e armazena num array

if(isset($_POST["submit"])){ // comando abaixo significa que só será executado se houver preenchimento do campo submit
	$senha = $_POST["senha"];
	$nova_senha = $_POST["nova_senha"];

	while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		 $row["senha"];
		 if ($senha === $row["senha"]){
		 	if ($nova_senha === $senha || $nova_senha === $row["senha"]){
		 		echo "ESSA JÁ É A SUA SENHA!";
		 	}
		 	else {
		 			$consulta2 = "UPDATE usuarios set senha = '$nova_senha' WHERE id = $id_usuario";
		 			mysqli_query ($conn, $consulta2);
		 			header("location: perfil.php");
		 			exit();
		 	}
		 }
		 else {
		 	echo "SENHA INCORRETA";
		 }
	
	}

}	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="atualizar_cadastro.php">
	<input type="password" name="senha" placeholder="Senha atual" required><br>
	<input type="password" name="nova_senha" placeholder="Nova senha" required><br>
	<input type="submit" name="submit" value="Enviar">
</form>
<a href="excluir_conta.php">Excluir conta</a>
</body>
</html>