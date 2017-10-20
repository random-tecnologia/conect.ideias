<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conect.Ideias | Editar conta</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Montserrat:400,500,600,700" rel="stylesheet"> 
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  <nav id="navegacao">
    <div class="wrapper"> 
      <a href="achar_projeto.php"><img id="logo" src="img/logo.svg" alt="Logo Conect.Ideias"></a>
      <ul>
        <li><a id="destaque-azul" href="criar_projeto.php">Criar projeto</a></li>
        <li><a href="achar_projeto.php" class="selecionado">Achar projeto</a></li>
        <li><a href="meus_projetos.php">Meus projetos</a></li>
        <li><a href="notificacoes.php">Notificações</a></li>
      </ul>
      <div id="perfil" onclick="toggleDropdown();">
        <div id="separador"></div>
          <img id="avatar" src="img/avatar_kaique.jpg" alt="Avatar">
          <span id="nome">Roberto</span>
        <img id="seta" src="img/icone.png">
      </div>
      <div id="dropdown" class="esconder">
        <div id="unifica-menu"></div>
        <ul>
          <li><a href="perfil.php">Meu perfil</a></li>
          <li><a href="conta.php">Minha conta</a></li>
          <li><a href="sair.php">Sair</a></li>
        </ul>
      </div>
  </nav>

  <div id="titulo-pagina"><h1>Editar conta</h1></div>
  <div class="wrapper">
    <section class="container container-editar">
      <form id="formulario-editar" action="editar_conta.php" method="post">
        <label for="email">E-mail</label>
        <input type="text" name="email" placeholder="" required>
        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha_atual" placeholder="" required>
        <label for="nova_senha">Nova senha</label>
        <input type="password" name="nova_senha" placeholder="" required>
        <a href="#" id="excluir-conta">Excluir conta</a>
        <input class="btn-primario" type="submit" name="submit" value="Salvar">
        <div class="clearfix"></div>
      </form>
    </section>
  </div>

  <script type="text/javascript">
    function toggleDropdown(){
      var dropdown = document.getElementById("dropdown");
      dropdown.classList.toggle("esconder");
    };
  </script>
</body>
</html>