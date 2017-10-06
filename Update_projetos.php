<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "conect_ideias");

	if (!$conn){ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	}

	
	$consulta = "SELECT nome,descricao FROM prj";


	$result = mysqli_query($conn, $consulta);
	if(!$result){
		die('query failed');
	}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Ler projeto</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		while ($row = mysqli_fetch_assoc($result)) {
			
			echo $row['nome']."<br/>";
			echo $row['descricao']."<hr/>";
		}


	?>


</body>
</html>