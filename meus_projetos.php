<?php 
$titulo_pagina = "Meus projetos";
$nome_arquivo = basename(__FILE__, ".php");
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
            <li><a href="#">Criação</a></li>
            <li><a href="#">Consultoria</a></li>
          </ul>
        </div>
    </section>

    <section id="resultados">
        <article class="container card card-dono">
            <h3 class="card-titulo">
              <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, agora é com você.</a>
              <a class="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
            </p>
          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="acao" href="editar_projeto.php"><button id="btn-editar-projetos" class="btn-secundario"><i class="ion-edit"></i>Editar</button></a>
        </article>
        
        <article class="container card card-dono">
            <h3 class="card-titulo">
              <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, agora é com você.</a>
              <a class="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
            </p>
          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="acao" href="editar_projeto.php"><button class="btn-secundario"><i class="ion-edit"></i>Editar</button></a>
        </article>

        <div id="arquivado">
          <article class="container card card-dono">
              <h3 class="card-titulo">
                <a href="ver_projeto.php">Projeto de Desenvolvimento de Software</a>
              </h3>
              <p class="card-descricao">
                <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, agora é com você.</a>
                <a class="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
              </p>
            <div id="tags">
              <span><a href="#1">Criação</a></span>
              <span><a href="#2">Consultoria</a></span>
            </div>
            <a id="acao" href="editar_projeto.php"><button class="btn-secundario btn-desarquivar"><i class="ion-android-archive"></i>Desarquivar</button></a>
          </article>
        </div>

        <article class="container card card-dono">
            <h3 class="card-titulo">
              <a href="ver_projeto.php">Projeto de DS</a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php">Estou procurando alunos da disciplina de DS para criar um app inovador que vai mudar a forma como nossos colegas nos vêem, agora é com você.</a>
              <a class="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
            </p>
          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="acao" href="editar_projeto.php"><button class="btn-secundario"><i class="ion-edit"></i>Editar</button></a>
        </article>

    </section>

<?php require "_footer.php" ?>