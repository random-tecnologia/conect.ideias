<?php 
$titulo_pagina = "Projeto de Desenvolvimento de Software";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
require "_projeto.php";
?>

<div class="wrapper">
    <div class="filtro filtro-equipe">
          <ul>
            <li><a href="#" class="selecionado">Todos</a></li>
            <li><a href="#">Criação</a></li>
            <li><a href="#">Consultoria</a></li>
          </ul>
    </div>
    <div class="clearfix"></div>
	<section class="container container-lista equipe">
		<ul>
            <li class="participante">
            	<a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                	<h3 class="nome">Roberto</h3>
                	<div class="tipo-ajuda">
	                	<span>Criação</span>
	                	<span>Consultoria</span>
                	</div>
                </a>
                <div class="contato">
                    <span>roberto@provedor.com</span>
                    <span>(61) 95555-5555</span>
                </div>
                <div class="acoes">
                	<a href="#" class="rejeitar">Remover</a>
                	<a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>

            <li class="participante">
                <a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                    <h3 class="nome">Roberto</h3>
                    <div class="tipo-ajuda">
                        <span>Criação</span>
                        <span>Consultoria</span>
                    </div>
                </a>
                <div class="contato">
                    <span>roberto@provedor.com</span>
                    <span>(61) 95555-5555</span>
                </div>
                <div class="acoes">
                    <a href="#" class="rejeitar">Remover</a>
                    <a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>

            <li class="participante">
                <a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                    <h3 class="nome">Roberto</h3>
                    <div class="tipo-ajuda">
                        <span>Criação</span>
                        <span>Consultoria</span>
                    </div>
                </a>
                <div class="contato">
                    <span>roberto@provedor.com</span>
                    <span>(61) 95555-5555</span>
                </div>
                <div class="acoes">
                    <a href="#" class="rejeitar">Remover</a>
                    <a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>
        </ul>
	</section>    
</div>

<?php require "_footer.php" ?>
