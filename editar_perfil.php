<!-- TODO: Validar o arquivo enviado -->
<?php
$titulo_pagina = "Editar perfil";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php"; 
?>

<?php
if(isset($_POST["submit"])){ // comando abaixo significa que só será executado se houver preenchimento do campo submit
  
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $telefone = $_POST["telefone"];
  
  if(isset($_FILES['avatar'])) {
    $erros     = array();
    $tam_max    = 2097152;
    $aceitaveis = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    $avatar = "avatar/".$_FILES['avatar']['name']; 

    if(($_FILES['avatar']['size'] >= $tam_max) || ($_FILES["avatar"]["size"] == 0)) {
        $errors[] = 'Arquivo muito grande. Seu avatar deve ter menos que 2mb.';
    }

    else if((!in_array($_FILES['avatar']['type'], $aceitaveis)) && (!empty($_FILES["avatar"]["type"]))) {
        $errors[] = 'Formato de arquivo inválido. Apenas os tipos: PDF, JPG, GIF e PNG são aceitos.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
    } else {
        foreach($erros as $erro) {
            echo '<script>alert("'.$erro.'");</script>';
        }

        die();
    }
  }

  $consulta2 = "update usuarios set nome = '$nome', descricao = '$descricao' , telefone ='$telefone', avatar='$avatar' where id = $id_usuario";
  $resultado = mysqli_query($conexao, $consulta2) or die(mysqli_error());
  header("Location: perfil.php");
  exit();
}

$consulta = "select nome, descricao , telefone, avatar from usuarios where id like $id_usuario";//seleciona de onde vc quer tirar os dados
$resultado = mysqli_query($conexao, $consulta);//faz a consulta e armazena num array
while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
  $nome = $row['nome'];
  $descricao = $row['descricao'];
  $telefone = $row['telefone'];
  $avatar = $row['avatar'];
?>

<div id="titulo-pagina"><h1><?= $titulo_pagina; ?></h1></div>
<div class="wrapper">
  <section class="container container-editar">
    <form id="formulario-editar" action="editar_perfil.php" method="post" enctype="multipart/form-data">
      <label for="nome">Nome</label>
      <input type="text" name="nome" value="<?= $nome; ?>" required>
      <label for="descricao">
        Descrição
        <p>Dê mais detalhes sobre você para que possam te escolher.</p>
      </label>
      <textarea id="descricao" name="descricao" class="editor-perfil" required><?=$descricao; ?></textarea>
      <label for="avatar">Avatar</label>
      <input type="hidden" name="MAX_FILE_SIZE" value="100000">
      <input type="file" name="avatar" class="inputfile" value="<?= $avatar ?>" required>
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" value="<?= $telefone; ?>" required="">
      <input class="btn-primario" type="submit" name="submit" value="Salvar">
      <div class="clearfix"></div>
    </form>
  </section>
</div>

<?php
}
?>

<!-- Editor WYSIWYG -->
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor-perfil' ), {
            heading: {
                options: [
                    { modelElement: 'paragraph', title: 'Parágrafo', class: 'ck-heading_paragraph' },
                    { modelElement: 'heading1', viewElement: 'h3', title: 'Cabeçalho 1', class: 'ck-heading_heading1' },
                    { modelElement: 'heading2', viewElement: 'h4', title: 'Cabeçalho 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php require "_footer.php"; ?>