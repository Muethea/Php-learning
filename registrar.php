<?php


include_once "dbconect.php";

session_start();

  if ($_SESSION['email']=="") {
    header('Location: login.php');
    exit;
  }

  if(isset($_POST["btncadastrar"])){

    $nome = $_POST["textname"];
    $email = $_POST["textemail"];
    $contacto = $_POST["contacto"];
    $endereco =$_POST["textendereco"];
    $curso = $_POST["textcurso"];


    if($nome != "" && $email !="" && $contacto !="" && $endereco !="" && $curso !=""){

    $insert = $pdo->prepare("insert into  tbl_estudantes (nome, email, telefone, endereco, curso) values(:nome, :email, :contacto, :endereco, :curso)");

    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':contacto', $contacto);
    $insert->bindParam(':endereco', $endereco);
    $insert->bindParam(':curso', $curso);



   if( $insert = $insert->execute()){
      echo "Registado com sucesso";
   }else{
      echo "Erro ao registar";
   }

    }else{
    echo "Campos Vasios";
    }

    
  }
      
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="dashboard.css">
  <title>Registar de estudantes</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg menu bg-black-tertiary">
    <div class="container-fluid mx-auto">
      <a class="navbar-brand " href="dashboard.php">Academy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav p-2 me-auto mb-2 mb-lg-0">

        </ul>
        <ul class="navbar-nav p-2 me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="dashboard.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="registrar.php">cadastrar estudante</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pesquisar.php">Pesquisar estudante</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Sair</a>
          </li>
        </ul>
        <form class="d-flex d-flex justify-content-start" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container formulario">
    <form action method="POST">
      <div class="form-group">
        <label for="inputName">Nome</label>
        <input type="text" class="form-control" id="inputName" name="textname" placeholder="Insira o nome do estudante">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="textemail"
          placeholder="Insira o email do estudante">
      </div>
      <div class="form-group">
        <label for="inputPhone">Telefone</label>
        <input type="text" class="form-control" id="inputPhone" maxlength="9" pattern="[0-9]+"
          placeholder="Insira o telefone do estudante" name="contacto">
      </div>
      <div class="form-group">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" name="textendereco"
          placeholder="Insira o endereço do estudante">
      </div>
      <div class="form-group">
        <label for="inputCourse">Curso</label>
        <input type="text" class="form-control" id="inputCourse" name="textcurso"
          placeholder="Insira o curso do estudante">
      </div>
      <button type="submit" class="btn btn-primary" name="btncadastrar">Cadastrar</button>
    </form>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
  </script>

  <script>
  var phoneInput = document.getElementById("inputPhone");

  phoneInput.addEventListener("input", function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });
  </script>
</body>

</html>