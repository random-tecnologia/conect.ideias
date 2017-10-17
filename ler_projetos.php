<?php
	
	require 'db.php';
	require 'select_db.php';



	while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			echo $row['nome']."<br/>";
			echo $row['descricao'];
			echo "<a href=\"ver_projeto.php?id=$id\">Ver projeto</a><hr/>";
	}


	?>
