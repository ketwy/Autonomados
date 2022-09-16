<?php
include("top.php");
$consulta1= $MySQLi-> query("SELECT * FROM TB_RAMOS");

include("verificar.php");
$codusu=$_SESSION["codigousuario"];

if(isset($_POST['nome'])){
  $codramo=$_POST['ramo'];  
  $nome=$_POST['nome'];
  $preco=$_POST['preco'];
  $descricao=$_POST['descricao'];
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
        if(file_exists("fotos/fotos")){
          $a=1;

        while(file_exists("fotos/{$a}$fotos")){
          $a++;
        }
        $foto='[".$a."]'.$foto;
        }
        if(!move_uploaded_file($_FILES['arquivo']['tmp_name'],"fotos/".$foto)){
          echo "
              <meta http-equiv=refresh content='0'; url='usuario.php'>
              <script type='text/javascript'>
              alert('Erro no upload do arquivo');
              </script>         
          ";
        }

    }
  $consulta=$MySQLi->query("insert into TB_PRODUTOS (PRO_RAM_CODIGO,PRO_NOME,PRO_PRECO,PRO_DESCRICAO, PRO_USU_CODIGO,PRO_IMAGEM)
  values($codramo,'$nome','$preco','$descricao','$codusu','$foto')");
  header("Location:verprodutos.php");
}

?>




  <body style="background-color: #7CFC00">


    <div class="container">
      <div class="row mt-3 rounded" style="background: black">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-1 mt-3">
        </div>          
        <h2 class="mb-3" style="color: #7CFC00">PREENCHA OS CAMPOS ABAIXO:</h2>
        <div class="col-sm-9 order-md-1 bg-light rounded mb-3">
          <form class="needs-validation" novalidate  action="?" enctype="multipart/form-data" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3 mt-3 ">
                <label  for="input1"><strong>Nome do produto:</strong></label>
                <input type="text"   id="input1" class="form-control" name="nome" placeholder="EX.:Trufas do Sertão">
              </div>
              <div class="col-md-6 mb-3 mt-3 ">
                <label for="firstName">Ramo:</label>
                <select name="ramo" class="custom-select d-block w-100">
                  <option>Ramo</option>
                  <?php while ($resultado1 = $consulta1->fetch_assoc()){ ?> 
                    <option value="<?php echo $resultado1['RAM_CODIGO']; ?>"><?php echo $resultado1['RAM_RAMO']; ?></option>
                  <?PHP } ?>
                </select>
                </div>
              </div>

              <div class="row">
              <div class="col-md-12 mb-3 mt-3 ">
                <label for="address">Imagem</label>
                <input type="file" class="form-control" name="arquivo" id="arquivo" required>
              </div>
            </div>

              <div class="row">
              <div class="col-md-6 mb-3 mt-3 ">
                <label  for="input1"><strong>Preço do produto:</strong></label>
                <input type="text"   id="input1" class="form-control" name="preco" placeholder="12.00">
              </div>
              <div class="col-md-6 mb-3 mt-3 ">
                <label  for="input1"><strong>Descriação:</strong></label>
                <input type="text"   id="input1" class="form-control" name="descricao" placeholder="São maravilhosassss">
                </div>
              </div>

            <button class="btn1 btn-lg btn-block mb-3" type="submit">Inserir</button>
          </form>
        </div>
      </div>
        </div>
        
      </div>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Ketlly Azevêdo, Amanda Cristina e Daniel Lucas</p>
      </footer>
    </div>

 <?php include("bot.php")?>