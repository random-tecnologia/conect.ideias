<?php 
    $titulo_pagina = "Achar projeto";
    $nome_arquivo = basename(__FILE__, ".php");
    require "_header.php";
?>

<form id="formulario-busca" action="achar_projeto.php" method="get">
      <input id="caixa-busca" type="search" name="buscaproj" placeholder="" required>
      <input id="buscar" class="btn-primario" type="submit" name="submit" value="Buscar">
      <div class="clearfix"></div>
</form>

<?php

if (!isset($_GET['buscaproj'])) { 
  $filtro_proj = isset($_GET['filtro']) ? $_GET['filtro'] : "todos";
  $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
  $resultado_proj = mysqli_query($conexao,"SELECT * FROM projetos");
    
  //Limitar itens(Projetos) por pagina
  $num_itens_pagina = 9;
  $inicio=($num_itens_pagina*$pagina)-$num_itens_pagina;
  
  //filtragem de resultados encontrados
  if($filtro_proj=="todos"){
    $row = mysqli_num_rows($resultado_proj);
    $resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos ORDER BY criado_em DESC limit $inicio, $num_itens_pagina");
  }else{
    $verificar_filtro=mysqli_query($conexao,"SELECT * FROM projetos WHERE tipo_ajuda LIKE '%$filtro_proj%' OR tipo_ajuda LIKE 'Todos' ORDER BY criado_em DESC");
    $row=mysqli_num_rows($verificar_filtro);
    $resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos WHERE tipo_ajuda LIKE '%$filtro_proj%' OR tipo_ajuda LIKE 'Todos' ORDER BY criado_em DESC limit $inicio, $num_itens_pagina");
  }
  $total_paginas=ceil($row/$num_itens_pagina);
?>
<div class="wrapper">
      <section class="heading">
        <h2>Projetos recentes</h2>
        <div class="filtro">
          <ul>
            <li><a href="achar_projeto.php?filtro=todos" <?php if($filtro_proj=="todos"){echo 'class="selecionado"';}?> >Todos</a></li>
            <li><a href="achar_projeto.php?filtro=criação" <?php if($filtro_proj=="criação"){echo 'class="selecionado"';}?> >Criação</a></li>
            <li><a href="achar_projeto.php?filtro=consultoria" <?php if($filtro_proj=="consultoria"){echo 'class="selecionado"';}?>>Consultoria</a></li>
          </ul>
        </div>
      </section>
      <section id="resultados">
  <?php
    
    //procurar busca no banco de dados e filtragem simples pelos botoes "criação e consultoria".
        while(($linha = mysqli_fetch_array($resultado_proj_pagina))){
          $nome_proj = $linha['nome'];
          $descricao_proj = strip_tags($linha['descricao']);
          $id_proj=$linha['id'];
          $tipo_ajuda = $linha['tipo_ajuda'];
          $limite_texto = 200;
          if (strlen($descricao_proj) > $limite_texto){
            $pos_ultimo_espaço = strpos($descricao_proj, ' ', $limite_texto);
            $descricao_proj = substr($descricao_proj, 0, $pos_ultimo_espaço)."...";
          }
?>
        <article class="container card">
            <h3 class="card-titulo">
              <a href="descricao.php?id=<?php echo $id_proj; ?>"><?= $nome_proj ?></a>
            </h3>
            <p class="card-descricao">
              <a href="descricao.php?id=<?php echo $id_proj; ?>"><?= $descricao_proj; ?></a>
            </p>

          <div id="tags">
            <?php if ($tipo_ajuda == "Todos") { ?>
              <span><a href="#1">Criação</a></span>
              <span><a href="#2">Consultoria</a></span>
            <?php } else { ?>
              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
          </div>
          <a class="saiba-mais" href="descricao.php?id=<?php echo $id_proj; ?>">SAIBA MAIS</a>
        </article>
<?php
      }
?>
  </section>

    <?php 
    if($total_paginas){
      //*Fim da Busca de projetos
    $pagina_anterior = $pagina - 1;
    $pagina_posterior = $pagina + 1;
  ?>
    <nav class="menu-paginacao">
      <ul>
      
        <li>
          <?php 
            //Mostrar botao pagina anterior
            if($pagina_anterior!=0){ 
          ?>
            <a href="achar_projeto.php?pagina=<?php echo $pagina_anterior; ?>&filtro=<?php echo $filtro_proj;?>" aria-label="Previous">
              <span class="true" aria-hidden="true">&laquo; Página anterior</span>
            </a>
          <?php }else{ ?>
            <span class="false" aria-hidden="true">&laquo; Página anterior</span>
          <?php } ?>
        </li>
        
        <?php
        //Mostrar numero de paginas
          for($i=1; $i<$total_paginas+1;$i++){ ?>
        <li <?php if($i==$pagina){echo 'class="pagina-atual"';}?>>
          <a  href="achar_projeto.php?pagina=<?php echo $i; ?>&filtro=<?php echo $filtro_proj;?>"><?php echo $i; ?></a>
        </li>
        
        <?php } ?>  
        <li>
          <?php
            //Mostrar pagina posterior
            if($pagina_posterior <= $total_paginas){ 
          ?>
          <a href="achar_projeto.php?pagina=<?php echo $pagina_posterior; ?>&filtro=<?php echo $filtro_proj;?>" aria-label="Previous">
            <span class="true" aria-hidden="true">Próxima página &raquo;</span>
          </a>
          <?php 
            }else{ 
          ?>
            <span class="false" aria-hidden="true">Próxima página &raquo;</span>
          <?php }  ?>
        </li>
      </ul>
    </nav>
    <?php } ?>
  
<?php
} else {

//*Buscar projetos
  $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
  $buscar_projeto = isset($_GET['buscaproj'])?stripslashes(htmlspecialchars($_GET['buscaproj'])):0;  
  $filtro_proj=(isset($_GET['filtro']))?($_GET['filtro']):"todos";
  $resultado_proj = mysqli_query($conexao,"SELECT * FROM projetos WHERE (nome LIKE '%$buscar_projeto%' or palavras_chave LIKE '%$buscar_projeto%')");
    
  //Limitar itens(Projetos) por pagina
  $num_itens_pagina = 9;
  $inicio=($num_itens_pagina*$pagina)-$num_itens_pagina;
  
  //filtragem de resultados encontrados
  if($filtro_proj=="todos"){
    $row = mysqli_num_rows($resultado_proj);
    $resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%' or palavras_chave LIKE '%$buscar_projeto%' limit $inicio, $num_itens_pagina");
  }else{
    $verificar_filtro=mysqli_query($conexao,"SELECT * FROM projetos WHERE (nome LIKE '%$buscar_projeto%' or palavras_chave LIKE '%$buscar_projeto%')&&(tipo_ajuda LIKE '%$filtro_proj%' OR tipo_ajuda LIKE 'Todos')");
    $row=mysqli_num_rows($verificar_filtro);
    $resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos WHERE (nome LIKE '%$buscar_projeto%' or palavras_chave LIKE '%$buscar_projeto%')&&(tipo_ajuda LIKE '%$filtro_proj%' OR tipo_ajuda LIKE 'Todos') limit $inicio, $num_itens_pagina");
  }
  $total_paginas=ceil($row/$num_itens_pagina);
 
  if($row == 0){ ?>
  <div class="wrapper">
    <div class="sem-resultados">
        <h2>Sua busca não retornou resultados</h2>
    </div>
  </div>
<?php } else {
?>
  <div class="wrapper">
      <section class="heading">
        <h2>Resultados</h2>
        <span>Sua busca retornou <?= $row ?> resultado<?= ($row > 1) ? "s" : ""; ?></span>
        <div class="filtro">
          <ul>
            <li><a href="achar_projeto.php?buscaproj=<?php echo $buscar_projeto; ?>&filtro=todos" <?php if($filtro_proj=="todos"){echo 'class="selecionado"';}?> >Todos</a></li>
            <li><a href="achar_projeto.php?buscaproj=<?php echo $buscar_projeto; ?>&filtro=criação" <?php if($filtro_proj=="criação"){echo 'class="selecionado"';}?> >Criação</a></li>
            <li><a href="achar_projeto.php?buscaproj=<?php echo $buscar_projeto; ?>&filtro=consultoria" <?php if($filtro_proj=="consultoria"){echo 'class="selecionado"';}?>>Consultoria</a></li>
          </ul>
        </div>
      </section>
      <section id="resultados">
  <?php
    
    //procurar busca no banco de dados e filtragem simples pelos botoes "criação e consultoria".
        while(($linha = mysqli_fetch_array($resultado_proj_pagina))){
          $nome_proj = $linha['nome'];
          $descricao_proj = strip_tags($linha['descricao']);
          $id_proj=$linha['id'];
          $tipo_ajuda = $linha['tipo_ajuda'];
          $limite_texto = 200;
          if (strlen($descricao_proj) > $limite_texto){
            $pos_ultimo_espaço = strpos($descricao_proj, ' ', $limite_texto);
            $descricao_proj = substr($descricao_proj, 0, $pos_ultimo_espaço)."...";
          }
        //  strlen($descricao_proj) < $limite_texto ? $descricao_proj : substr(strip_tags($descricao_proj), 0, 200)."...";
?>
        <article class="container card">
            <h3 class="card-titulo">
              <a href="descricao.php?id=<?php echo $id_proj; ?>"><?= $nome_proj ?></a>
            </h3>
            <p class="card-descricao">
              <a href="descricao.php?id=<?php echo $id_proj; ?>"><?= $descricao_proj; ?></a>
            </p>

          <div id="tags">
            <?php if ($tipo_ajuda == "Todos") { ?>
              <span><a href="#1">Criação</a></span>
              <span><a href="#2">Consultoria</a></span>
            <?php } else { ?>
              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
          </div>
          <a class="saiba-mais" href="descricao.php?id=<?php echo $id_proj; ?>">SAIBA MAIS</a>
        </article>
<?php
      }
?>
        </section>
<?php
    }
  
  //*Fim da Busca de projetos
  $pagina_anterior = $pagina - 1;
  $pagina_posterior = $pagina + 1;
?>
    <?php if(isset($_GET['buscaproj'])&&$total_paginas){?>
    <nav class="menu-paginacao">
      <ul>
      
        <li>
          <?php 
            //Mostrar botao pagina anterior
            if($pagina_anterior!=0){ 
          ?>
            <a href="achar_projeto.php?pagina=<?php echo $pagina_anterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>&filtro=<?php echo $filtro_proj;?>" aria-label="Previous">
              <span class="true" aria-hidden="true">&laquo; Página anterior</span>
            </a>
          <?php }else{ ?>
            <span class="false" aria-hidden="true">&laquo; Página anterior</span>
          <?php } ?>
        </li>
        
        <?php
        //Mostrar numero de paginas
          for($i=1; $i<$total_paginas+1;$i++){ ?>
        <li <?php if($i==$pagina){echo 'class="pagina-atual"';}?>>
          <a  href="achar_projeto.php?pagina=<?php echo $i; ?>&buscaproj=<?php echo $buscar_projeto; ?>&filtro=<?php echo $filtro_proj;?>"><?php echo $i; ?></a>
        </li>
        
        <?php } ?>  
        <li>
          <?php
            //Mostrar pagina posterior
            if($pagina_posterior <= $total_paginas){ 
          ?>
          <a href="achar_projeto.php?pagina=<?php echo $pagina_posterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>&filtro=<?php echo $filtro_proj;?>" aria-label="Previous">
            <span class="true" aria-hidden="true">Próxima página &raquo;</span>
          </a>
          <?php 
            }else{ 
          ?>
            <span class="false" aria-hidden="true">Próxima página &raquo;</span>
          <?php }  ?>
        </li>
      </ul>
    </nav>
    <?php } } ?>
          
<?php require "_footer.php" ?>