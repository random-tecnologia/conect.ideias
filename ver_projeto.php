<?php 
$titulo_pagina = "Projeto de Desenvolvimento de Software";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
?>

<div class="wrapper">
  <div id="heading">
    <span id="tipo-ajuda">Criação</span>
    <h1 id="nome-projeto">Projeto de Desenvolvimento de Software</h1>
    <nav id="paginas">
      <ul>
        <li><a class="ver_projeto" href="ver_projeto.php">Descrição</a></li>
        <li><a class="proximos_passos" href="proximos_passos.php">Próximos passos</a></li>
        <li><a class="solicitacoes" href="solicitacoes.php">Solicitações</a></li>
        <li><a class="equipe" href="equipe.php">Equipe</a></li>
      </ul>
    </nav>
    <!-- <a href="#"><button id="btn-solicitar-acesso" class="btn-primario">Solicitar acesso</button></a> -->
    <!-- <a href="#"><button id="btn-solicitar-acesso" class="btn-secundario btn-projeto">Cancelar solicitação</button></a> -->
    <!-- <a href="#"><button id="btn-solicitar-acesso" class="btn-secundario btn-projeto">Sair do projeto</button></a> -->
    <div class="clearfix"></div>
  </div>
</div>

<section class="container-texto">
  <div class="wrapper">
    <h2>Descrição</h2>
    <p>Esse é um projeto do professor Giovanni de desenvolvimento de software em parceria com alunos de todos os cursos para construir algo inimaginável e que vai mudar vidas e paradigmas de engenharia.</p>
    <p>Ut elementum tempor molestie. Pellentesque vel lectus iaculis, vestibulum diam ac, aliquam purus. Maecenas eu fringilla magna. Maecenas id tempus purus, vel aliquam quam. Phasellus sapien nibh, pulvinar placerat accumsan ac, mollis vel neque. Morbi ultrices mauris id tortor accumsan luctus. Curabitur nec risus maximus, hendrerit nisi eu, laoreet massa.</p> 
    <p>Morbi malesuada dolor quis ligula convallis, eget placerat nisl egestas. Cras eget bibendum tellus. Integer sit amet lacus placerat metus aliquam mollis gravida eu est. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse pretium lobortis leo, quis euismod felis malesuada non. Quisque tincidunt lacus urna, sit amet blandit nisi suscipit quis. Phasellus porttitor eros elit, vel aliquet mauris porttitor ut. Aenean eu enim a ligula rhoncus tempor sit amet id lorem.</p>
    <h2>Contato</h2>
    <ul>
      <li>robertolopes@servidor.com</li>
      <li>(61) 95555-5555</li>
    </ul>
  </div>
</section>

<?php require "_footer.php" ?>
