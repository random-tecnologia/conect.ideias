<?php
$titulo_pagina = "Editar perfil";
$nome_arquivo = basename(__FILE__, ".php");
require "_header.php"; 
require "_bulletproof.php";
?>

<?php
if(isset($_POST["submit"])){ // comando abaixo significa que só será executado se houver preenchimento do campo submit
  
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $telefone = $_POST["telefone"];

  $image = new Bulletproof\Image($_FILES);
  $image->setSize(0, 50000);
  $image->setMime(array('jpeg', 'png'));  
  $image->setLocation("avatar");  

  if($image["avatar"]){
      $avatar = $image->upload(); 
      if($avatar){
        $avatar_caminho = $avatar->getFullPath();
        $sem_arquivo = false;
      }else{
          if ($image["error"] == "No file"){
            $sem_arquivo = true;
          } else {
            echo $image["error"];
          } 
      }
  }
  if ($sem_arquivo){
    $consulta2 = "update usuarios set nome = '$nome', descricao = '$descricao' , telefone ='$telefone' where id = $id_usuario";
  } else {
    $consulta2 = "update usuarios set nome = '$nome', descricao = '$descricao' , telefone ='$telefone', avatar='$avatar_caminho' where id = $id_usuario";
  }
  mysqli_query($conexao, $consulta2) or die(mysqli_error());
  header('Location: perfil.php');
}

$consulta = "select nome, descricao , telefone from usuarios where id like $id_usuario";//seleciona de onde vc quer tirar os dados
$resultado = mysqli_query($conexao, $consulta);//faz a consulta e armazena num array
while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
  $nome = $row['nome'];
  $descricao = $row['descricao'];
  $telefone = $row['telefone'];
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
      <textarea id="descricao" name="descricao" class="editor-perfil"><?=$descricao; ?></textarea>
      <label for="avatar">Avatar</label>
      <input type="hidden" name="MAX_FILE_SIZE" value="500000"/>
      <input type="file" name="avatar" class="inputfile" value="avatar/placeholder-avatar.png" accept="image/*">
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