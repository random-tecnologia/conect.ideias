<?php 

require 'db.php';

session_start();// starta a session

if(isset($_GET['id'])){
	$id = $_GET['id'];

// mostra nome , descriçao , tipo de ajuda e palavras chaves dos projetos
$consulta = "SELECT * FROM projetos WHERE id =$id ";

$result = mysqli_query($conn, $consulta);
	if(!$result){
		header('Location: ler_projetos.php');
		exit();
	}

while ($row = mysqli_fetch_assoc($result)) {
			$id_2 = $row['id'];
			echo $row['nome']."<br/>";
			echo $row['descricao']."<br/>";
			echo $row['tipo_ajuda']."</br>";
			//echo $row['proximos_passos']."<br/>";
			echo $row['palavras_chave']."<br/>";
			$estado = $row['estado'];
			$id_dono = $row['id_dono'];
			if($estado != 1){
				echo "Projeto Arquivado"."<br/>";
			}

			// verifica se o usuario e dono do projeto 
			if($id_dono==$_SESSION['id_usuario']){
				echo "<a href=\"editar_projeto.php?id=$id\">Editar projeto</a>"."</br>";
				echo "<a href=\"proximos_passos.php?id=$id\">Proximos Passos</a>"."</br>";
				
				// mostrar equipe 
				
				echo "<a href=\"equipe.php?id=$id\">Ver Equipe</a></br>";

				// mostrar solicitacoes

				echo "<a href=\"solicitacoes.php?id=$id\">Ver solicitaçoes</a><hr/>";

			}else{
				$consulta = "SELECT id_usuario FROM usuarios_projetos WHERE id_projeto = $id";
				$result = mysqli_query($conn,$consulta);
				if(!$result){
					die(mysqli_error());
				}
				$participa = FALSE;
				while($row = mysqli_fetch_assoc($result)){

					if($row['id_usuario']==$_SESSION['id_usuario']){

						$participa = TRUE;
					}
				}

				// verifica se o usuario participa do projeto
				if($participa){
				
				echo "<a href=\"proximos_passos.php?id=$id\">Proximos Passos</a>"."</br>";
				echo "<a href=\"sair_do_projeto.php?id=$id\">Sair do projeto</a><hr/>";

				
				}else{

					$consulta = "SELECT id_usuario FROM solicitacoes WHERE id_projeto = $id";
					$result = mysqli_query($conn,$consulta);
				
					if(!$result){
					die(mysqli_error());
					}
					$solicitou = FALSE;

					while($row = mysqli_fetch_assoc($result)){

						if($row['id_usuario']==$_SESSION['id_usuario']){

						$solicitou = TRUE;
						}
					}

					// verifica se o usuario solicitou acesso ao projeto
					
					if($solicitou){
						echo "<a href=\"cancelar_solicitacao.php?id=$id\">Cancelar solicitaçao</a><hr/>";
					}else{
						?>
						

						<form method="post" action="solicitar.php">
						<select name="tipo_ajuda" required>
						<option value="todos">Todos</option>
						<option value="criacao">Criação</option>
						<option value="consultoria">Consultoria</option>
						</select>
						<input type="hidden" name="id" value="<?php echo $id?>">
						<input type="submit" name="submit" value="Solicitar acesso">
						</form>


						<?php

						
					}

				}
			}
	}
}else{
	header('Location: ler_projetos.php');
	exit();
}







?>