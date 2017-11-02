<?php
  require "_parsedown.php";
  $Parsedown = new Parsedown();

  if (isset($_POST["submit"])) {
    $descricao = $Parsedown->text($_POST["descricao"]);
  }

  $titulo_pagina = "Editar perfil";
  $nome_arquivo = basename(__FILE__, ".php");
  require "_header.php"; 
?>

<div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
<div class="wrapper">
  <section class="container container-editar">
    <form id="formulario-editar" action="editar_perfil.php" method="post" enctype="multipart/form-data">
      <label for="nome">Nome</label>
      <input type="text" name="nome" placeholder="" required>
      <label for="descricao">
        Descrição
        <p>Dê mais detalhes sobre você para que possam te escolher.</p>
      </label>
      <textarea id="descricao" name="descricao" required></textarea>
      <p id="dica">Você pode estilizar seu texto usando markdown, para saber mais sobre markdown <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">clique aqui</a>.</p>
      <label for="avatar">Avatar</label>
      <input type="file" name="avatar" class="inputfile" required>
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" placeholder="" required="">
      <input class="btn-primario" type="submit" name="submit" value="Salvar">
      <div class="clearfix"></div>
    </form>
  </section>
</div>

<?php require "_footer.php"; ?>