<?php 

$nome = $_POST['nome'];
$telefone = $_POST['telefone']
$descricao = $_POST['descricao'];


$connect = mysql_connect('nome_do_servidor','nome_de_usuario','senha');
$db = mysql_select_db('nome_do_banco_de_dados');


$query = "INSERT INTO usuarios (nome,descricao,telefone) VALUES ('$nome','$descricao','$telefone')";
$insert = mysql_query($query,$connect);
if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Formulário completo');window.location.href=''</script>";
        }
//inserir href para próxima página
        else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível enviar esse formulário');window.location.href='formulario.php'</script>";
        }
?>    