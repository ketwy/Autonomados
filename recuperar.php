<?php
include("config.php");

if(isset($_POST['frase'])) {
  $nome = mysqli_real_escape_string($MySQLi, $_POST['email']);
  $frase = mysqli_real_escape_string($MySQLi, $_POST['frase']);
  $consulta = $MySQLi->query("SELECT * FROM
  TB_USUARIOS where USU_EMAIL = '{$nome}' and USU_FRASE = md5('{$frase}')");
   if($resultado = $consulta->fetch_assoc()){
          header("Location:recuperarfinal.php");
    }else{
        header("Location:login.php");
    }
  }
if(isset($_POST['frase'])) {
  $nome = mysqli_real_escape_string($MySQLi, $_POST['email']);
  $frase = mysqli_real_escape_string($MySQLi, $_POST['frase']);
  $consulta = $MySQLi->query("SELECT * FROM
  TB_VISITANTES where VIS_EMAIL = '{$nome}' and VIS_FRASE = md5('{$frase}')");
   if($resultado = $consulta->fetch_assoc()){
          header("Location:recuperarfinal.php");
    }else{
        header("Location:login.php");
    }
  }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Amanda Cristina,Daniel Lucas e Ketlly Azevêdo">
    <meta name="description" content="AUTONOMADOS! Sistema de serviços autonomos!">
    <meta name="keywords" content="acessar,comprar,home,login">
    <link rel="icon" href="autonomados.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
  <title>Insert:Usuários</title>
</head>
<body>
  <h3 align="center" style="font-family:'Times New Roman'"><strong>Insert Usuários</strong></h3>

  <div class="container">
  <form action="?" method="POST">
      <div class="form-group">
          <label  for="input1" style="font-family:'Times New Roman'"><strong>Digite seu email</strong></label>
          <input type="text"  id="input1" class="form-control" required name="email" id="email">
        </div>

        <div class="form-group">
          <label  for="input2" style="font-family:'Times New Roman'"><strong>Digite a frase de seguranca</strong></label>
          <input type="text"  id="input2" class="form-control" required name="frase" id="frase">
        </div>

        <input type="submit" class=" btn btn-light text-dark font-weight-bold" style="font-family:'Times New Roman'" value="Inserir!">

    </form>
  </div>

</body>
</html>
