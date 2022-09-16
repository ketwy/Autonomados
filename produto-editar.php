<?php
include("config.php");


$codigo = $_GET['codigo'];

if(isset($_POST['nome'])) {
  $nome = $_POST['nome'];
  $codigoproduto = $_POST['codigoproduto'];
  $preco=$_POST['preco'];
  $descricao=$_POST['descricao'];
  $foto=$_FILES['arquivo']['name'];

if($foto==""){
 $consulta = $MySQLi->query("UPDATE TB_PRODUTOS set PRO_NOME = '$nome', PRO_PRECO = '$preco' , PRO_DESCRICAO= '$descricao' where PRO_CODIGO = $codigoproduto");
 header("Location:produto.php");
}
}
$consulta3 = $MySQLi->query("SELECT * FROM TB_PRODUTOS WHERE PRO_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
     <title>Produto Editar</title>
</head>
<body>
	<h3 align="center" style="font-family:'Times New Roman'"><strong>Editar:Produto</strong></h3>
  	<div class="container">
    <hr>
 	<form action="?" method="POST">

 	 <div class="form-group">
          <label  for="input1" style="font-family:'Times New Roman'"><strong>Código:</strong></label>
          <input type="text"  id="input1" class="form-control" name="codigoproduto"   value="<?php echo $resultado3['PRO_CODIGO']; ?>" READONLY STYLE="pointer-events: none;background: #ccc;">
      </div>

      <div class="form-group">
          <label  for="input2" style="font-family:'Times New Roman'"><strong>Nome do produto:</strong></label>
          <input type="text"  id="input2" class="form-control" name="nome" value="<?php echo $resultado3['PRO_NOME']; ?>">
      </div>

      <div class="form-group">
          <label  for="input3" style="font-family:'Times New Roman'"><strong>Preço:</strong></label>
          <input type="text"  id="input3" class="form-control" name="preco" value="<?php echo $resultado3['PRO_PRECO']; ?>">
        </div>

        <div class="form-group">
          <label  for="input4" style="font-family:'Times New Roman'"><strong>Descrição:</strong></label>
          <input type="text"  id="input4" class="form-control" name="descricao" value="<?php echo $resultado3['PRO_DESCRICAO']; ?>">
        </div>

      
      
       <button class="btn btn-link text-dark" type="submit">Salvar</button>

 </form>
</div>

</body>
</html>
