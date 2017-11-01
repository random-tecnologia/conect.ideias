<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conect.Ideias | Cadastro</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
  </head>
<body>
<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","conect_ideias");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes
  $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
  $email = mysqli_real_escape_string($con,$email);
   $query = "SELECT * FROM `usuarios` WHERE email='$email'";
  $result = mysqli_query($con,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows>0){
     echo "<div class='form'>
<h3>E-mail já registrado.</h3>
<br/>Clique aqui para <a href='login.php'>Logar</a>
<br/>Clique aqui pare se <a href='cadastro.php'>Cadastrar</a></div>";
  }else{
  $senha = stripslashes($_REQUEST['senha']);
  $senha = mysqli_real_escape_string($con,$senha);
  $nome = stripslashes($_REQUEST['nome']);
  $nome = mysqli_real_escape_string($con,$nome);
        $query = "INSERT into `usuarios` (nome,senha, email)
VALUES (nome,'".md5($senha)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>Cadastro realizado com sucesso.</h3>
<br/>Clique aqui para <a href='login.php'>Logar</a></div>";
        } }
    }else{
?>
      <form action="cadastro.php" method="post" class="col-md-5">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail" name="email" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
        </div>
        <div class="form-group">
          <label for="nome">Nome Completo</label>
          <input type="text" class="form-control" id="nome" placeholder="Digite seu Nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
</div>
<?php } ?>
</body>
</html>