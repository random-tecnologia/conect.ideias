<?php 
$titulo_pagina = "Notificações";
require "_header.php";
?>

<div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
<div class="wrapper">
    <section class="container container-lista">
        <ul>
            <li class="notificacao">
                <a href="#" class="texto"><strong>Roberto Silva</strong> solicitou participação no projeto "<strong>Aplicativo para DS</strong>".</a>
                <a href="#excluir" class="acao"><span id="excluir"></span></a>
            </li>
            <li class="notificacao">
                <a href="#" class="texto">Sua solicitação no projeto "<strong>Carro de competição para próxima temporada</strong>" foi <strong>aceita</strong>.</a>
                <a href="#" class="acao"><span id="excluir"></span></a>
            </li>
            <li class="notificacao">
                <a href="#" class="texto"><strong>João Victor</strong> solicitou participação no projeto "<strong>Adote um cão</strong>".</a>
                <a href="#" class="acao"><span id="excluir"></span></a>
            </li>
        </ul>
    </section>
</div>

<?php require "_footer.php" ?>
