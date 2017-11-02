<?php 
$titulo_pagina = "Editar conta";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
?>

  <div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="editar_conta.php" method="post">
        <label for="email">E-mail</label>
        <input type="text" name="email" placeholder="" required>
        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha_atual" class="senha" placeholder="" required>
        <label for="nova_senha">Nova senha</label>
        <input type="password" name="nova_senha" class="senha" placeholder="" required>
        <a href="#" id="excluir-conta">Excluir conta</a>
        <input class="btn-primario" type="submit" name="submit" value="Salvar">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>

<?php require "_footer.php" ?>
