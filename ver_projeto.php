<?php 

require 'db.php';

session_start();// starta a session

if(isset($_GET['id'])){
	$id = $_GET['id'];

// mostra nome , descriçao , tipo de ajuda e palavras chaves dos projetos
$consulta = "SELECT * FROM projetos WHERE id =$id ";

$result = mysqli_query($conn, $consulta);
	if(!$result){
		die('ERROR Volte Para a Pagina Principal');
	}

while ($row = mysqli_fetch_assoc($result)) {
			$id_2 = $row['id'];
			echo $row['nome']."<br/>";
			echo $row['descricao']."<br/>";
			echo $row['tipo_ajuda'];
			echo $row['proximos_passos']."<br/>";
			echo $row['palavras_chave']."<br/>";
			$estado = $row['estado'];
			$id_dono = $row['id_dono'];
			if($estado != 1){
				echo "Projeto Arquivado"."<br/>";
			}

			// verifica se o usuario e dono do projeto 
			if($id_dono==$_SESSION['id_usuario']){
				echo "<a href=\"editar_projeto.php?id=$id\">Editar projeto</a>"."</br>";
				echo "<a href=\"proximos_passos.php?id=$id\">Proximos Passos</a><hr/>";
				// mostrar equipe e solicitaçoes
				$consulta = "SELECT nome, email, telefone FROM usuarios WHERE id_projeto = $id";
				$result = mysqli_query($conn,$consulta);
				
				if(!$result){
					die(mysqli_error());
				}
				
				while($row = mysqli_fetch_assoc($result)){

					}



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
				
				echo "<a href=\"proximos_passos.php?id=$id\">Proximos Passos</a><hr/>";

				
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
						echo "<a href=\"#\">Cancelar solicitaçao</a><hr/>";
					}else{
						echo "<a href=\"#\">Solicitar acesso</a><hr/>";
					}

				}
			}
	}
}else{
	header('Location: ler_meus_projetos.php');
	exit();
}







?>