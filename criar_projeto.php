<?php
require "_parsedown.php";
$Parsedown = new Parsedown();

if (isset($_POST["submit"])) {
$descricao = $Parsedown->text($_POST["descricao"]);
}

$titulo_pagina = "Criar projeto";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php"; 

require "db.php";
session_start();

if(isset($_POST['submit']))
{
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$proximos_passos = $_POST['proximos_passos'];
	$palavras_chave = $_POST['palavras_chave'];
	$tipo_ajuda = $_POST['tipo_ajuda'];
	$criado_em = date("d/m/Y");
	$id_dono = $_SESSION['id_usuario'];
	
	$consulta = "INSERT INTO projetos (nome, descricao, proximos_passos, estado, palavras_chave, tipo_ajuda, criado_em, id_dono) VALUES ('$nome', '$descricao', '$proximos_passos', 1, '$palavras_chave', '$tipo_ajuda', '$criado_em',$id_dono)";

	$result = mysqli_query($conexao, $consulta);
	if(!$result){
		die(mysql_error());
	}

	$consulta_2 = "SELECT id FROM projetos WHERE nome = '$nome' and descricao = '$descricao' and proximos_passos = '$proximos_passos'";
	$result_2 = mysqli_query($conexao,$consulta_2);
	if(!$result_2){
		die('Query failed');
	}
	while($row = mysqli_fetch_assoc($result_2)){
		$id = $row['id']; 
		echo "<script>location.href='descricao.php?id=$id';</script>";
	}
}

?>


  <div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="criar_projeto.php" method="post">
        <label for="nome">Nome do projeto</label>
        <input type="text" name="nome" required>

        <label for="descricao">
          Descrição
          <p>Dê mais detalhes sobre sua ideia.</p>
        </label>
        <textarea name="descricao" required></textarea>
        <p class="dica">Você pode estilizar seu texto usando markdown, para saber mais sobre markdown <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">clique aqui</a>.</p>

        <label for="proximos_passos">
          Próximos passos
          <p>Dê instruções para as pessoas depois que forem aceitas no projeto.</p>
        </label>
        <textarea name="proximos_passos" required></textarea>
        <p class="dica">Você pode estilizar seu texto usando markdown, para saber mais sobre markdown <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">clique aqui</a>.</p>

        <label for="palavras_chave">Palavras-chave</label>
        <input type="text" name="palavras_chave" required="">

        <label for="tipo_ajuda">Tipo de ajuda</label><br>
        <select name="tipo_ajuda" required="">
          <option value="Todos">Todos</option>
          <option value="Criação">Criação</option>
          <option value="Consultoria">Consultoria</option>
        </select>
        <input type="hidden" name="id">
        <div class="clearfix"></div>
        <input class="btn-primario" type="submit" name="submit" value="Criar">
        <div class="clearfix"></div>
      </form>
    </section>

<?php require "_footer.php"; ?>