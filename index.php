<?php
	session_start();

	if (isset($_SESSION['id_usuario'])) {
		header('Location: meus_projetos.php');
		exit();
	} else {
		header('Location: login.php');
		exit();
	}
?>