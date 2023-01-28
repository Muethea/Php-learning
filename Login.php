<?php

include_once 'dbconect.php';

session_start();

  if (isset($_POST['btn_entrar'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    
  $select = $pdo->prepare("select * from tbl_user where email='$email' AND password='$password'");

  $select->execute();

  $row = $select->fetch();


  if ($row['email'] == $email AND $row['password'] == $password AND $row['nivel']=="Admin"){

    $_SESSION['id'] =$row ['id'];
    $_SESSION['nome'] =$row ['id'];
    $_SESSION['email'] =$row ['email'];
    $_SESSION['password'] =$row ['password'];
    $_SESSION['nivel'] =$row ['nivel'];

    echo "<script src='https://cdn.jsdelivr.net/npm/notifyjs@3.1.0/notify.min.js'></script>";
    echo "<script>$.notify('Autenticação realizada com sucesso!', {className: 'success', position: 'top center'});</script>";
    header('refresh:1;dashboard.php');
  }

  else if($row['email'] == $email AND $row['password'] == $password AND $row['nivel']=="User"){
    $_SESSION['id'] =$row ['id'];
    $_SESSION['nome'] =$row ['id'];
    $_SESSION['email'] =$row ['email'];
    $_SESSION['password'] =$row ['password'];
    $_SESSION['nivel'] =$row ['nivel'];
  
  
    header('refresh:1;user.php');
  

  }else{
    echo "Usuario incorrecto";
  }

  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <title>Academy</title>
</head>

<body>

  <div class="back">
    <div class="login">


      <form method="post" action="" class="form">
        <h1>Gerenciamento de <span>Estudantes</span> </h1>
        <div class="form-email-pass">
          <input type="email" name="email" placeholder="Digite o email" />

          <input type="password" name="password" placeholder="Password">
        </div>


        <input class="btn" type="submit" value="Entrar" name="btn_entrar">
      </form>

    </div>
  </div>
</body>

</html>