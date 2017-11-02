

<form method="post" action="ver_meus_projetos.php">
		<select name="filtro" required>
			<option value="todos">Todos</option>
			<option value="criados">Criados</option>
			<option value="participa">Participando</option>
			<option value="solicita">Solicitados</option>
		</select>
		<input type="submit" name="submit" value="Procurar">
	</form>


<?php  

require "db.php";

session_start();

if(isset($_POST['submit'])){

	$filtro = $_POST['filtro'];
	$id_dono = $_SESSION['id_usuario'];
	$id_usuario = $id_dono;

	//MOSTRAR TODOS OS PROJETOS

	if($filtro === 'todos'){

		// PROJETOS CRIADOS

		$consulta = "SELECT * FROM projetos WHERE id_dono = $id_dono";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id = $row['id'];

			echo $row['nome']."<br/>";
			echo $row['descricao']."<br/>";
			echo $row['tipo_ajuda']."<br/>";
			echo $row['palavras_chave']."<br/>";

			echo "<a href=\"ver_projeto.php?id=$id\">Ver projeto</a><hr/>";

		}

		// PROJETOS PARTICIPANDO

		$consulta = "SELECT id_projeto FROM usuarios_projetos WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conn,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2)){

				echo $row2['nome']."<br/>";
				echo $row2['descricao']."<br/>";
				echo $row2['tipo_ajuda']."<br/>";
				echo $row2['palavras_chave']."<br/>";
				echo "<a href=\"ver_projeto.php?id=$id_projeto\">Ver projeto</a><hr/>";

			}

		}

		//PROJETOS SOLICITADOS

		$consulta = "SELECT id_projeto FROM solicitacoes WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conn,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2)){

				echo $row2['nome']."<br/>";
				echo $row2['descricao']."<br/>";
				echo $row2['tipo_ajuda']."<br/>";
				echo $row2['palavras_chave']."<br/>";

				echo "<a href=\"ver_projeto.php?id=$id_projeto\">Ver projeto</a><hr/>";

			}

		}

	}

	//MOSTRAR CRIADOS

	elseif ($filtro === 'criados') {

		$consulta = "SELECT * FROM projetos WHERE id_dono = $id_dono";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id = $row['id'];

			echo $row['nome']."<br/>";
			echo $row['descricao']."<br/>";
			echo $row['tipo_ajuda']."<br/>";
			echo $row['palavras_chave']."<br/>";

			echo "<a href=\"ver_projeto.php?id=$id\">Ver projeto</a><hr/>";

		}
		
	}

	//MOSTRAT PROJETOS QUE PARTICIPA

	elseif ($filtro === 'participa') {

		$consulta = "SELECT id_projeto FROM usuarios_projetos WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conn,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2)){

				echo $row2['nome']."<br/>";
				echo $row2['descricao']."<br/>";
				echo $row2['tipo_ajuda']."<br/>";
				echo $row2['palavras_chave']."<br/>";
				echo "<a href=\"ver_projeto.php?id=$id_projeto\">Ver projeto</a><hr/>";

			}

		}

	}

	//MOSTRAR PROJETOS QUE SOLICITOU

	elseif ($filtro ==='solicita') {
		
		$consulta = "SELECT id_projeto FROM solicitacoes WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conn,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conn,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2)){

				echo $row2['nome']."<br/>";
				echo $row2['descricao']."<br/>";
				echo $row2['tipo_ajuda']."<br/>";
				echo $row2['palavras_chave']."<br/>";

				echo "<a href=\"ver_projeto.php?id=$id_projeto\">Ver projeto</a><hr/>";

			}

		}
	
	}

}

//MOSTRAR PADRAO

else{

echo "OLA MUNDO";

}




?>
	