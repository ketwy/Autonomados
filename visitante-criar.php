<?php
include("config.php");


if(isset($_POST['nome'])){  
  $nome=$_POST['nome'];
  $email = mysqli_real_escape_string($MySQLi, trim($_POST['email']));
  $senha = mysqli_real_escape_string($MySQLi, trim(md5($_POST['senha'])));
  $frase = mysqli_real_escape_string($MySQLi, trim(md5($_POST['frase'])));

  $consulta=$MySQLi->query("SELECT * FROM TB_VISITANTES WHERE VIS_EMAIL = '".$_POST['email']."'");
  if(mysqli_num_rows($consulta) >= 1){
    echo "<div class='alert alert-danger' role='alert'>Usuário já cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button></div>";

  
  }else{
      $consulta=$MySQLi->query("insert into TB_VISITANTES (VIS_NOME,VIS_EMAIL,VIS_SENHA,VIS_FRASE)
  values('$nome','$email','$senha','$frase')");
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
  <title>Login Visitante</title>
</head>

  <body class="bg-success">
   <style>
   
    .modal-dialog {
      width: 90%;
      height: 90%;
      margin: 0;
      padding: 0;
      position:relative;
      left:23%;
    }

  .modal-content {
      height: auto;
      min-height: 100%;
     border-radius: 0;
  }
  </style>

  <div class="jumbotron jumbotron-fluid text-center bg-dark" style="margin-bottom:0;">
      <h1  class="text-success display-3 font-weight-bold">Seja um Visitante</h1> 
      <h5 class="text-success">preencha os campos a baixo</h5>
    </div>


    <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-body" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <div class="container-fluid">
    <div class="row">
      <div class="col-sm ml-auto"> 
      <iframe frameborder="1" name="siteswitch" id="siteswitch" width="100%" style="height:100vh;"  src="https://www.mapcoordinates.net/pt">
    </iframe>
  </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>

 <form action="?" method="POST" enctype="multipart/form-data" >
    <div class="container">
      <div class="row mt-3 rounded bg-light">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-1 mt-3">
        </div>          
        <div class="col-sm-9 order-md-1 ">
          <form class="needs-validation" novalidate  action="?" method="POST">
            <div class="row">
              <div class="col-md mb-3 mt-3">
                <label for="firstName">Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="EX.:Letícia" required>
                <div class="invalid-feedback">
                  Nome é obrigatório.
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md mb-3 mt-3">
                <label for="email">Email: </label>
                <input type="email" class="form-control" name="email" placeholder="LeticiaMelo@gmail.com">
                <div class="invalid-feedback">
                  Por favor, insira um email para poder acessar sua conta.
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-md mb-3">
                  <label for="firstName">Senha:</label>
                  <input type="password" class="form-control" name="senha" placeholder="xxxxxx" required>
                  <div class="invalid-feedback">
                    Senha é obrigatório.
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md mb-3">
                  <label for="lastName">Frase de segurença: </label>
                  <input type="password" class="form-control" name="frase" id="frase" placeholder="batata doce" required>
                  <div class="invalid-feedback">
                    Frase é Obrigatório.
                  </div>
                </div>
              </div>

              <div class="row">
                <button class="btn btn-dark text-success btn-lg btn-block mb-3" type="submit">Inserir</button>
              </div>
            </form>
          </div>
      </div>
        </div>
        
      </div>
    </form>
       
  </div>
</div>
  <div class="row">
    <div class="text-center bg-dark jumbotron jumbotron-fluid col-12" style="margin-bottom:0">
       <h5 class="text-success"> @Desenvolvido por Ketlly Azevêdo ,Daniel Lucas e Amanda Cristina, 2019.</h5>
    </div>

  </body>
</html>