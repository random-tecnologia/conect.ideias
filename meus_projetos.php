<?php 
    $titulo_pagina = "Meus projetos";
    require "_header.php";
?>

<div class="wrapper">
    <section class="heading" id="heading-meus-projetos">
        <h2>Meus projetos</h2>
        <div class="filtro" id="filtro-meus-projetos">
          <ul>
            <li><a href="#" class="selecionado">Todos</a></li>
            <li><a href="#">Criados por mim</a></li>
            <li><a href="#">Participando</a></li>
          </ul>
        </div>
    </section>

    <section id="resultados">
        <article class="container card">
            <h3 class="card-titulo">
              <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito e testando Agora é com você.</a>
            </p>

          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
        </article>

        <article class="container card">
            <h3 class="card-titulo">
              <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito e testando Agora é com você.</a>
            </p>

          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
        </article>
    </section>

<?php require "_footer.php" ?>