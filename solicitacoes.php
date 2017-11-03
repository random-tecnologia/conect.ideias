<?php 
$titulo_pagina = "Projeto de Desenvolvimento de Software";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
require "_projeto.php";
?>

<div class="wrapper">
	<section class="container container-lista solicitacoes">
		<ul>
            <li class="solicitacao">
            	<a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                	<h3 class="nome">Roberto</h3>
                	<div class="tipo-ajuda">
	                	<span>Criação</span>
	                	<span>Consultoria</span>
                	</div>
                </a>
                <div class="acoes">
                	<a href="#" class="aceitar">Aceitar</a>
                	<a href="#" class="rejeitar">Rejeitar</a>
                	<a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>

            <li class="solicitacao">
            	<a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                	<h3 class="nome">Roberto</h3>
                	<div class="tipo-ajuda">
	                	<span>Criação</span>
	                	<span>Consultoria</span>
                	</div>
                <div class="acoes">
                	<a href="#" class="aceitar">Aceitar</a>
                	<a href="#" class="rejeitar">Rejeitar</a>
                	<a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>

            <li class="solicitacao">
            	<a href="#" class="avatar"><img src="img/avatar_kaique.jpg" alt="Roberto Lopes"></a>
                <a href="#" class="identificacao">
                	<h3 class="nome">Roberto</h3>
                	<div class="tipo-ajuda">
	                	<span>Criação</span>
	                	<span>Consultoria</span>
                	</div>
                <div class="acoes">
                	<a href="#" class="aceitar">Aceitar</a>
                	<a href="#" class="rejeitar">Rejeitar</a>
                	<a href="#" class="ver-perfil">Ver perfil</a>
                </div>
            </li>
        </ul>
	</section>    
</div>

<?php require "_footer.php" ?>
