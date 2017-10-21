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
          <a href="ver_projeto.php">Projeto de Desenvolvimento</a>
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
          <a href="ver_projeto.php">Novo carro de corrida para competições nacionais do próximo ano de vida e tudos</a>
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
=======
<!DOCTYPE html>
<?php
	//Iniciar conexao com o BD
	$conexao=mysqli_connect("localhost", "root", "", "conect_ideias");
?>
<div style="color:red; background-color:white;">
<?php
	//Verificar conexao
	if(!$conexao){
		echo "Erro de conexao com o Banco de Dados</br>".mysqli_connect_error();
	}
?>
</div>

<html lang="pt-br">
  <head>
  <style>
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conect.Ideias | Achar projetos</title>

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
	$buscar_projeto=isset($_GET['buscaproj'])?($_GET['buscaproj']):0;
	if($buscar_projeto){
		$resultado_proj=mysqli_query($conexao,"SELECT * FROM projetos WHERE nome LIKE '%$buscar_projeto%'");
		$row=mysqli_num_rows($resultado_proj);
		if($row==0){
			echo "<div style='text-align:center; color:white; width:100%'>Nenhum Resultado encontrado!!!</div>";
		} else{
		
			while($linha=mysqli_fetch_array($resultado_proj)){
				$nome_proj=$linha['nome'];
				$descricao_proj=$linha['descricao'];
?>
        <div class="col">nad
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
	}
	//*Fim da Busca de projetos
?>    
      </div>

    </div>
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>