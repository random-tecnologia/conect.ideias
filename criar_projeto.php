<?php
  require "_parsedown.php";
  $Parsedown = new Parsedown();

  if (isset($_POST["submit"])) {
    $descricao = $Parsedown->text($_POST["descricao"]);
  }

  $titulo_pagina = "Criar projeto";
  require "_header.php"; 
?>

<div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
<div class="wrapper">
  <section class="container container-editar">
    <form id="formulario-editar" action="criar_projeto.php" method="post">
      <label for="nome">Nome do projeto</label>
      <input type="text" name="nome" placeholder="" required>

      <label for="descricao">
        Descrição
        <p>Dê mais detalhes sobre sua ideia.</p>
      </label>
      <textarea name="descricao" required></textarea>
      <p class="dica">Você pode estilizar seu texto usando markdown, para saber mais sobre markdown <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">clique aqui</a>.</p>

      <label for="proximos-passos">
        Próximos passos
        <p>Dê instruções para as pessoas depois que forem aceitas no projeto.</p>
      </label>
      <textarea name="proximos-passos" required></textarea>
      <p class="dica">Você pode estilizar seu texto usando markdown, para saber mais sobre markdown <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">clique aqui</a>.</p>

      <label for="tags">Tags</label>
      <input type="text" name="tags" required="">

      <label for="tipo-ajuda">Tipo de ajuda</label><br>
      <select name="tipo-ajuda" required="">
        <option value="todos">Todos</option>
        <option value="criacao">Criação</option>
        <option value="todos">Consultoria</option>
      </select>
      <div class="clearfix"></div>

      <input class="btn-primario" type="submit" name="submit" value="Criar">
      <div class="clearfix"></div>
    </form>
  </section>
</div>

<?php require "_footer.php"; ?>