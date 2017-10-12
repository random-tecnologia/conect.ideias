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
        <form class="formulario-entrar" action="" method="post">
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