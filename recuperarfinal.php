<?php
include("config.php");


if(isset($_POST['senha'])) {
  $nome = mysqli_real_escape_string($MySQLi, $_POST['email']);
  $senha = mysqli_real_escape_string($MySQLi, trim(md5($_POST['senha'])));
  $consulta = $MySQLi->query("UPDATE TB_USUARIOS set USU_SENHA = '$senha'
  where USU_EMAIL = '{$nome}'");
 header("Location:login.php");
}

if(isset($_POST['senha'])) {
  $nome = mysqli_real_escape_string($MySQLi, $_POST['email']);
  $senha = mysqli_real_escape_string($MySQLi, trim(md5($_POST['senha'])));
  $consulta = $MySQLi->query("UPDATE TB_VISITANTES set VIS_SENHA = '$senha'
  where VIS_EMAIL = '{$nome}'");
 header("Location:login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <meta charset="utf-8">
     <title>Usuário Editar</title>
</head>
<body>
  <h3 align="center" style="font-family:'Times New Roman'"><strong>Editar:Senha</strong></h3>
    <div class="container">
    <hr>
  <form action="?" method="POST">

   <div class="form-group">
      <div class="form-group">
          <label  for="input1" style="font-family:'Times New Roman'"><strong>Email</strong></label>
          <input type="text"  id="input1" class="form-control" name="email">
      </div>

         
      <div class="form-group">
          <label  for="input4" style="font-family:'Times New Roman'"><strong>Senha</strong></label>
          <input type="password"  id="input1" class="form-control" name="senha">
      </div>

       <button class="btn btn-link text-dark" type="submit">Salvar</button>

 </form>
</div>

</body>
</html>
