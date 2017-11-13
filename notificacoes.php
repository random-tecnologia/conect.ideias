<?php 
$titulo_pagina = "Notificações";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
$id_usuario = $_SESSION['id_usuario'];
?>

<div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
<div class="wrapper">
    <section class="container container-lista">
        <ul>
    <?php
        $consulta = "SELECT * FROM notificacoes WHERE id_usuario = $id_usuario";
        $resultado_not = mysqli_query($conexao, $consulta);
        while ($notificacao = mysqli_fetch_assoc($resultado_not))
        {
            $id_not = $notificacao['id'];
            $id_solicitante = $notificacao['id_solicitante'];
            $id_projeto = $notificacao['id_projeto'];
            $tipo = $notificacao['tipo'];

            // Pega nome do projeto
            $consulta_proj = mysqli_query($conexao, "SELECT nome FROM projetos WHERE id = $id_projeto") or die(mysqli_error());
            $projeto = mysqli_fetch_assoc($consulta_proj);
            $nome_projeto = $projeto['nome'];

            if ($tipo == '1'){
                // Pega nome do usuário
                $consulta_usuario = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE id = $id_solicitante") or die(mysqli_error());
                $usuario = mysqli_fetch_assoc($consulta_usuario);
                $nome_usuario = $usuario['nome'];
            ?>
                <li class="notificacao">
                    <a href="solicitacoes.php?id=<?= $id_projeto; ?>" class="texto"><strong><?= $nome_usuario; ?></strong> solicitou participação no projeto "<strong><?= $nome_projeto; ?></strong>".</a>
                    <a href="excluir_notificacao.php?id=<?= $id_not; ?>" class="acao"><span id="excluir"></span></a>
                </li> 
            <?php
            } else if ($tipo == '2'){
            ?>
                <li class="notificacao">
                    <a href="descricao.php?id=<?= $id_projeto; ?>" class="texto">Sua solicitação no projeto "<strong><?= $nome_projeto; ?></strong>" foi <strong>aceita</strong>.</a>
                    <a href="excluir_notificacao.php?id=<?= $id_not; ?>" class="acao"><span id="excluir"></span></a>
                </li>
            <?php
            }
        }
    ?>
        </ul>
    </section>
</div>

<?php require "_footer.php" ?>
