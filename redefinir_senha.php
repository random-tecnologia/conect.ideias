<?php

if (isset($_SESSION['id_usuario'])) {
  header('Location: meus_projetos.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | Redefinir senha</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  <div class="bg">
    <img id="logo-entrar" src="img/logo_branco.png" alt="Logomarca Conect.Ideias">
    <section class="container container-cadastro">
      <form class="formulario-entrar" action="" method="post">
        <h1>Redefina sua senha</h1>
        <p>Escolha uma nova senha.</p>
        <input type="password" name="nova-senha" placeholder="Nova senha" required>
        <input type="password" name="nova-senha-confirmacao" placeholder="Confirmar nova senha" required>
        <input class="btn-primario" type="submit" name="submit" value="Redefinir">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>
</body>
</html>