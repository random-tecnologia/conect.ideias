<?php
$conexao = mysqli_connect("localhost", "root", "", "conect_ideias");
$conexao->set_charset('utf8');

if(!$conexao){
    echo "<div style=\"color:red; background-color:white;\">Erro de conexao com o Banco de Dados</br>".mysqli_connect_error()."</div";
}

?>