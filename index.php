<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conect.Ideias | Index</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
  </head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['email']; ?>!</p>
<p>This is secure area.</p>
<p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>