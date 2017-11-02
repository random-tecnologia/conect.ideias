<?php

require 'db.php';

session_start();

if(isset($_GET['id'])?$_GET['id']:$_POST['id']){
$id = isset($_GET['id'])?$_GET['id']:$_POST['id'];

if(isset($_POST['submit'])){

	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$proximos_passos = $_POST['proximos_passos'];
	$quantidade_max = $_POST['quantidade_max'];
	$palavras_chave = $_POST['palavras_chave'];
	$tipo_ajuda = $_POST['tipo_ajuda'];

	$consulta = "UPDATE projetos SET nome='{$nome}',descricao='{$descricao}',proximos_passos='{$proximos_passos}',palavras_chave='{$palavras_chave}' WHERE id = {$id} "; 
	

	$result = mysqli_query($conn, $consulta);
		if(!$result){
			header('Location: ler_projetos.php');
			exit();
		}

	$consulta_2 = "SELECT id FROM projetos WHERE nome = '$nome' and descricao = '$descricao'and proximos_passos = '$proximos_passos' and quantidade_max = '$quantidade_max'";
	$result_2 = mysqli_query($conn,$consulta_2);
	if(!$result_2){
		header('Location: ler_projetos.php');
		exit();
	}

	while($row = mysqli_fetch_assoc($result_2)){
   $id = $row['id']; 
}

echo "<script>location.href='ver_projeto.php?id=$id';</script>";


}
}else {
	header('Location: ler_projetos.php');
	exit();
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar projeto</title>
	<meta charset="utf-8">
	<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 30px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


</style>

</head>
<body>

		
	<form method="post" action="editar_projeto.php">
		<input type="text" name="nome" required><br/>
		<textarea name="descricao" required></textarea><br/>
		<textarea name="proximos_passos" required></textarea><br/>
		<input type="number" name="quantidade_max" required><br/>
		<input type="text" name="palavras_chave" required><br/>
		<select name="tipo_ajuda" required>
			<option value="todos">Todos</option>
			<option value="criacao">Criação</option>
			<option value="consultoria">Consultoria</option>
		</select>
		<input type="hidden" name="id" value="<?php echo $id?>">
		<input type="submit" name="submit" value="Enviar">
	</form>

<div>	
	<!-- Trigger/Open The Modal -->
	<button id="myBtn">Deletar Projeto</button>

	<!-- The Modal  Delete -->
	<div id="myModal" class="modal">

  		<!-- Modal content -->
  		<div class="modal-content">
   		 <span class="close">&times;</span>
    	<p>Tem certeza Que deseja deletar esse projeto?</p>
    <?php  

		echo "<a href=\"delete_meu_projeto.php?id=$id\">Sim</a></br>";
		echo "<a href='#' id='nao'>Nao</a>"; 
    
    ?>
   
    	</div>

	</div>

	
 	
 

</div>
<div>
	<?php 
	$id = $_GET['id'];
	$consulta_arquivar = "SELECT estado FROM projetos WHERE id= $id";
	$result_arquivar = mysqli_query($conn,$consulta_arquivar);
	if(!$result_arquivar){
		die('query failed');
	}

	while ($row_arquivar = mysqli_fetch_assoc($result_arquivar)) {
		$estado = $row_arquivar['estado'];

		if($estado == 1){
			echo "<a href=\"arquivar_meu_projeto.php?id=$id\">Arquivar projeto</a>";
		}elseif ($estado == 0) {
			echo "<a href=\"desarquivar_meu_projeto.php?id=$id\">Desarquivar projeto</a>";		
		}	


	}

	

	?>


</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that opens the modal
var nao = document.getElementById("nao");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
nao.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>


</body>
</html>

