<?php 
$titulo_pagina = "Projeto de Desenvolvimento de Software";
$nome_arquivo = basename(__FILE__, ".php");
require "_projeto.php";
?>

<section class="container-texto">
  <div class="wrapper">
    <h2>Próximos passos</h2>

		<?php


		if(isset($_GET['id'])){

			$id = $_GET['id'];

			$consulta = "SELECT id_usuario FROM usuarios_projetos WHERE id_projeto = $id";
							
			$result = mysqli_query($conexao,$consulta);

			if(!$result){
				die(mysqli_error());
			}

			$participa = FALSE;

			while($row = mysqli_fetch_assoc($result)){

				if($row['id_usuario']==$_SESSION['id_usuario']){

					$participa = TRUE;
				}
			}

			$verifica = "SELECT id_dono, proximos_passos FROM projetos WHERE id = $id";

			$resultado = mysqli_query($conexao,$verifica);

			if(!$resultado){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($resultado)){
				$id_dono = $row2['id_dono'];

				if($participa OR $id_dono==$_SESSION['id_usuario']){
					echo $row2['proximos_passos'];
				}

			}

		}else{
			echo "<script>window.history.go(-1)</script>";
			exit();
		}
		?>

  </div>
</section>
<?php require "_footer.php" ?>