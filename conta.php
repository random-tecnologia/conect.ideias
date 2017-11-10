<<<<<<< HEAD
<?php 
$titulo_pagina = "Editar conta";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
?>

  <div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="editar_conta.php" method="post">
        <label for="email">E-mail</label>
        <input type="text" name="email" placeholder="" required>
        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha_atual" class="senha" placeholder="" required>
        <label for="nova_senha">Nova senha</label>
        <input type="password" name="nova_senha" class="senha" placeholder="" required>
        <a href="#" id="excluir-conta">Excluir conta</a>
        <input class="btn-primario" type="submit" name="submit" value="Salvar">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>

<?php require "_footer.php" ?>
=======
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
>>>>>>> atualizar-cadastro
