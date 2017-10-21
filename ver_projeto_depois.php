<?php  
require "db.php";
$consulta = "SELECT id FROM projetos";


    $result = mysqli_query($conn, $consulta);
    if(!$result){
        die('query failed');
    }

while($row = mysqli_fetch_assoc($result)){
   $id = end($row); 
}
echo "<script>location.href='ver_projeto.php?id=$id';</script>";

 //header('Location: ver_projeto.php?id=27');
//  exit();






?>