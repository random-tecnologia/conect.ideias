<?php  
$conn = mysqli_connect("localhost", "root", "", "conect_ideias");
$id_usuário = 2;
$consulta = "select descricao,avatar,telefone from usuarios where id = $id_usuário";
$resultado = mysqli_query($conn, $consulta);
while ($row = mysqli_fetch_array($resultado)){// armazena temporariamente os dados do banco
		 $desc = $row["descricao"]."</br >";
		 $ava = $row["avatar"]."</br >";
		 $tel = $row["telefone"];
		 echo "$desc, $ava, $tel";
}
?>