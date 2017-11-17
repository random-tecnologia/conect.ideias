<?php 
$titulo_pagina = "Perfil";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";

$id_usuario = $_SESSION['id_usuario'];

if(isset($_GET['id']) && $_GET['id'] != ""){
  $id = $_GET['id'];
  $consulta = "select nome,descricao,avatar,email,telefone from usuarios where id = $id";
  $resultado = mysqli_query($conexao, $consulta);
  if (mysqli_num_rows($resultado) == 0){
    echo "<script>window.history.go(-1)</script>";
  }
  while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
    $nome = $row['nome'];
    $desc = $row["descricao"];
    $ava = $row["avatar"];
    $tel = $row["telefone"];
    $email = $row['email'];
       ?>
       <div class="wrapper">
        <img src="<?= $ava; ?>" alt="<?= $nome; ?>" id="avatar-grande">
        <h1 id="nome-usuario"><?= $nome; ?></h1>
        <div class="clearfix" style="margin-bottom: 55px;"></div>
      </div>
       <section class="container-texto">
          <div class="wrapper">
            <h2>Descrição</h2>
            <?= $desc; ?>
            <h2>Contato</h2>
            <ul>
              <li><?= $email; ?></li>
              <li><?= $tel; ?></li>
            </ul>
          </div>
        </section>

  <?php
    }
}

else{
$consulta = "select nome, descricao, avatar, email, telefone from usuarios where id = $id_usuario";
$resultado = mysqli_query($conexao, $consulta);
  while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
    $nome = $row['nome'];
    $desc = $row["descricao"];
    $ava = $row["avatar"];
    $tel = $row["telefone"];
    $email = $row['email'];
       ?>
       <div class="wrapper">
        <img src="<?= $ava; ?>" alt="<?= $nome; ?>" id="avatar-grande">
        <h1 id="nome-usuario"><?= $nome; ?></h1>
        <a href="editar_perfil.php"><button id="btn-editar-perfil" class="btn-primario">Editar perfil</button></a>
        <div class="clearfix"></div>
      </div>
       <section class="container-texto">
          <div class="wrapper">
            <h2>Descrição</h2>
            <?= $desc; ?>
            <h2>Contato</h2>
            <ul>
              <li><?= $email; ?></li>
              <li><?= $tel; ?></li>
            </ul>
          </div>
        </section>

  <?php
    }
}
?>

<?php require "_footer.php" ?>