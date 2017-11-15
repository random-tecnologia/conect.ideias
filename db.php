<?php
$conexao = mysqli_connect("localhost", "root", "", "conect_ideias");
$conexao->set_charset('utf8');

if(!$conexao){
    echo "<div style=\"color:red; background-color:white;\">Erro de conexao com o Banco de Dados</br>".mysqli_connect_error()."</div";
}
?>

<!-- <?php
// $conexao = mysqli_connect("mysql.hostinger.com.br", "u351334641_ci", "R0ixMh0J", "u351334641_dbci");
// $conexao->set_charset('utf8');

// if(!$conexao){
//     echo "<div style=\"color:red; background-color:white;\">Erro de conexao com o Banco de Dados</br>".mysqli_connect_error()."</div";
// }
?> -->