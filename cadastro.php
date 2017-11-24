<?php
require "db.php";
session_start();

if (isset($_SESSION['id_usuario'])) {
  header('Location: meus_projetos.php');
  exit();
}

if (isset($_POST['submit'])){
  $nome = stripslashes(htmlspecialchars($_POST['nome']));
  $email = stripslashes(htmlspecialchars($_POST['email']));
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  $consulta = mysqli_query($conexao, "SELECT email FROM usuarios WHERE email = '$email'");
  if (mysqli_num_rows($consulta) != 0){
    echo "E-mail já registrado";
  } else {
    $consulta = mysqli_query($conexao, "INSERT INTO usuarios (nome, email, senha, avatar) VALUES ('$nome', '$email', '$senha', 'avatar/placeholder-avatar.png')");
    $consulta_id = mysqli_query($conexao, "SELECT id FROM usuarios WHERE email = '$email'");
    while ($row = mysqli_fetch_array($consulta_id)) {
      $_SESSION['id_usuario'] = $row['id'];
      header('location: editar_perfil.php');
    }    
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | Cadastro</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
    <!-- <div class="aviso erro aviso-entrar">
      <h2>Erro ao entrar</h2>
        <ul>
          <li>Esse e-mail já tem uma conta vinculada, <a href="login.php">clique aqui para entrar</a></li>
        </ul>
    </div> -->
    <div class="bg">
      <img id="logo-entrar" src="img/logo_branco.png" alt="Logomarca Conect.Ideias">
      <section class="container container-cadastro">
        <form class="formulario-entrar" action="cadastro.php" method="post">
          <h1>Cadastre-se</h1>
            <p>Já tem conta? <a href="login.php">Clique aqui para entrar.</a></p>
          <input type="text" name="nome" placeholder="Nome" required>
          <input type="text" name="email" placeholder="E-mail" required>
          <input type="password" name="senha" placeholder="Senha" required>
          <input class="btn-primario" type="submit" name="submit" value="Criar conta">
          <div class="clearfix"></div>
        </form>
      </section>
    </div>
  </body>
</html>