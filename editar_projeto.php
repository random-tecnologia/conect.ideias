<?php
$titulo_pagina = "Editar projeto";
require "_header.php";
require 'db.php';

if(isset($_GET['id'])?$_GET['id']:$_POST['id']){
  $id = isset($_GET['id'])?$_GET['id']:$_POST['id'];

  // Checa se o id do projeto existe
  $consulta_id = "SELECT nome FROM projetos WHERE id = $id";
  $result_id = mysqli_query($conexao, $consulta_id) or die(mysqli_error($conexao));
  if (mysqli_num_rows($result_id) == 0) {
    echo "<script>window.history.go(-1)</script>";
  }

  // Checa se o usuário é o dono do projeto
  $consulta_dono = "SELECT id_dono FROM projetos WHERE id = $id";
  $result_dono = mysqli_query($conexao, $consulta_dono) or die(mysqli_error($conexao));

  while ($row = mysqli_fetch_assoc($result_dono)) {
    if ($row['id_dono'] != $_SESSION['id_usuario']) {
      header("Location: descricao.php?id=$id");
    }
  }


  if(isset($_POST['submit']))
  {
    $nome = stripslashes(htmlspecialchars($_POST['nome']));
    $descricao = htmlspecialchars($_POST['descricao']);
    $proximos_passos = htmlspecialchars($_POST['proximos_passos']);
    $palavras_chave = stripslashes(htmlspecialchars($_POST['palavras_chave']));
    $tipo_ajuda = $_POST['tipo_ajuda'];

    $consulta = "UPDATE projetos SET nome='{$nome}',descricao='{$descricao}',proximos_passos='{$proximos_passos}',palavras_chave='{$palavras_chave}', tipo_ajuda='{$tipo_ajuda}' WHERE id = {$id} ";
    $result = mysqli_query($conexao, $consulta);

    if(!$result){
      header('Location: meus_projetos.php');
      exit();
    }

    $consulta_2 = "SELECT id FROM projetos WHERE nome = '$nome' and descricao = '$descricao'and proximos_passos = '$proximos_passos'";
    $result_2 = mysqli_query($conexao,$consulta_2);
    if(!$result_2){
      header('Location: meus_projetos.php');
      exit();
    }

    while($row = mysqli_fetch_assoc($result_2)){
     $id = $row['id']; 
    }
    echo "<script>location.href='descricao.php?id=$id';</script>";
  }
} else {
  header('Location: achar_projeto.php');
  exit();
}

// Pega dados atuais do projeto para usar como placeholder
$consulta_placeholder = mysqli_query($conexao, "SELECT * FROM projetos WHERE id = $id");

while ($row = mysqli_fetch_assoc($consulta_placeholder))
{
  $nome = $row['nome'];
  $descricao = $row['descricao'];
  $proximos_passos = $row['proximos_passos'];
  $palavras_chave = $row['palavras_chave'];
  $tipo_ajuda = $row['tipo_ajuda'];

?>

  <div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="editar_projeto.php" method="post">
        <label for="nome">Nome do projeto</label>
        <input type="text" name="nome" value="<?= $nome; ?>" required>

        <label for="descricao">
          Descrição
          <p>Dê mais detalhes sobre sua ideia.</p>
        </label>
        <textarea name="descricao" class="editor-descricao" required><?= $descricao; ?></textarea>

        <label for="proximos_passos" class="label-proximos">
          Próximos passos
          <p>Dê instruções para sua equipe à respeito do que fazer após serem aceitas no projeto.</p>
        </label>
        <textarea name="proximos_passos" class="editor-proximos" required><?= $proximos_passos; ?></textarea>

        <label for="palavras_chave">Palavras-chave</label>
        <input type="text" name="palavras_chave" value="<?= $palavras_chave; ?>" required="">

        <label for="tipo_ajuda">Tipo de ajuda</label><br>
        <select name="tipo_ajuda" required="">
          <option value="Todos" <?= $tipo_ajuda == "Todos" ? "selected" : "" ?>>Todos</option>
          <option value="Criação" <?= $tipo_ajuda == "Criação" ? "selected" : "" ?>>Criação</option>
          <option value="Consultoria" <?= $tipo_ajuda == "Consultoria" ? "selected" : "" ?>>Consultoria</option>
        </select>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="clearfix"></div>

        <?php

        $consulta_arquivar = "SELECT estado FROM projetos WHERE id= $id";
        $result_arquivar = mysqli_query($conexao,$consulta_arquivar);
        if(!$result_arquivar){
          die('query failed');
        }

        while ($row_arquivar = mysqli_fetch_assoc($result_arquivar)) {
          $estado = $row_arquivar['estado'];

          if($estado == 1){
            echo "<a class=\"arquivar-projeto\" href=\"arquivar_projeto.php?id=$id\">Equipe completa, arquivar projeto!</a>";
          }elseif ($estado == 0){
            echo "<a class=\"arquivar-projeto\" href=\"desarquivar_projeto.php?id=$id\">Desarquivar projeto</a>";    
          }
        }

        ?>
        <div class="clearfix"></div>
        <a id="myBtn">Excluir projeto</a>
        <input class="btn-primario" type="submit" name="submit" value="Salvar">
        <div class="clearfix"></div>
      </form>
    </section>

    <!-- The Modal  Delete -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="clearfix"></div>
          <p>Tem certeza que deseja excluir esse projeto?</p>
          <div class="acoes">
      <?php  

      echo "<a href=\"excluir_projeto.php?id=$id\">SIM</a>";
      echo "<a href='#' id='nao'>NÃO</a>"; 
      
      ?>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>

    </div>

<?php } ?>


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

<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor-descricao' ), {
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
        .create( document.querySelector( '.editor-proximos' ), {
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
