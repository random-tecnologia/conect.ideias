<?php 
$titulo_pagina = "Meus projetos";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php";
require "db.php";

function printaErro(){
	echo "<div class=\"wrapper\">
			    <div class=\"sem-resultados\">
			        <h2>Você não tem nem participa de algum projeto</h2>
			        <p><a href=\"criar_projeto.php\">Crie um novo</a> ou <a href=\"achar_projeto.php\">ache um projeto</a> para fazer parte.</p>
			    </div>
			</div>";
}

if (isset($_GET['filtro'])) {
	$filtro = $_GET['filtro'];
	$id_dono = $_SESSION['id_usuario'];
	$id_usuario = $id_dono;

	$consulta = "SELECT * FROM projetos WHERE id_dono = $id_dono";
	$consulta_sol = "SELECT * FROM solicitacoes WHERE id_usuario = $id_usuario";
	$consulta_part = "SELECT * FROM usuarios_projetos WHERE id_usuario = $id_usuario";

	$result = mysqli_query($conexao,$consulta) or die(mysqli_error());
	$result_sol = mysqli_query($conexao, $consulta_sol) or die(mysqli_error());
	$result_part = mysqli_query($conexao, $consulta_part) or die(mysqli_error());

	if (mysqli_num_rows($result) == 0 AND mysqli_num_rows($result_sol) == 0 AND mysqli_num_rows($result_part) == 0 ) {
		printaErro();
		die();
	}
}
	
?>

<div class="wrapper">
    <section class="heading" id="heading-meus-projetos">
        <h2>Meus projetos</h2>
        <div class="filtro" id="filtro-meus-projetos">
          <ul>
            <li><a href="meus_projetos.php?filtro=todos" class="<?= ($_GET['filtro'] == "todos") ? 'selecionado' : '' ?>">Todos</a></li>
            <li><a href="meus_projetos.php?filtro=criados" class="<?= ($_GET['filtro'] == "criados") ? 'selecionado' : '' ?>">Criados</a></li>
            <li><a href="meus_projetos.php?filtro=participa" class="<?= ($_GET['filtro'] == "participa") ? 'selecionado' : '' ?>">Participando</a></li>
            <li><a href="meus_projetos.php?filtro=solicita" class="<?= ($_GET['filtro'] == "solicita") ? 'selecionado' : '' ?>">Solicitado</a></li>
          </ul>
        </div>
    </section>

	<section id="resultados">

<?php

