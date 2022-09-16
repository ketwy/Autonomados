<?php
include("config.php");
$consulta3= $MySQLi-> query("SELECT * FROM TB_CIDADES JOIN TB_ESTADOS ON CID_EST_CODIGO=EST_CODIGO");
$consulta1= $MySQLi-> query("SELECT * FROM TB_SEXOS");

if(isset($_POST['nome'])){  
  $nome=$_POST['nome'];
  $numero=$_POST['resi'];
  $sexo=$_POST['sexo'];
  $cid=$_POST['cid'];
  $sobrenome=$_POST['sobrenome'];
  $cpf=$_POST['cpf'];
  $cep=$_POST['cep'];
  $latitude=$_POST['latitude'];
  $longitude=$_POST['longitude'];
  $rua=$_POST['rua'];
  $bairro=$_POST['bairro'];
  $email = mysqli_real_escape_string($MySQLi, trim($_POST['email']));
  $senha = mysqli_real_escape_string($MySQLi, trim(md5($_POST['senha'])));
  $frase = mysqli_real_escape_string($MySQLi, trim(md5($_POST['frase'])));
  $ptref=$_POST['ptref'];
  $dtnasc=$_POST['dtnasc'];
  $telefone=$_POST['telefone'];
  $foto=$_FILES['arquivo']['name'];


  $foto=str_replace(" ","_",  $foto);
  $foto=str_replace("á","a",  $foto);
  $foto=str_replace("à","a",  $foto);
  $foto=str_replace("ã","a",  $foto);
  $foto=str_replace("â","a",  $foto);
  $foto=str_replace("é","e",  $foto);
  $foto=str_replace("è","e",  $foto);
  $foto=str_replace("ê","e",  $foto);
  $foto=str_replace("í","i",  $foto);
  $foto=str_replace("í","i",  $foto);
  $foto=str_replace("ì","i",  $foto);
  $foto=str_replace("ó","o",  $foto);
  $foto=str_replace("ô","o",  $foto);
  $foto=str_replace("ç","c",  $foto);
  $foto=strtolower($foto);

  $tipos=array('image/jpeg','image/pjeg','image/gif','image/png');
  $arqType=$_FILES['arquivo']['type'];

    if(array_search($arqType,$tipos)===false){
      echo "
        <meta http-equiv=refresh content='0'; url='usuario.php'>
        <script type='text/javascript'>
        alert('Formato inválido');
        </script>
      ";
    }else{
        if(file_exists("fotoss/fotoss")){
          $a=1;

        while(file_exists("fotoss/{$a}$fotoss")){
          $a++;
        }
        $foto='[".$a."]'.$foto;
        }
        if(!move_uploaded_file($_FILES['arquivo']['tmp_name'],"fotoss/".$foto)){
          echo "
              <meta http-equiv=refresh content='0'; url='usuario.php'>
              <script type='text/javascript'>
              alert('Erro no upload do arquivo');
              </script>         
          ";
        }

    }
  $consulta20=$MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_EMAIL = '".$_POST['email']."'");
  if(mysqli_num_rows($consulta20) >= 1){
    echo "<div class='alert alert-danger' role='alert'>Usuário já cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button></div>";
  }else{
  $consulta=$MySQLi->query("insert into TB_USUARIOS(USU_NOME,USU_SOBRENOME,USU_CPF,USU_CEP,USU_LATITUDE,USU_LONGITUDE,USU_RUA,USU_BAIRRO,USU_EMAIL,USU_SENHA,USU_PTPREF,USU_DATANASCIMENTO,USU_SEX_CODIGO,USU_CID_CODIGO,USU_IMAGEM,USU_TELEFONE, USU_NUMCASA, USU_FRASE)
  values('$nome','$sobrenome','$cpf','$cep', $latitude, $longitude,'$rua','$bairro','$email','$senha','$ptref','$dtnasc','$sexo','$cid', '$foto', '$telefone', '$numero', '$frase')");
  header("Location:login.php");

}
}
?>
<html lang="br">
  <head>
    <title>AUTONOMADOS! Sistema de serviços autonomos!</title>
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
  </head>


  <body class="bg-success">
   <style>
   .oi{
      margin-top: auto;
      margin-bottom: auto;
      background-color: rgba(40, 140, 40,0.5) !important;
    }
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
      <h1  class="text-success display-3 font-weight-bold">Faça seu login</h1> 
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
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-1 mt-3">
        </div>          
        <div class="col-sm-9 order-md-1 ">
          <form class="needs-validation" novalidate  action="?" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3 mt-3">
                <label for="firstName">Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="EX.:Letícia" required>
                <div class="invalid-feedback">
                  Nome é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-3 mt-3">
                <label for="lastName">Sobrenome: </label>
                <input type="text" class="form-control" id="lastName"  name="sobrenome" placeholder="Melo" required>
                <div class="invalid-feedback">
                  Sobrenome Obrigatório.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3 mt-3 ">
                <label for="address">Imagem</label>
                <input type="file" class="form-control" name="arquivo" id="arquivo" required>
              </div>
            </div>


            <div class="mb-3">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email" placeholder="LeticiaMelo@gmail.com">
              <div class="invalid-feedback">
                Por favor, insira um email para poder acessar sua conta.
              </div>
            </div>

             <div class="row">
              <div class="col-sm-6 mb-3">
                 <label for="address">Data de Nascimento:</label>
              <input type="date" class="form-control" name="dtnasc" required>
              <div class="invalid-feedback">
                Insira sua data de nascimento.
              </div>
              </div>
              <div class="col-sm-6 mb-3">
                <label for="state">Sexo</label>
                <select class="custom-select d-block w-100" name="sexo" >
                  <option value="">Sexo</option>
                  <?php while ($resultado1 = $consulta1->fetch_assoc()){ ?>
                    <option value="<?php echo $resultado1['SEX_CODIGO']; ?>"><?php echo $resultado1['SEX_SEXO']; ?></option>
                  <?PHP } ?>
                </select>
                <div class="invalid-feedback">
                  Insira seu sexo.
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="address">Telefone:</label>
              <input type="text" class="form-control" name="telefone" placeholder="84999999999" required>
                <div class="invalid-feedback">
                  Insira um telefone para contato.
                </div>
               
              </div>
              <div class="col-md-6 mb-3">
                <label for="address">CPF:</label>
              <input type="text" class="form-control" name="cpf" placeholder="xxxx.xx.xx" required>
              <div class="invalid-feedback">
                Insira o CPF.
              </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 mb-3">
               <label for="state">Cidade:</label>
                <select class="custom-select d-block w-100" name="cid" required>
                  <option value="">Cidades</option>
                  <?php while ($resultado3 = $consulta3->fetch_assoc()){ ?>
                    <option value="<?php echo $resultado3['CID_CODIGO']; ?>"><?php echo $resultado3['CID_CIDADE']; ?>, <?php echo $resultado3['EST_UF']; ?></option>
                  <?PHP } ?>
                </select>
                <div class="invalid-feedback">
                  Insira seu sexo.
                </div>
              </div>

              <div class="col-sm-6 mb-3">
                <label for="address">CEP:</label>
              <input type="text" class="form-control" name="cep" placeholder="59300-000">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4 mb-3">
                <label for="address">Rua:</label>
              <input type="text" class="form-control" name="rua" placeholder="Av.Dr José Ameérico" required>
                <div class="invalid-feedback">
                  Insira sua rua.
                </div>
               
              </div>
              <div class="col-sm-3 mb-3">
                <label for="address">Bairro:</label>
              <input type="text" class="form-control" name="bairro" placeholder="Maynard" required>
              <div class="invalid-feedback">
                Insira o seu Bairro.
              </div>
              </div>

              <div class="col-sm-5 mb-3">
                <label for="address">Nº da residência:</label>
              <input type="text" class="form-control" name="resi" placeholder="180A">
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Ponto de referência:</label>
              <input type="text" class="form-control" name="ptref" placeholder="Ao lado da AABB">
            </div>

            <div class="row">
              <div class="col-sm-6 mb-3">
                <label for="address">Latitude:</label>
              <input type="text" class="form-control"  name="latitude" placeholder="-6.474789" required>
                <div class="invalid-feedback">
                  Insira sua latitude.
                </div>
               
              </div>
              <div class="col-sm-6 mb-3">
                <label for="address">Longitude:</label>
              <input type="text" class="form-control" name="longitude" placeholder="-37.074080" required>
              <div class="invalid-feedback">
                Insira o seu longitude.
              </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-12">
                Não sabe sua latitude ou longitude? <a style="color: green " data-toggle="modal" data-target="#exampleModalCenter">clique aqui</a>
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Senha:</label>
                <input type="password" class="form-control" name="senha" placeholder="xxxxxx" required>
                <div class="invalid-feedback">
                  Senha é obrigatório.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="lastName">Frase de segurança: </label>
                <input type="password" class="form-control" name="frase" id="frase" placeholder="batata doce" required>
                <div class="invalid-feedback">
                  Frase é Obrigatório.
                </div>
              </div>
            </div>


            <button class="btn btn-dark text-success btn-lg btn-block mb-3" type="submit">Inserir</button>
          </form>
        </div>
      </div>
        </div>
        
      </div>
    </form>
       
  </div>
  <div class="row">
    <div class="text-center bg-dark jumbotron jumbotron-fluid col-12" style="margin-bottom:0">
       <h5 class="text-success"> @Desenvolvido por Ketlly Azevêdo ,Daniel Lucas e Amanda Cristina, 2019.</h5>
    </div>

  </body>
</html>