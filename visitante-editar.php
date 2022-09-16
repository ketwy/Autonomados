<?php
include("config.php");
include("verifica.php");


$codigo = $_GET['codigo'];
if(isset($_POST['nome'])) {
  $nome = $_POST['nome'];
  $codigouvisitante = $_POST['codigouvisitante'];
  $email =$_POST['email'];


  $consulta20 = $MySQLi->query("SELECT * FROM TB_VISITANTES WHERE VIS_EMAIL = '".$_POST['email']."'");
  if(mysqli_num_rows($consulta20) >= 1){
      echo "<div class='alert alert-danger' role='alert'>Visitante já cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button></div>";
      return die;
  }else{
  $consulta = $MySQLi->query("UPDATE TB_VISITANTES set VIS_NOME = '$nome', VIS_EMAIL = '$email' where VIS_CODIGO = $codigouvisitante");
 header("Location:visitante.php");
}
}

$consulta3 = $MySQLi->query("SELECT * FROM TB_VISITANTES WHERE VIS_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta charset="utf-8">
     <title>Visitante Editar</title>
</head>
<body>
  <h3 align="center" style="font-family:'Times New Roman'"><strong>Editar:Visitante</strong></h3>
    <div class="container">
    <hr>
  <form action="?" method="POST">

   <div class="form-group">
    <label  for="input1" style="font-family:'Times New Roman'">
          <strong>Código:</strong></label>
          <input type="text"  id="input1" class="form-control" 
          name="codigouvisitante"   value="<?php echo $resultado3['VIS_CODIGO']; ?>" READONLY STYLE="pointer-events: none;background: #ccc;">
      </div>

      <div class="form-group">
          <label  for="input2" style="font-family:'Times New Roman'"><strong>Nome do cliente:</strong></label>
          <input type="text"  id="input2" class="form-control" name="nome" value="<?php echo $resultado3['VIS_NOME']; ?>">
      </div>

        <div class="form-group">
          <label  for="input7" style="font-family:'Times New Roman'"><strong>Email</strong></label>
          <input type="text"  id="input7" class="form-control" name="email" value="<?php echo $resultado3['VIS_EMAIL']; ?>">
        </div>

       <button class="btn btn-link text-dark" type="submit">Salvar</button>

 </form>
</div>

</body>
</html>
