<?php  
require "db.php";
$consulta = "SELECT id FROM projetos";


    $result = mysqli_query($conn, $consulta);
    if(!$result){
        die('ERROR Volte Para A Pagina Principal');
    }

while($row = mysqli_fetch_assoc($result)){
   $id = end($row); 
}
echo "<script>location.href='ver_projeto.php?id=$id';</script>";

 //header('Location: ver_projeto.php?id=$id');
//  exit();






?>