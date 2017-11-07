<?php  
$conn = mysqli_connect("localhost", "root", "", "conect_ideias");
session_start();

$id_usuario = $_SESSION['id_usuario'];

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$consulta = "select descricao,avatar,telefone from usuarios where id = $id";
	$resultado = mysqli_query($conn, $consulta);
while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		 $desc = $row["descricao"]."</br >";
		 $ava = $row["avatar"]."</br >";
		 $tel = $row["telefone"];
		 echo "$desc $ava $tel";
	}
}

else{
$consulta = "select descricao,avatar,telefone from usuarios where id = $id_usuario";
$resultado = mysqli_query($conn, $consulta);
while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		 $desc = $row["descricao"]."</br >";
		 $ava = $row["avatar"]."</br >";
		 $tel = $row["telefone"];
		 echo "$desc $ava $tel";
	}
}
?>