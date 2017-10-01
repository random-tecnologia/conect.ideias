<!DOCTYPE html>
<?php
	$conexao=mysqli_connect("localhost", "root", "", "conect_ideias");
?>
<div style="color:red; background-color:white;">
<?php
	//verificar conexao
	if(!$conexao){
		echo "Erro de conexao com o Banco de Dados</br>".mysqli_connect_error();
	}
?>
</div>

<html lang="pt-br">
  <head>
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
           <input type="search" class="form-control form-control-lg" placeholder="Digite tags" />
           <button type="submit" class="btn btn-lg btn-primary">Procurar</button>
      </form>

      <div class="cards row">
        <div class="col">
          <div class="card">
            <img src="./img/placeholder.jpg" alt="Placeholder image" class="card-img-top">
            <div class="card-body">
              <h4 class="card-title">Nome do projeto</h4>
              <p class="card-text">Descrição breve e genérica do projeto para ocupar espaço</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="./img/placeholder.jpg" alt="Placeholder image" class="card-img-top">
            <div class="card-body">
              <h4 class="card-title">Nome do projeto</h4>
              <p class="card-text">Descrição breve e genérica do projeto para ocupar espaço</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="./img/placeholder.jpg" alt="Placeholder image" class="card-img-top">
            <div class="card-body">
              <h4 class="card-title">Nome do projeto</h4>
              <p class="card-text">Descrição breve e genérica do projeto para ocupar espaço</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="./img/placeholder.jpg" alt="Placeholder image" class="card-img-top">
            <div class="card-body">
              <h4 class="card-title">Nome do projeto</h4>
              <p class="card-text">Descrição breve e genérica do projeto para ocupar espaço</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
