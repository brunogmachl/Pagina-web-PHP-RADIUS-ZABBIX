<?php 
require_once("conexao-radius-db.php");
 ?>
<?php
// session_start();
?>
<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="painel/css/stylo2.css">
  <link rel="shorcut icon" type="image/x-icon" href="painel/images/claro.gif" />
</head>
<body>
  <div id="login-container">
    <h1 style="text-transform: uppercase;text-align: center;font-size: 25px;color: rgb(248, 250, 250);">RADIUS VOC</h1>
    <img src="painel/images/fd_logo.svg" width=100px alt="">
    <!-- <script src="post.js"></script> -->
    
    <form accept-charset="UTF-8" role="form" action="autenticar.php" method="post">
      <label for="email"></label>
      <input type="text" name="email" id="email" placeholder="Digite seu login de rede" type="text" autocomplete="off">
      <label for="password"></label>
      <input type="password" name="senha" id="password" placeholder="Digite sua senha" >
      <!-- <a href="#" id="forgot-pass">Esqueceu a password?</a> -->
      <input type="submit" value="Login">
      <?php
      if(isset($_SESSION["nao autenticado"])):
      ?>
      <input type="bbbb" value="senha invalida">
      <?php
      endif;
      unset($_SESSION["nao autenticado"]);   
      ?>
    </form>
  </div>
</body>
</html>