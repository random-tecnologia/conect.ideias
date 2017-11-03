





<?php 

require "db.php";

session_start();

if(isset($_GET['id'])){

	if(isset($_GET['filtro'])){

		$id = $_GET['id'];
		$filtro = $_GET['filtro'];

		if($filtro === 'todos'){

			$consulta = "SELECT id_usuario, tipo_ajuda FROM solicitacoes WHERE id_projeto = $id";
			$result  = mysqli_query($conn,$consulta);
			if(!$result){
				die(mysqli_error());
			}

			while($row = mysqli_fetch_assoc($result)){

				$id_usuario = $row['id_usuario'];
				$tipo_ajuda = $row['tipo_ajuda'];

				$consulta2 = "SELECT nome,email,telefone FROM usuarios WHERE id = $id_usuario";
				$result2 = mysqli_query($conn,$consulta2);
				if(!$result2){
					die(mysqli_error());
				}

				while($row2 = mysqli_fetch_assoc($result2)){

					echo $row2['nome']."</br>";
					echo $row2['email']."</br>";
					echo $row2['telefone']."</br>";
					

				}

				echo $tipo_ajuda."</br>";
				echo "<a href=\"aceitar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Aceitar</a></br>";
				echo "<a href=\"recusar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Recusar</a><hr/>";

			}

		}
		elseif($filtro === 'cria'){

			$consulta = "SELECT id_usuario, tipo_ajuda FROM solicitacoes WHERE id_projeto = $id AND (tipo_ajuda = 'criacao' OR tipo_ajuda = 'todos')";
			$result  = mysqli_query($conn,$consulta);
			if(!$result){
				die(mysqli_error());
			}

			while($row = mysqli_fetch_assoc($result)){

				$id_usuario = $row['id_usuario'];
				$tipo_ajuda = $row['tipo_ajuda'];

				$consulta2 = "SELECT nome,email,telefone FROM usuarios WHERE id = $id_usuario";
				$result2 = mysqli_query($conn,$consulta2);
				if(!$result2){
					die(mysqli_error());
				}

				while($row2 = mysqli_fetch_assoc($result2)){

					echo $row2['nome']."</br>";
					echo $row2['email']."</br>";
					echo $row2['telefone']."</br>";
					

				}

				echo $tipo_ajuda."</br>";
				echo "<a href=\"aceitar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Aceitar</a></br>";
				echo "<a href=\"recusar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Recusar</a><hr/>";

			}


		}
		elseif($filtro === 'consulta'){

			$consulta = "SELECT id_usuario, tipo_ajuda FROM solicitacoes WHERE id_projeto = $id AND (tipo_ajuda = 'consultoria' OR tipo_ajuda = 'todos')";
			$result  = mysqli_query($conn,$consulta);
			if(!$result){
				die(mysqli_error());
			}

			while($row = mysqli_fetch_assoc($result)){

				$id_usuario = $row['id_usuario'];
				$tipo_ajuda = $row['tipo_ajuda'];

				$consulta2 = "SELECT nome,email,telefone FROM usuarios WHERE id = $id_usuario";
				$result2 = mysqli_query($conn,$consulta2);
				if(!$result2){
					die(mysqli_error());
				}

				while($row2 = mysqli_fetch_assoc($result2)){

					echo $row2['nome']."</br>";
					echo $row2['email']."</br>";
					echo $row2['telefone']."</br>";
					

				}

				echo $tipo_ajuda."</br>";
				echo "<a href=\"aceitar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Aceitar</a></br>";
				echo "<a href=\"recusar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Recusar</a><hr/>";

			}
		}





	}

	else{

		$id = $_GET['id'];

		$consulta = "SELECT id_usuario, tipo_ajuda FROM solicitacoes WHERE id_projeto = $id";
			$result  = mysqli_query($conn,$consulta);
			if(!$result){
				die(mysqli_error());
			}

			while($row = mysqli_fetch_assoc($result)){

				$id_usuario = $row['id_usuario'];
				$tipo_ajuda = $row['tipo_ajuda'];

				$consulta2 = "SELECT nome,email,telefone FROM usuarios WHERE id = $id_usuario";
				$result2 = mysqli_query($conn,$consulta2);
				if(!$result2){
					die(mysqli_error());
				}

				while($row2 = mysqli_fetch_assoc($result2)){

					echo $row2['nome']."</br>";
					echo $row2['email']."</br>";
					echo $row2['telefone']."</br>";
					

				}

				echo $tipo_ajuda."</br>";
				echo "<a href=\"aceitar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Aceitar</a></br>";
				echo "<a href=\"recusar_solicitacao.php?id=$id&id_usuario=$id_usuario\">Recusar</a><hr/>";

			}


	}

}
else{
	header('Location: ler_projetos.php');
	exit();
}





?>

<a href="solicitacoes.php?id=<?php echo $id; ?>&filtro=todos">Todos</a>
<a href="solicitacoes.php?id=<?php echo $id; ?>&filtro=cria">Criação</a>
<a href="solicitacoes.php?id=<?=$id;?>&filtro=consulta">Consultoria</a></br>

