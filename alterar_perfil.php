<?php
$conn = mysqli_connect("localhost", "root", "", "conect_ideias"); //para fazer a conexão com o banco de dados
$id_usuario = 2;


if(isset($_POST["submit"])){ // comando abaixo significa que só será executado se houver preenchimento do campo submit
	
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$telefone = $_POST["telefone"];
	$consulta2 = "update usuarios set nome = '$nome', descricao = '$descricao' , telefone ='$telefone' where id = $id_usuario";
	mysqli_query($conn, $consulta2);
}

$consulta = "select nome, descricao , telefone from usuarios where id like $id_usuario";//seleciona de onde vc quer tirar os dados
	$resultado = mysqli_query($conn, $consulta);//faz a consulta e armazena num array
	while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		$nome = $row['nome'];
		$descricao = $row['descricao'];
		$telefone = $row['telefone'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="alterar_perfil.php">
	<input type="text" name="nome" placeholder="nome"  value="<?=$nome?>" ><br> 
	<textarea name="descricao" placeholder="descrição"><?=$descricao?></textarea><br>
	<input type="text" name="telefone" placeholder="telefone" value="<?=$telefone?>"><br>
	<input type="submit" name="submit" value="salvar" ><br>
</form>
</body>
</html>

<?php
}
?>