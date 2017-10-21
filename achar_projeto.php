<?php 
$titulo_pagina = "Achar projeto";
require "_header.php"
?>

<form id="formulario-busca" action="achar_projeto.php" method="post">
      <input id="caixa-busca" type="search" name="busca" placeholder="" required>
      <input id="buscar" class="btn-primario" type="submit" name="submit" value="Buscar">
      <div class="clearfix"></div>
    </form>

<div class="wrapper">
  <section id="heading">
    <h2>Resultados</h2>
    <span>Sua busca retornou 234 resultados</span>
    <div class="filtro">
      <ul>
        <li><a href="#" class="selecionado">Todos</a></li>
        <li><a href="#">Criação</a></li>
        <li><a href="#">Consultoria</a></li>
      </ul>
    </div>
  </section>
  <section id="resultados">
    <article class="container card">
        <h3 class="card-titulo">
          <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
        </h3>
        <p class="card-descricao">
          <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito...</a>
        </p>

      <div id="tags">
        <span><a href="#1">Criação</a></span>
        <span><a href="#2">Consultoria</a></span>
      </div>
      <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
    </article>

    <article class="container card">
        <h3 class="card-titulo">
          <a href="ver_projeto.php">Projeto de DS</a>
        </h3>
        <p class="card-descricao">
          <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito e por isso o projeto tem...</a>
        </p>

      <div id="tags">
        <span><a href="#1">Criação</a></span>
        <span><a href="#2">Consultoria</a></span>
      </div>
      <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
    </article>

    <article class="container card">
        <h3 class="card-titulo">
          <a href="ver_projeto.php">Aplicativo contra a depressão</a>
        </h3>
        <p class="card-descricao">
          <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito...</a>
        </p>

      <div id="tags">
        <span><a href="#1">Criação</a></span>
        <span><a href="#2">Consultoria</a></span>
      </div>
      <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
    </article>

    <article class="container card">
        <h3 class="card-titulo">
          <a href="ver_projeto.php">Projeto de DIAC</a>
        </h3>
        <p class="card-descricao">
          <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito e por isso o projeto tem uma data de entrega que vai fazer todos...</a>
        </p>

      <div id="tags">
        <span><a href="#1">Criação</a></span>
        <span><a href="#2">Consultoria</a></span>
      </div>
      <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
    </article>

    <article class="container card">
        <h3 class="card-titulo">
          <a href="ver_projeto.php">Novo carro de corrida para competições nacionais do próximo ano</a>
        </h3>
        <p class="card-descricao">
          <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, com todo o preconceito...</a>
        </p>

      <div id="tags">
        <span><a href="#1">Criação</a></span>
        <span><a href="#2">Consultoria</a></span>
      </div>
      <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
    </article>

<?php require "_footer.php" ?>
