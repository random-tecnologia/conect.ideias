<?php
require 'db.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  // mostra nome , descriçao , tipo de ajuda e palavras-chave dos projetos
  $consulta = "SELECT * FROM projetos WHERE id =$id ";

  $result = mysqli_query($conexao, $consulta);
  if(!$result){
    header('Location: ler_projetos.php');
    exit();
  }

  // Checa se o id do projeto existe
  if (mysqli_num_rows($result) == 0) {
    echo "<script>window.history.go(-1)</script>";
  }

  while ($row = mysqli_fetch_assoc($result)) {

      $id_2 = $row['id'];
      $nome_projeto = $row['nome'];

      // Coloca nome do projeto na aba do navegador
      $titulo_pagina = $nome_projeto;
      require "_header.php";

      $descricao = $row['descricao'];
      $tipo_ajuda = $row['tipo_ajuda'];
      $estado = $row['estado'];
      $id_dono = $row['id_dono'];
      if($estado != 1){
        echo "Projeto Arquivado"."<br/>";
      }
      // verifica se o usuario e dono do projeto 
      if($id_dono==$_SESSION['id_usuario']){  ?>
        <div class="wrapper">
          <div id="heading">
            <?php if ($tipo_ajuda == "Todos"){ ?>
              <span class="tipo-ajuda"><a href="#">Criação</a></span>
              <span class="tipo-ajuda"><a href="#">Consultoria</a></span>
            <?php } else { ?>
              <span class="tipo-ajuda"><a href="#"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
            <h1 id="nome-projeto"><?= $nome_projeto; ?></h1>
            <nav id="paginas">
              <ul>
                <li><a id="descricao" href="descricao.php?id=<?= $id; ?>">Descrição</a></li>
                <li><a id="proximos_passos" href="proximos_passos.php?id=<?= $id; ?>">Próximos passos</a></li>
                <li><a id="solicitacoes" href="solicitacoes.php?id=<?= $id; ?>">Solicitações</a></li>
                <li><a id="equipe" href="equipe.php?id=<?= $id; ?>">Equipe</a></li>
              </ul>
            </nav>
            <a href="editar_projeto.php?id=<?= $id; ?>"><button id="btn-solicitar-acesso" class="btn-secundario btn-editar-projeto"><i class="ion-edit"></i>Editar</button></a>
            <div class="clearfix"></div>
          </div>
        </div>
    <?php

      }else{
        $consulta = "SELECT id_usuario FROM usuarios_projetos WHERE id_projeto = $id";
        $result = mysqli_query($conexao,$consulta);
        if(!$result){
          die(mysqli_error());
        }
        $participa = FALSE;
        while($row = mysqli_fetch_assoc($result)){

          if($row['id_usuario']==$_SESSION['id_usuario']){

            $participa = TRUE;
          }
        }

        // verifica se o usuario participa do projeto
        if($participa){ ?>

        <div class="wrapper">
          <div id="heading">
            <?php if ($tipo_ajuda == "Todos"){ ?>
              <span class="tipo-ajuda"><a href="#">Criação</a></span>
              <span class="tipo-ajuda"><a href="#">Consultoria</a></span>
            <?php } else { ?>
              <span class="tipo-ajuda"><a href="#"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
            <h1 id="nome-projeto"><?= $nome_projeto; ?></h1>
            <nav id="paginas">
              <ul>
                <li><a id="descricao" href="descricao.php?id=<?= $id; ?>">Descrição</a></li>
                <li><a id="proximos_passos" href="proximos_passos.php?id=<?= $id; ?>">Próximos passos</a></li>
              </ul>
            </nav>
            <a href="sair_do_projeto.php?id=<?= $id; ?>"><button id="btn-solicitar-acesso" class="btn-secundario btn-projeto">Sair do projeto</button></a>
            <div class="clearfix"></div>
          </div>
        </div>
        <?php
        
        }else{

          $consulta = "SELECT id_usuario FROM solicitacoes WHERE id_projeto = $id";
          $result = mysqli_query($conexao,$consulta);
        
          if(!$result){
          die(mysqli_error());
          }
          $solicitou = FALSE;

          while($row = mysqli_fetch_assoc($result)){

            if($row['id_usuario']==$_SESSION['id_usuario']){

            $solicitou = TRUE;
            }
          }

          // verifica se o usuario solicitou acesso ao projeto
          
          if($solicitou){ ?>

          <div class="wrapper">
            <div id="heading">
              <?php if ($tipo_ajuda == "Todos"){ ?>
              <span class="tipo-ajuda"><a href="#">Criação</a></span>
              <span class="tipo-ajuda"><a href="#">Consultoria</a></span>
            <?php } else { ?>
              <span class="tipo-ajuda"><a href="#"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
              <h1 id="nome-projeto"><?= $nome_projeto; ?></h1>
              <nav id="paginas">
                <ul>
                  <li><a id="descricao" href="descricao.php?id=<?= $id; ?>">Descrição</a></li>
                </ul>
              </nav>
              <a href="cancelar_solicitacao.php?id=<?= $id; ?>"><button id="btn-solicitar-acesso" class="btn-secundario btn-projeto">Cancelar solicitação</button></a>
              <div class="clearfix"></div>
            </div>
          </div>

          <?php }else{  ?>

          <div class="wrapper">
            <div id="heading">
              <?php if ($tipo_ajuda == "Todos"){ ?>
              <span class="tipo-ajuda"><a href="#">Criação</a></span>
              <span class="tipo-ajuda"><a href="#">Consultoria</a></span>
            <?php } else { ?>
              <span class="tipo-ajuda"><a href="#"><?= $tipo_ajuda; ?></a></span>
            <?php } ?>
              <h1 id="nome-projeto"><?= $nome_projeto; ?></h1>
              <nav id="paginas">
                <ul>
                  <li><a id="descricao" href="descricao.php?id=<?= $id; ?>">Descrição</a></li>
                </ul>
              </nav>
              <form id="form-solicitar-acesso" action="solicitar.php" method="post">
                <select name="tipo_ajuda" id="select-solicitar-acesso" required="required">
                  <option value="">Selecione (Tipo ajuda)</option>
                  <option value="Todos">Todos</option>
                  <option value="Criação">Criação</option>
                  <option value="Consultoria">Consultoria</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" id="btn-solicitar-acesso" class="btn-primario" value="Solicitar acesso">
                <div class="clearfix"></div>
              </form>
              <div class="clearfix"></div>
            </div>
          </div>
<?php          
          }
        }
      }
    }
}else{
  echo "<script>window.history.go(-1)</script>";
  exit();
}
?>
