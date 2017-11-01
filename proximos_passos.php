<?php  

require "db.php";

$id = $_GET['id'];

session_start();

$consulta = "SELECT id_usuario FROM usuarios_projetos WHERE id_projeto = $id";
				
$result = mysqli_query($conn,$consulta);

if(!$result){
	die(mysqli_error());
}

$participa = FALSE;

while($row = mysqli_fetch_assoc($result)){

	if($row['id_usuario']==$_SESSION['id_usuario']){

		$participa = TRUE;
	}
}

$verifica = "SELECT id_dono, proximos_passos FROM projetos WHERE id = $id";

$resultado = mysqli_query($conn,$verifica);

if(!$resultado){
	die(mysqli_error());
}

while($row2 = mysqli_fetch_assoc($resultado)){
	$id_dono = $row2['id_dono'];

	if($participa OR $id_dono==$_SESSION['id_usuario']){

		echo $row2['proximos_passos'];

	}

}




?>