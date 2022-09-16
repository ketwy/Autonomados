<?php
include("config.php");

$consulta2= $MySQLi-> query("SELECT * FROM TB_RAMOS");

$consulta3= $MySQLi-> query("SELECT * FROM TB_CIDADES JOIN TB_ESTADOS ON CID_EST_CODIGO=EST_CODIGO");
$consulta1=$MySQLi->query("SELECT * FROM TB_PRODUTOS JOIN TB_USUARIOS ON USU_CODIGO=PRO_USU_CODIGO JOIN TB_RAMOS ON RAM_CODIGO=PRO_RAM_CODIGO");

if(isset($_POST['ramo'])) {
  $codramo=$_POST['ramo'];
  $cid=$_POST['cid'];
  $consulta1=$MySQLi->query("SELECT * FROM TB_PRODUTOS JOIN TB_USUARIOS ON USU_CODIGO=PRO_USU_CODIGO JOIN TB_RAMOS ON RAM_CODIGO=PRO_RAM_CODIGO where PRO_RAM_CODIGO=$codramo AND USU_CID_CODIGO=$cid");
} 

?>
<html>
  <head>
  	<meta charset="utf-8">
    <title>AUTONOMADOS! Sistema de serviços autonomos!</title>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  </head>
  <body >

    <div class="jumbotron jumbotron-fluid text-center bg-dark" style="margin-bottom:0;">
      <h1  class="text-success display-1 font-weight-bold">AUTONOMADOS</h1>
      <p class="text-success">COMPRE, EXPONHA, NEGOCIE!</p> 
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
      <a class="navbar-brand text-success" href="index.php"><i class='fas fa-home mr-1' style='color: green'></i>Home</a>
      <button class="navbar-toggler text-success" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="nav-link text-success" href="login.php">Login</a>
        <form class="form-inline my-2 my-lg-0" action="index1.php" method="POST" name="procurar" style="position: absolute;left: 53%">
              <select class="form-control custom-select d-block  ml-1" name="cid">
                  <option>Cidades</option>
                  <?php while ($resultado3 = $consulta3->fetch_assoc()){ ?>
                    <option value="<?php echo $resultado3['CID_CODIGO']; ?>"><?php echo $resultado3['CID_CIDADE']; ?>, <?php echo $resultado3['EST_UF']; ?></option>
                  <?PHP } ?>
                </select>
                <select name="ramo" class="form-control custom-select d-block  ml-1">
                  <option>Ramo</option>
                  <?php while ($resultado1 = $consulta2->fetch_assoc()){ ?> 
                    <option value="<?php echo $resultado1['RAM_CODIGO']; ?>"><?php echo $resultado1['RAM_RAMO']; ?></option>
                  <?PHP } ?>
                </select>
      <button class="btn btn-success ROUNDED ml-1" type="submit">Pesquisar</button>
            
    </form>
      </div>  
    </nav>

    <div class="container-fluid" style="background-color: lightgray;" >
      <div class="row">
       <div class="col-sm">
       	<div class="card-columns">  

       	<?php while($resultado=$consulta1->fetch_assoc()){ 
          $id=$resultado['PRO_CODIGO'];
        $foto_db=$resultado['PRO_IMAGEM'];
          ?>

          <div class="card mb-3 mt-3 mr-3" >
            <img src="fotos/<?php echo $foto_db ?>" width="100" class="card-img-top" alt="<?php echo $resultado['RAM_RAMO'];?>" title="<?php echo $resultado['PRO_NOME'];?>" style="width:100%">
          <div class="card-body">
            <h4 class="card-title"><?php echo $resultado['PRO_NOME'];?><span class="badge badge-secondary ml-3"><?php echo $resultado['RAM_RAMO'];?></span></h4>
            <ul class="small mt-3 list-unstyled card-text">
              <li><span class="font-weight-bold">Preço:</span> R$:<?php echo $resultado['PRO_PRECO'];?></li>
              <li><span class="font-weight-bold">Contato:</span><?php echo $resultado['USU_TELEFONE'];?> </li>
            </ul>
            <a href="vermais.php?ver=<?php echo $resultado['PRO_CODIGO'];?>"><button class="btn btn-success text-dark rounded">ver mais</button></a>
          </div>
        </div>      
    
      <?php } ?>

  </div>
    
</div>
</div>
    <div class="row">
    <div class="text-center bg-dark jumbotron jumbotron-fluid col-12" style="margin-bottom:0">
       <h5 class="text-success"> @Desenvolvido por Ketlly Azevêdo ,Daniel Lucas e Amanda Cristina, 2019.</h5>
    </div>
  </div>

  </body>
</html>

<?php include("bot.php");?>