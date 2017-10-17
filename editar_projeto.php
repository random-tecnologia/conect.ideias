<?php

require 'db.php';


$id = isset($_GET['id'])?$_GET['id']:$_POST['id'];

if(isset($_POST['submit'])){
		
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$proximos_passos = $_POST['proximos_passos'];
	$palavras_chave = $_POST['palavras_chave'];

	$consulta = "UPDATE projetos SET nome='{$nome}',descricao='{$descricao}',proximos_passos='{$proximos_passos}',palavras_chave='{$palavras_chave}' WHERE id = {$id} "; 
	

	$result = mysqli_query($conn, $consulta);
		if(!$result){
		die('query failed');
		}




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
		<input type="text" name="palavras_chave" required><br/>
		<input type="hidden" name="id" value="<?php echo $id?>">
		<input type="submit" name="submit" value="Atualizar">

		
		

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

		echo "<a href=\"delete_projeto.php?id=$id\">Sim</a></br>";
		echo "<a href=\"editar_projeto.php?id=$id\">Nao</a>"; 
    
    ?>
   
    	</div>

	</div>

	
 	
 

</div>
<div>
	<?php 
	echo "<a href=\"arquivar_projeto.php?id=$id\">Arquivar projeto</a>";

	?>
</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

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

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>


</body>
</html>

