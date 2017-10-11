<?php 

$login = $_POST['email'];
$senha = MD5($_POST['senha']);
$connect = mysqlI_connect('localhost','root','','conect_ideias');
$query_select = "SELECT email FROM usuarios WHERE email = '$login'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.php';</script>";
    }
    else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
        die();
      }
      else{
        $query = "INSERT INTO usuarios (email,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($connect,$query);
        
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='formulario.php'</script>";
        }
        else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
        }
      }
    }
?>