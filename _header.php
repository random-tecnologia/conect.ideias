<?php
require "db.php";
session_start();
$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | <?= $titulo_pagina; ?></title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body id="<?= $nome_arquivo; ?>">
  
  <nav id="navegacao">
      <div class="wrapper"> 
        <a href="achar_projeto.php"><img id="logo" src="img/logo.png" alt="Logo Conect.Ideias"></a>
        <ul>
          <li><a id="criar_projeto" href="criar_projeto.php">Criar projeto</a></li>
          <li><a id="achar_projeto" href="achar_projeto.php">Achar projeto</a></li>
          <li><a id="meus_projetos" href="meus_projetos.php">Meus projetos</a></li>
          <li><a id="notificacoes" id="bola-notificacao" href="notificacoes.php">Notificações</a></li>
        </ul>
        <div id="nav-perfil" onclick="toggleDropdown();">
          <div id="separador"></div>
          <?php
            $consulta = mysqli_query($conexao, "SELECT nome, avatar FROM usuarios WHERE id = $id_usuario") or die(mysqli_error());
            while ($usuario = mysqli_fetch_assoc($consulta)) {
          ?>
              <img id="avatar" src="<?= $usuario['avatar'] ?>" alt="<?= $usuario['nome'] ?>">
              <span id="nome"><?= $usuario['nome'] ?></span>
      <?php } ?>
          <img id="seta" src="img/icone.png">
        </div>
        <div id="dropdown" class="esconder">
          <div id="unifica-menu"></div>
          <ul>
            <li><a id="perfil" href="perfil.php">Meu perfil</a></li>
            <li><a id="conta" href="conta.php">Minha conta</a></li>
            <li><a id="sair" href="sair.php">Sair</a></li>
          </ul>
        </div>
    </nav>