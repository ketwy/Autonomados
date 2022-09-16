<?php
include("config.php");


if(isset($_GET['excluir'])) {
  $codigo = $_GET['excluir'];
  $consulta2 = $MySQLi->query("DELETE FROM TB_PRODUTOS
  WHERE PRO_CODIGO = $codigo");
  header("Location:produto.php");
} 

$consulta=$MySQLi->query("SELECT * FROM TB_PRODUTOS JOIN TB_RAMOS ON RAM_CODIGO=PRO_RAM_CODIGO JOIN TB_USUARIOS ON USU_CODIGO=PRO_USU_CODIGO");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listagem:Produtos</title>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
<body>
  <h3 align="center" style="font-family:'Times New Roman'"><strong>Listagem:Produtos</strong></h3>
  <div class="container">
    <table class="table table-hover">
      <tr>

        <th>Nome</th>
        <th>Preco</th>
        <th>Descrição</th>
        <th>Ramo</th>
        <th>Imagem</th>
    
        
      </tr>

       <?php while($resultado=$consulta->fetch_assoc()){ 
        $id=$resultado['PRO_CODIGO'];
        $foto_db=$resultado['PRO_IMAGEM'];
        ?>

      <tr>
  
        <td><?php echo $resultado['PRO_NOME'];?></td>
        <td><?php echo $resultado['PRO_PRECO'];?></td>
        <td><?php echo $resultado['PRO_DESCRICAO'];?></td>
        <td><?php echo $resultado['RAM_RAMO'];?></td>
        <td><?php echo $resultado['USU_NOME'];?></td>
        <td><img src="fotos/<?php echo $foto_db ?>" width=200 height=200></td>


        <td><a href="produto-editar.php?codigo=<?PHP echo $resultado['PRO_CODIGO']; ?>"><span class="glyphicon glyphicon-pencil"></span>| <a href="?excluir=<?PHP echo $resultado['PRO_CODIGO']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
    
    
        </tr>
    
      <?php } ?>
    </table>
</div>


</body>
</html>