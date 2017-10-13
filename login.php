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
<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","conect_ideias");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
  $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
  $email = mysqli_real_escape_string($con,$email);
  $senha = stripslashes($_REQUEST['senha']);
  $senha = mysqli_real_escape_string($con,$senha);
  //Checking is user existing in the database or not
        $query = "SELECT * FROM `usuarios` WHERE email='$email'and senha='".md5($senha)."'";
  $result = mysqli_query($con,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['email'] = $email;
            // Redirect user to index.php
      header("#");
         }else{
  echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
  }
    }else{
?>
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
        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="cadastro.php" class="btn btn-secondary">Cadastre-se</a>
      </form>
  </div>
</div>
<?php } ?>
</body>
</html>