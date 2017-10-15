<!DOCTYPE html>
<div style="color:red; background-color:white;">
<?php include_once("conexao_bd.php");
	//Verificar conexao
	if(!$conexao){
		echo "Erro de conexao com o Banco de Dados</br>".mysqli_connect_error();
	}
?>
</div>
<?php
	//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

	
	$buscar_projeto=isset($_GET['buscaproj'])?($_GET['buscaproj']):0;
	
	
		//Selecionar os projetos
		$resultado_proj=mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%'");
		
		//Contar o total de projetos encontrados
		$row=mysqli_num_rows($resultado_proj);
		$itens_encontrados=$row;
		
		//Quantidade de projetos por pagina
		$num_itens_pagina=5;
		
		//calcular o numero de paginas necessarias
		$total_paginas=ceil($itens_encontrados/$num_itens_pagina);
		//calcular o inicio da visualização
		$inicio=($num_itens_pagina*$pagina)-$num_itens_pagina;
		
		
		//Selecionar os cursos que serão apresentados na pagina atual
		$resultado_proj_pagina=mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%' limit $inicio, $num_itens_pagina");
?>

<html lang="pt-br">
  <head>
  <style>
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conect.Ideias | Achar projetos</title>
	<style>
		.menu-paginacao{
			text-align:center;
		}
		.menu-paginacao ul li{
			display: inline-block;
		}
	</style>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary justify-content-between">
      <a class="navbar-brand" href="#">Conect.Ideias</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Achar projeto <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Meus projetos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notificações</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              John Doe
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Meu perfil</a>
              <a class="dropdown-item" href="#">Minha conta</a>
              <a class="dropdown-item" href="#">Sair</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
       <form class="form-inline" id="busca" action="achar_projeto.php" method="get">
           <input type="search" class="form-control form-control-lg" placeholder="Digite tags" name="buscaproj"/>
           <button type="submit" class="btn btn-lg btn-primary">Procurar</button>
      </form>

      <div class="cards row">	  
<?php
	//*Buscar projetos
		if($row==0){
			echo "<div style='text-align:center; color:white; width:100%'>Nenhum Resultado encontrado!!!</div>";
		} else{
		
			while($linha=mysqli_fetch_array($resultado_proj_pagina)){
				$nome_proj=$linha['nome'];
				$descricao_proj=$linha['descricao'];
?>
        <div class="col">
          <div class="card">
            <img src="./img/placeholder.jpg" alt="Placeholder image" class="card-img-top">
            <div class="card-body">
			
				<h4 class="card-title">
<?php			  
				echo "$nome_proj";
?>			  
				</h4>
				<p class="card-text">
<?php			  
				echo "$descricao_proj";
?>			  
				</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
<?php
			
			}
		}
	
?>    
      </div>
<?php
	//Verificar a pagina anterior e posterior
	$pagina_anterior = $pagina - 1;
	$pagina_posterior = $pagina + 1;
?>
		<nav class="menu-paginacao">
			<ul>
				<li>
<?php
	if($pagina_anterior!=0){
?>
		
		<a href="achar_projeto.php?pagina=<?php echo $pagina_anterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		</a>
<?php
	}else{
?>
		<span aria-hidden="true">&laquo;</span>
<?php
	}
?>
				</li>
<?php
	//Apresentar paginação
	for($i=1; $i<$total_paginas+1;$i++){
?>
		<li><a href="achar_projeto.php?pagina=<?php echo $i; ?>&buscaproj=<?php echo $buscar_projeto; ?>"><?php echo $i; ?></a></li>
<?php }
?>		


				<li>
<?php
	if($pagina_posterior <= $total_paginas){ 
?>
					<a href="achar_projeto.php?pagina=<?php echo $pagina_posterior; ?>&buscaproj=<?php echo $buscar_projeto; ?>" aria-label="Previous">
						<span aria-hidden="true">&raquo;</span>
					</a>
<?php 
	}else{ 
?>
					<span aria-hidden="true">&raquo;</span>
<?php }  ?>
				</li>
				
				
			</ul>
		</nav>
    </div>
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>