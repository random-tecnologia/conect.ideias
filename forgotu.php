<?php 
session_start();

$con = mysqli_connect("localhost","root","", "conect_ideias");

if(!$con) {
	die("Trouble connecting");
}

if(isset($_POST['recovery'])) {
	$dql="SELECT * FROM usuarios WHERE email='".$_POST['email']."'";
	$dqlq=mysqli_query($con,$dql);
	if(!empty($_POST['email']) && mysqli_fetch_assoc($dqlq)>0 && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)== FALSE) {
		$_SESSION['info']=$_POST['email'];
		header("location:info.php");
	}
	if(empty($_POST['email'])) {
		$ree="Qual é o seu email?";
	}
	elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)== TRUE){
		$ree="Email invalido";
	}
	elseif(mysqli_fetch_assoc($dqlq)<1){
		$ree="Esse email não existe";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recuperação de senha</title>
</head>
<body>
<form action="forgotu.php" method="post">
	<input type="text" name="email" placeholder="Email"><span> * </span>
	<input type="submit" name="recovery" value="Recover">
</form>
</body>
</html>