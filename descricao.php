<?php 
$titulo_pagina = "Projeto de Desenvolvimento de Software";
$nome_arquivo = basename(__FILE__, ".php");
require "_projeto.php";
?>

<section class="container-texto">
  <div class="wrapper">
    <h2>Descrição</h2>

		<?php
		if(isset($_GET['id'])){

			$id = $_GET['id'];
			$consulta = "SELECT descricao FROM projetos WHERE id = $id";							
			$result = mysqli_query($conexao,$consulta) or die(mysqli_error());

			while($row = mysqli_fetch_assoc($result)){
				echo $row['descricao'];
			}

		}else{
			echo "<script>window.history.go(-1)</script>";
			exit();
		}
		?>

  </div>
</section>
<?php require "_footer.php" ?>