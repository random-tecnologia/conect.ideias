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
    <h2>Erro ao entrar</h2>
      <ul>
        <li>Esse e-mail não foi cadastrado no nosso sistema</li>
        <li>Sua senha não confere</li>
      </ul>
  </div> -->
  <div class="bg">
    <img id="logo-entrar" src="img/logo_branco.png" alt="Logomarca Conect.Ideias">
    <section class="container container-cadastro">
      <form class="formulario-entrar" action="" method="post">
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