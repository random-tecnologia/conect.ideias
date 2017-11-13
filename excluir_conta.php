<?php
require "_header.php";

$conn = mysqli_connect("localhost", "root", "", "conect_ideias");
$id_usuario = $_SESSION['id_usuario']; // TODO: Pegar id da sessão automaticamente 
$consulta2 = "delete from usuarios where id = $id_usuario";
mysqli_query($conn, $consulta2);
session_destroy();
header('location:login.php');

?>