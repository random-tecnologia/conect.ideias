<?php
$titulo_pagina = "Criar projeto";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php"; 

require "db.php";

if(isset($_POST['submit']))
{
	$nome = stripslashes(htmlspecialchars($_POST['nome']));
	$descricao = htmlspecialchars($_POST['descricao']);
	$proximos_passos = htmlspecialchars($_POST['proximos_passos']);
	$palavras_chave = stripslashes(htmlspecialchars($_POST['palavras_chave']));
	$tipo_ajuda = $_POST['tipo_ajuda'];
	$criado_em = date("Y-m-d");
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
        <textarea name="descricao" class="criar-descricao"></textarea>

        <label for="proximos_passos" class="label-proximos">
          Próximos passos
          <p>Dê instruções para sua equipe à respeito do que fazer após serem aceitas no projeto.</p>
        </label>
        <textarea name="proximos_passos" class="criar-proximos"></textarea>

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


<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.criar-descricao' ), {
            heading: {
                options: [
                    { modelElement: 'paragraph', title: 'Parágrafo', class: 'ck-heading_paragraph' },
                    { modelElement: 'heading1', viewElement: 'h3', title: 'Cabeçalho 1', class: 'ck-heading_heading1' },
                    { modelElement: 'heading2', viewElement: 'h4', title: 'Cabeçalho 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '.criar-proximos' ), {
            heading: {
                options: [
                    { modelElement: 'paragraph', title: 'Parágrafo', class: 'ck-heading_paragraph' },
                    { modelElement: 'heading1', viewElement: 'h3', title: 'Cabeçalho 1', class: 'ck-heading_heading1' },
                    { modelElement: 'heading2', viewElement: 'h4', title: 'Cabeçalho 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php require "_footer.php"; ?>