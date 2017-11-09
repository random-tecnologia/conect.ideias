<?php
include("loginserv.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conect.Ideias | Login</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
  </head>
<body>
 <div class="container">
      <form action="" method="post" class="col-md-5">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail" name="email" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
        </div>
        <a href="#">Esqueci a senha</a><br>
        <button type="submit" class="btn btn-primary" name="submit">Entrar</button>
        <a href="cadastro.php" class="btn btn-secondary">Cadastre-se</a>
      </form>
  </div>
</div>
</body>
</html>