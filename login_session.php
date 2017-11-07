<?php 
require "db.php";
session_start();
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$verifica = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
	$result = mysqli_query($conn,$verifica);
	if(!$result){
		die("query failed");
	}
while ($row = mysqli_fetch_assoc($result)) {
		$id_usuario = $row['id'];
		if(!isset($_SESSION['id_usuario'])){
		$_SESSION['id_usuario'] = $id_usuario;
		}
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login teste</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="post" action="login_session.php">
		<input type="email" name="email" required><br/>
		<input type="password" name="senha" required><br/>
		<input type="submit" name="submit" value="Enviar">
	</form>

</body>
</html>