if(isset($_GET['filtro'])){

	$filtro = $_GET['filtro'];
	$id_dono = $_SESSION['id_usuario'];
	$id_usuario = $id_dono;

	//MOSTRAR TODOS OS PROJETOS

	if($filtro === 'todos')
	{

		//MOSTRAR CRIADOS

		$consulta = "SELECT * FROM projetos WHERE id_dono = $id_dono";
		$result = mysqli_query($conexao,$consulta);

		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result))
		{
			$id_projeto = $row['id'];
			$nome_projeto = $row['nome'];
			$tipo_ajuda = $row['tipo_ajuda'];
			$estado = $row['estado'];
			$descricao = strip_tags($row['descricao']);
			$limite_texto = 200;
			if (strlen($descricao) > $limite_texto){
			$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
			$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
			}

			if ($estado == 0){ ?>
				<div id="arquivado">
		          <article class="container card card-dono">
		              <h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
		              </h3>
		              <p class="card-descricao">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
		                <a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		              </p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
		            <a id="acao" href="desarquivar_projeto.php?id=<?= $id_projeto; ?>"><button class="btn-secundario btn-desarquivar"><i class="ion-android-archive"></i>Desarquivar</button></a>
		          </article>
		        </div>

	<?php	} else 
			{ ?>			

			<article class="container card card-dono">
	            <h3 class="card-titulo">
	                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
				</h3>
				<p class="card-descricao">
					<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
				</p>
	            <div id="tags">
		            <?php if ($tipo_ajuda == "Todos") { ?>
		              <span><a href="#1">Criação</a></span>
		              <span><a href="#2">Consultoria</a></span>
		            <?php } else { ?>
		              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
		            <?php } ?>
				</div>
				<a id="acao" href="editar_projeto.php?id=<?= $id_projeto; ?>"><button class="btn-secundario"><i class="ion-edit"></i>Editar</button></a>
	        </article>

	<?php   }

		}

		//MOSTRAR PROJETOS QUE PARTICIPA

		$consulta = "SELECT id_projeto FROM usuarios_projetos WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result))
		{

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conexao,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2))
			{

				$nome_projeto = $row2['nome'];
				$tipo_ajuda = $row2['tipo_ajuda'];
				$estado = $row2['estado'];
				$palavras_chave = $row2['palavras_chave'];
				$descricao = strip_tags($row2['descricao']);
				$limite_texto = 200;
				if (strlen($descricao) > $limite_texto){
					$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
					$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
				}

				if ($estado == 0){ ?>
				<div id="arquivado">
		          <article class="container card">
					<h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
					</h3>
					<p class="card-descricao">
						<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					</p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		        </article>
		        </div>

	<?php	} else {
			?>
				<article class="container card">
					<h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
					</h3>
					<p class="card-descricao">
						<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					</p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		        </article>
        <?php }
			}

		}

		//MOSTRAR PROJETOS QUE SOLICITOU
		
		$consulta = "SELECT id_projeto FROM solicitacoes WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result)){

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conexao,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2))
			{

				$nome_projeto = $row2['nome'];
				$tipo_ajuda = $row2['tipo_ajuda'];
				$palavras_chave = $row2['palavras_chave'];
				$descricao = strip_tags($row2['descricao']);
				$limite_texto = 200;
				if (strlen($descricao) > $limite_texto){
					$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
					$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
				}
			?>
				<article class="container card">
					<h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
					</h3>
					<p class="card-descricao">
						<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					</p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		        </article>
        <?php

			}
		}
	

	//MOSTRAR CRIADOS

	} elseif ($filtro === 'criados')
	{
		$consulta = "SELECT * FROM projetos WHERE id_dono = $id_dono";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result))
		{

			$id_projeto = $row['id'];
			$nome_projeto = $row['nome'];
			$tipo_ajuda = $row['tipo_ajuda'];
			$estado = $row['estado'];
			$descricao = strip_tags($row['descricao']);
			$limite_texto = 200;
			if (strlen($descricao) > $limite_texto){
				$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
				$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
			}

			if ($estado == 0)
			{ ?>
				<div id="arquivado">
		          <article class="container card card-dono">
		              <h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
		              </h3>
		              <p class="card-descricao">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
		                <a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		              </p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
		            <a id="acao" href="desarquivar_projeto.php?id=<?= $id_projeto; ?>"><button class="btn-secundario btn-desarquivar"><i class="ion-android-archive"></i>Desarquivar</button></a>
		          </article>
		        </div>

	<?php	} else
			{ ?>			

			<article class="container card card-dono">
	            <h3 class="card-titulo">
	                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
				</h3>
				<p class="card-descricao">
					<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
				</p>
	            <div id="tags">
		            <?php if ($tipo_ajuda == "Todos") { ?>
		              <span><a href="#1">Criação</a></span>
		              <span><a href="#2">Consultoria</a></span>
		            <?php } else { ?>
		              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
		            <?php } ?>
				</div>
				<a id="acao" href="editar_projeto.php?id=<?= $id_projeto; ?>"><button class="btn-secundario"><i class="ion-edit"></i>Editar</button></a>
	        </article>

	<?php   }

		}
		
	}

	//MOSTRAR PROJETOS QUE PARTICIPA

	elseif ($filtro === 'participa')
	{

		$consulta = "SELECT id_projeto FROM usuarios_projetos WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result))
		{

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conexao,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2))
			{
				$nome_projeto = $row2['nome'];
				$tipo_ajuda = $row2['tipo_ajuda'];
				$palavras_chave = $row2['palavras_chave'];
				$descricao = strip_tags($row2['descricao']);
				$limite_texto = 200;
				if (strlen($descricao) > $limite_texto){
					$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
					$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
				}
			?>
				<article class="container card">
					<h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
					</h3>
					<p class="card-descricao">
						<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					</p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		        </article>
        <?php
			}

		}

	}

	//MOSTRAR PROJETOS QUE SOLICITOU

	elseif ($filtro ==='solicita')
	{
		
		$consulta = "SELECT id_projeto FROM solicitacoes WHERE id_usuario = $id_usuario";
		$result = mysqli_query($conexao,$consulta);
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_assoc($result))
		{

			$id_projeto = $row['id_projeto'];

			$consulta2 = "SELECT * FROM projetos WHERE id = $id_projeto";
			$result2 = mysqli_query($conexao,$consulta2);
			if(!$result2){
				die(mysqli_error());
			}

			while($row2 = mysqli_fetch_assoc($result2))
			{

				$nome_projeto = $row2['nome'];
				$tipo_ajuda = $row2['tipo_ajuda'];
				$palavras_chave = $row2['palavras_chave'];
				$descricao = strip_tags($row2['descricao']);
				$limite_texto = 200;
				if (strlen($descricao) > $limite_texto){
					$pos_ultimo_espaço = strpos($descricao, ' ', $limite_texto);
					$descricao = substr($descricao, 0, $pos_ultimo_espaço)."...";
				}
			?>
				<article class="container card">
					<h3 class="card-titulo">
		                <a href="descricao.php?id=<?= $id_projeto; ?>"><?= $nome_projeto; ?></a>
					</h3>
					<p class="card-descricao">
						<a href="descricao.php?id=<?= $id_projeto; ?>"><?= $descricao; ?></a>
					</p>
		            <div id="tags">
			            <?php if ($tipo_ajuda == "Todos") { ?>
			              <span><a href="#1">Criação</a></span>
			              <span><a href="#2">Consultoria</a></span>
			            <?php } else { ?>
			              <span><a href="#2"><?= $tipo_ajuda; ?></a></span>
			            <?php } ?>
					</div>
					<a class="saiba-mais" href="descricao.php?id=<?= $id_projeto; ?>">SAIBA MAIS</a>
		        </article>
        <?php

			}

		}
	
	}

}

//MOSTRAR PADRAO

else {
	header('Location: meus_projetos.php?filtro=todos');
}
?>
</section>
<?php require "_footer.php" ?>