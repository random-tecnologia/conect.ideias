<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | <?= $titulo_pagina; ?></title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  
  <nav id="navegacao">
      <div class="wrapper"> 
        <a href="achar_projeto.php"><img id="logo" src="img/logo.svg" alt="Logo Conect.Ideias"></a>
        <ul>
          <li><a id="destaque-azul" href="criar_projeto.php">Criar projeto</a></li>
          <li><a href="achar_projeto.php" class="selecionado">Achar projeto</a></li>
          <li><a href="meus_projetos.php">Meus projetos</a></li>
          <li><a id="bola-notificacao" href="notificacoes.php">Notificações</a></li>
        </ul>
        <div id="perfil" onclick="toggleDropdown();">
          <div id="separador"></div>
            <img id="avatar" src="img/avatar_kaique.jpg" alt="Avatar">
            <span id="nome">Roberto</span>
          <img id="seta" src="img/icone.png">
        </div>
        <div id="dropdown" class="esconder">
          <div id="unifica-menu"></div>
          <ul>
            <li><a href="perfil.php">Meu perfil</a></li>
            <li><a href="conta.php">Minha conta</a></li>
            <li><a href="sair.php">Sair</a></li>
          </ul>
        </div>
    </nav>