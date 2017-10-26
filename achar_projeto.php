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
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$buscar_projeto = isset($_GET['buscaproj'])?($_GET['buscaproj']):0;

    $resultado_proj = mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%'");
    $row = mysqli_num_rows($resultado_proj);
	
	//Limitar itens(Projetos) por pagina
	$num_itens_pagina=18;
	$contador_itens=0;
	$total_paginas=ceil($row/$num_itens_pagina);
	$inicio=($num_itens_pagina*$pagina)-$num_itens_pagina;
	$resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%' limit $inicio, $num_itens_pagina");
    
	if($row==0){
        echo "<div style='text-align:center; color:white; width:100%'>Nenhum resultado encontrado!!!</div>";
    } else {
?>
  <div class="wrapper">
      <section class="heading">
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
  <?php
        while($linha = mysqli_fetch_array($resultado_proj_pagina)){
          $nome_proj = $linha['nome'];
          $descricao_proj = $linha['descricao'];
		  $id_proj=$linha['id'];
?>
        <article class="container card">
            <h3 class="card-titulo">
              <a href="ver_projeto.php?id_projeto=<?php echo $id_proj; ?>"><?= $nome_proj ?></a>
            </h3>
            <p class="card-descricao">
              <a href="ver_projeto.php?id_projeto=<?php echo $id_proj; ?>"><?= $descricao_proj ?></a>
            </p>

          <div id="tags">
            <span><a href="#1">Criação</a></span>
            <span><a href="#2">Consultoria</a></span>
          </div>
          <a id="saiba-mais" href="ver_projeto.php?id_projeto=<?php echo $id_proj; ?>">SAIBA MAIS</a>
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
		<?php if($total_paginas){?>
		<nav class="menu-paginacao">
			<ul>
			
				<li>
					<?php 
						//Mostrar botao pagina anterior
						if($pagina_anterior!=0){ 
					?>
						<a href="achar_projeto.php?pagina=<?php echo $pagina_anterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>" aria-label="Previous">
							<span class="true" aria-hidden="true">&laquo;</span>
						</a>
					<?php }else{ ?>
						<span class="false" aria-hidden="true">&laquo;</span>
					<?php } ?>
				</li>
				
				<?php
				//Mostrar numero de paginas
					for($i=1; $i<$total_paginas+1;$i++){ ?>
				<li <?php if($i==$pagina){echo 'class="pagina-atual"';}?>>
					<a  href="achar_projeto.php?pagina=<?php echo $i; ?>&buscaproj=<?php echo $buscar_projeto; ?>"><?php echo $i; ?></a>
				</li>
				
				<?php } ?>	
				<li>
					<?php
						//Mostrar pagina posterior
						if($pagina_posterior <= $total_paginas){ 
					?>
					<a href="achar_projeto.php?pagina=<?php echo $pagina_posterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>" aria-label="Previous">
						<span class="true" aria-hidden="true">&raquo;</span>
					</a>
					<?php 
						}else{ 
					?>
						<span class="false" aria-hidden="true">&raquo;</span>
					<?php }  ?>
				</li>
			</ul>
		</nav>
		<?php } ?>
					
<?php require "_footer.php" ?>