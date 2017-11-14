<?php 

require "db.php";

session_start();

if (isset($_SESSION['id_usuario'])) {
  header('Location: meus_projetos.php');
  exit();
}

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$consulta = "SELECT id, senha FROM usuarios WHERE email = '$email'";
	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

  $row = mysqli_fetch_assoc($result);
	$id_usuario = $row['id'];
  $senha_hashed = $row['senha'];

  if (password_verify($senha, $senha_hashed)){
    if(!isset($_SESSION['id_usuario'])){
      $_SESSION['id_usuario'] = $id_usuario;
      header('location: meus_projetos.php');
    }
  }else {
    echo "Senha incorreta!";
    die();
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | Entrar</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  <!-- <div class="aviso erro aviso-entrar">
    <div class="wrapper">
      <h2>Erro ao entrar</h2>
      <div class="texto">
        <ul>
          <li>Esse e-mail não foi cadastrado no nosso sistema</li>
          <li>Sua senha não confere</li>
        </ul>
      </div>
    </div>
  </div> -->
  <div class="bg">
    <img id="logo-entrar" src="img/logo_branco.png" alt="Logomarca Conect.Ideias">
    <section class="container container-cadastro">
      <form class="formulario-entrar" action="login.php" method="post">
        <h1>Entre em sua conta</h1>
        <p>Ainda não tem conta? <a href="cadastro.php">Clique aqui e cadastre-se.</a></p>
        <input type="text" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <a id="link-ajuda" href="esqueci_senha.php">Esqueci a senha</a>
        <input class="btn-primario" type="submit" name="submit" value="Entrar">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>
</body>
</html>
