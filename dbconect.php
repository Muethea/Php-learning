<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=cadastro_db', 'root', '');
} catch (PDOException $f) {
 echo $f->getMessage();
}




?>