<?php

include_once 'dbconect.php';

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
  <title>User</title>
</head>

<body>
  <h1>Bem vindo Usuario</h1>
</body>

</html>