<?php
$nome_arquivo = basename(__FILE__, ".php");
require "_projeto.php";
?>

<div class="wrapper">
    <div class="filtro filtro-equipe">
          <ul>
            <li><a href="equipe.php?id=<?php echo $id; ?>&filtro=todos" class="<?= $_GET['filtro'] == todos ? 'selecionado' : '' ?>">Todos</a></li>
            <li><a href="equipe.php?id=<?php echo $id; ?>&filtro=cria" class="<?= $_GET['filtro'] == cria ? 'selecionado' : '' ?>">Criação</a></li>
            <li><a href="equipe.php?id=<?php echo $id; ?>&filtro=consulta" class="<?= $_GET['filtro'] == consulta ? 'selecionado' : '' ?>">Consultoria</a></li>
          </ul>
    </div>
    <div class="clearfix"></div>
	<section class="container container-lista equipe">
		<ul>
            
			<?php  

			if(isset($_GET['id'])){

				if(isset($_GET['filtro'])){

					$filtro = $_GET['filtro'];
					$id = $_GET['id'];

					if($filtro === 'todos'){

						$consulta = "SELECT id_usuario,tipo_ajuda FROM usuarios_projetos WHERE id_projeto = $id";
						$result = mysqli_query($conexao,$consulta);
						
						if(!$result){
							die(mysqli_error());
						}
						
						while($row = mysqli_fetch_assoc($result)){
						
							$id_usuario = $row['id_usuario'];
							$tipo_ajuda = $row['tipo_ajuda'];
							
							$consulta2 = "SELECT nome,email,telefone, avatar FROM usuarios WHERE id=$id_usuario";
							$result2 = mysqli_query($conexao,$consulta2);
							if(!$result2){
								die(mysqli_error());
							}
							while($row2 = mysqli_fetch_assoc($result2))
							{ 
								$nome = $row2['nome'];
								$email = $row2['email'];
								$telefone = $row2['telefone'];
								$avatar = $row2['avatar'];
							?> 
								<li class="participante">
					            	<a href="perfil.php?id=<?= $id_usuario; ?>" class="avatar"><img src="<?= $avatar; ?>" alt="<?= $nome; ?>"></a>
					                <a href="perfil.php?id=<?= $id_usuario; ?>" class="identificacao">
					                	<h3 class="nome"><?= $nome; ?></h3>
					                	<div class="tipo-ajuda">
						                	<span><?= $tipo_ajuda; ?></span>
					                	</div>
					                </a>
					                <div class="contato">
					                    <span><?= $email; ?></span>
					                    <span><?= $telefone; ?></span>
					                </div>
					                <div class="acoes">
					                	<a href="remover_da_equipe.php?id=<?= $id; ?>&id_usuario=<?= $id_usuario; ?>" class="rejeitar">Remover</a>
					                	<a href="perfil.php?id=<?= $id_usuario; ?>" class="ver-perfil">Ver perfil</a>
					                </div>
					            </li>
					<?php	}
						}
					}
					elseif($filtro === 'cria'){

						$consulta = "SELECT id_usuario,tipo_ajuda FROM usuarios_projetos WHERE id_projeto = $id AND (tipo_ajuda = 'criacao' OR tipo_ajuda = 'todos') ";
						$result = mysqli_query($conexao,$consulta);
						
						if(!$result){
							die(mysqli_error());
						}
						
						while($row = mysqli_fetch_assoc($result)){
						
							$id_usuario = $row['id_usuario'];
							$tipo_ajuda = $row['tipo_ajuda'];
							
							$consulta2 = "SELECT nome,email,telefone, avatar FROM usuarios WHERE id=$id_usuario";
							$result2 = mysqli_query($conexao,$consulta2);
							if(!$result2){
								die(mysqli_error());
							}
							while($row2 = mysqli_fetch_assoc($result2))
							{ 
								$nome = $row2['nome'];
								$email = $row2['email'];
								$telefone = $row2['telefone'];
								$avatar = $row2['avatar'];
							?> 
								<li class="participante">
					            	<a href="perfil.php?id=<?= $id_usuario; ?>" class="avatar"><img src="<?= $avatar; ?>" alt="<?= $nome; ?>"></a>
					                <a href="perfil.php?id=<?= $id_usuario; ?>" class="identificacao">
					                	<h3 class="nome"><?= $nome; ?></h3>
					                	<div class="tipo-ajuda">
						                	<span><?= $tipo_ajuda; ?></span>
					                	</div>
					                </a>
					                <div class="contato">
					                    <span><?= $email; ?></span>
					                    <span><?= $telefone; ?></span>
					                </div>
					                <div class="acoes">
					                	<a href="remover_da_equipe.php?id=<?= $id; ?>&id_usuario=<?= $id_usuario; ?>" class="rejeitar">Remover</a>
					                	<a href="perfil.php?id=<?= $id_usuario; ?>" class="ver-perfil">Ver perfil</a>
					                </div>
					            </li>
					<?php	}
						}



					}
					elseif($filtro === 'consulta'){

						$consulta = "SELECT id_usuario,tipo_ajuda FROM usuarios_projetos WHERE id_projeto = $id AND (tipo_ajuda = 'consultoria' OR tipo_ajuda = 'todos')";
						$result = mysqli_query($conexao,$consulta);
						
						if(!$result){
							die(mysqli_error());
						}
						
						while($row = mysqli_fetch_assoc($result)){
						
							$id_usuario = $row['id_usuario'];
							$tipo_ajuda = $row['tipo_ajuda'];
							
							$consulta2 = "SELECT nome,email,telefone, avatar FROM usuarios WHERE id=$id_usuario";
							$result2 = mysqli_query($conexao,$consulta2);
							if(!$result2){
								die(mysqli_error());
							}
							while($row2 = mysqli_fetch_assoc($result2))
							{ 
								$nome = $row2['nome'];
								$email = $row2['email'];
								$telefone = $row2['telefone'];
								$avatar = $row2['avatar'];
							?> 
								<li class="participante">
					            	<a href="perfil.php?id=<?= $id_usuario; ?>" class="avatar"><img src="<?= $avatar; ?>" alt="<?= $nome; ?>"></a>
					                <a href="perfil.php?id=<?= $id_usuario; ?>" class="identificacao">
					                	<h3 class="nome"><?= $nome; ?></h3>
					                	<div class="tipo-ajuda">
						                	<span><?= $tipo_ajuda; ?></span>
					                	</div>
					                </a>
					                <div class="contato">
					                    <span><?= $email; ?></span>
					                    <span><?= $telefone; ?></span>
					                </div>
					                <div class="acoes">
					                	<a href="remover_da_equipe.php?id=<?= $id; ?>&id_usuario=<?= $id_usuario; ?>" class="rejeitar">Remover</a>
					                	<a href="perfil.php?id=<?= $id_usuario; ?>" class="ver-perfil">Ver perfil</a>
					                </div>
					            </li>
					<?php	}
						}

					}

				}
				else{
					header("Location: equipe.php?id=$id&filtro=todos");
					exit();
				}

			}
			else{
				echo "<script>window.history.go(-1)</script>";
				exit();
			}

			?>
        </ul>
	</section> 
</div>

<?php require "_footer.php" ?>