<?php 
    $titulo_pagina = "Achar projeto";
    require "_header.php";
?>

<form id="formulario-busca" action="achar_projeto.php" method="get">
      <input id="caixa-busca" type="search" name="buscaproj" placeholder="" required>
      <input id="buscar" class="btn-primario" type="submit" name="submit" value="Buscar">
      <div class="clearfix"></div>
</form>

<?php
require "db.php";

//*Buscar projetos
$buscar_projeto = isset($_GET['buscaproj'])?($_GET['buscaproj']):0;
if($buscar_projeto){
    $resultado_proj = mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%'");
    $row = mysqli_num_rows($resultado_proj);
    if($row==0){
        echo "<div style='text-align:center; color:white; width:100%'>Nenhum resultado encontrado!!!</div>";
    } else {  
        while($linha = mysqli_fetch_array($resultado_proj)){
          $nome_proj = $linha['nome'];
          $descricao_proj = $linha['descricao'];
?>

<div class="wrapper">
    <section id="heading">
        <h2>Resultados</h2>
        <span>Sua busca retornou <?= $row ?> resultado<?= ($row > 1) ? "s" : ""; ?></span>
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
              <a href="ver_projeto.php"><?= $nome_proj ?></a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php"><?= $descricao_proj ?></a>
            </p>

          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="saiba-mais" href="ver_projeto.php">SAIBA MAIS</a>
        </article>
    </section>

<?php
      }
    }
  }
  //*Fim da Busca de projetos
?>

<?php require "_footer.php" ?>