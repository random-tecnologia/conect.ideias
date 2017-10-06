<?php

// Create connection
$conn = new mysqli("127.0.0.1", "root", "", "conect_ideias");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $consulta = "INSERT INTO prj VALUES(NULL,'sadfasdf', 'dasfdasdf', 'asdfasdfasdf',25 ,25, 'sfgasdfasd', 'criacao', 1, 'asdfasd');";
	
	/*$consulta = "INSERT INTO projetos (nome, descricao, proximos_passos, quantidade_max, palavras_chave, tipo_ajuda, estado, criado_em, id_dono) VALUES ('sadfasdf', 'dasfdasdf', 'asdfasdfasdf',25 , 'sfgasdfasd', 'criacao', 1, 'asdfasd',32)";*/

	$result = mysqli_query($conn, $consulta);
	if($result){
		echo ("bacana");
	}else{echo ("paiera");}


$conn->close();
?>