<?php 
$conn = mysqli_connect("localhost", "root", "", "conect_ideias");
$id_usuario = 1; // TODO: Pegar id da sessão automaticamente 
$consulta = "select senha from usuarios where id like $id_usuario";
$resultado = mysqli_query($conn, $consulta);
	if(isset($_POST["submit"])){
		$senha = $_POST["senha"];

		while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados armazenados 
			if ($senha === $row["senha"]){
				$consulta2 = "delete from usuarios where id = $id_usuario";
				mysqli_query ($conn, $consulta2);
			 }
			 
			 else 
			 	echo "SENHA INCORRETA";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Conect.Ideias | Excluir conta</title>
</head>
<body>
	<h1>Excluir conta</h1>
	<form action="Excluiruir_conta.php" method="post">
		<p>Digite sua senha:</p>
		<input type="password" name="senha" placeholder="Senha"><br>
		<a href="atualizar_cadastro.php">Voltar</a>
		<input type="submit" name="submit" value="Excluir conta">
	</form>
</body>
</html>