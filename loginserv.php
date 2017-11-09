<?php
if(isset($_POST['submit'])){
	if(empty($_POST['email']) || empty($_POST['senha'])){
		  echo "<div class='form'>
				<p>E-mail ou Senha incorreto.</p></div>";
	}
	else{
		$login = $_POST['email'];
		$senha = $_POST['senha'];
		$id = $_GET['id'];

		$con = mysqli_connect("localhost","root","","conect_ideias");
		$query = mysqli_query($con, "SELECT * FROM usuarios WHERE senha='".md5($senha)."' AND email='$login'");

		$rows = mysqli_num_rows($query);
		if($rows == 1){
			header("Location: achar_projeto.php");
		}
		else{
			echo "<div class='form'>
				<p>E-mail ou Senha incorreto.</p></div>";
		}
		mysqli_close($con);
	}
}

?>