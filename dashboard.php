<?php


include_once "dbconect.php";

session_start();

  if ($_SESSION['email']=="") {
    header('Location: login.php');
    exit;
  }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Dashboard</title>
</head>

<body>

  <nav>
    <ul>
      <a href="dashboard.php">

        <?php

        $select = $pdo->prepare("select * from tbl_user where nivel='Admin'");

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_OBJ)) {
          
          echo "<h1>$row->nome</h1>";
        }



      ?>

      </a>

      <div class="menu">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="/about">cadastrar estudante</a></li>
        <li><a href="/login">Pesquisar estudante</a></li>
        <li><a href="Login.php">Sair</a></li>
      </div>


    </ul>
  </nav>

  <div class="center">
    <h1>GERENCIAMENTO DE ESTUDANTES</h1>
    <div class="btns">
      <button>Cadastrar estudante</button>
      <button>Pesquisar estudante</button>
    </div>
  </div>

</body>

</html>