<?php 
$titulo_pagina = "Editar conta";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";

$conn = mysqli_connect("localhost", "root", "", "conect_ideias"); //para fazer a conexão com o banco de dados

$id_usuario = $_SESSION['id_usuario'];

$consulta = "select email, senha from usuarios where id like $id_usuario";//seleciona de onde vc quer tirar os dados

$resultado = mysqli_query($conn, $consulta);//faz a consulta e armazena num array

if(isset($_POST["submit"])){ // comando abaixo significa que só será executado se houver preenchimento do campo submit
	$senha = $_POST["senha"];
	$nova_senha = $_POST["nova_senha"];

	while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		 $row["senha"];
		 if ($senha === $row["senha"]){
		 	if ($nova_senha === $senha || $nova_senha === $row["senha"]){
		 		echo "ESSA JÁ É A SUA SENHA!";
		 	}
		 	else {
		 			$consulta2 = "UPDATE usuarios set senha = '$nova_senha' WHERE id = $id_usuario";
		 			mysqli_query ($conn, $consulta2);
		 			header("location: perfil.php");
		 			exit();
		 	}
		 }
		 else {
		 	echo "SENHA INCORRETA";
		 }	
	}
}	
?>

  <div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="conta.php" method="post">
      	<h3 style="margin-bottom: 30px;">Alterar senha</h3>
        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha" class="senha" placeholder="" required>
        <label for="nova_senha">Nova senha</label>
        <input type="password" name="nova_senha" class="senha" placeholder="" required>
        <a id="myBtn" id="excluir-conta">Excluir conta</a>
        <input class="btn-primario" type="submit" name="submit" value="Salvar">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>

  <!-- The Modal  Delete -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="clearfix"></div>
          <p>Tem certeza que deseja excluir esse projeto?</p>
          <div class="acoes">
      <?php  

      echo "<a href=\"excluir_conta.php\">SIM</a>";
      echo "<a href='#' id='nao'>NÃO</a>"; 
      
      ?>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>

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

<?php require "_footer.php" ?>

