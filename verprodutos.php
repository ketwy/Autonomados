<?php 
include("top.php");
include("verificar.php");
$codusu=$_SESSION["codigousuario"];
$consulta3= $MySQLi-> query("SELECT * FROM TB_RAMOS");

if(isset($_GET['excluir'])) {
  $codigo = $_GET['excluir'];
  $consulta2 = $MySQLi->query("DELETE FROM TB_PRODUTOS
  WHERE PRO_CODIGO = $codigo");
  header("Location:verprodutos.php");
} 
$consulta1=$MySQLi->query("SELECT * FROM TB_PRODUTOS JOIN TB_USUARIOS ON USU_CODIGO=PRO_USU_CODIGO JOIN TB_RAMOS ON RAM_CODIGO=PRO_RAM_CODIGO WHERE PRO_USU_CODIGO=$codusu");

//*********** modal ***********//

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

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produtos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-11">
      <div class="row">
        <div class="col-sm-9 order-md-1">
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
                  <?php while ($resultado1 = $consulta3->fetch_assoc()){ ?> 
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
        </div>
      </div>
        
      </div>
    </div>
      </div>
      <div class="modal-footer"><button class="btn1 btn-lg btn-block mb-3" type="submit">Inserir</button></form>
      </div>
    </div>
  </div>
</div>

 <div class="container-fluid" style="background-color: lightgray;" >
      <div class="row">
       <div class="col-sm">
       	<div class="card-columns">  

       	<?php while($resultado=$consulta1->fetch_assoc()){ 
          $id=$resultado['PRO_CODIGO'];
        $foto_db=$resultado['PRO_IMAGEM'];
          ?>

        <div class="card mb-3 mt-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
               <img src="fotos/<?php echo $foto_db ?>" width=200 height=200 class="card-img-top" alt="<?php echo $resultado['RAM_RAMO'];?>" title="<?php echo $resultado['PRO_NOME'];?>" style="width:100%">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $resultado['PRO_NOME'];?><span class="badge badge-secondary"><?php echo $resultado['RAM_RAMO'];?></span></h5>
                <ul class="small mt-3 list-unstyled card-text">
                      <li><span class="font-weight-bold">Preço:</span> R$:<?php echo $resultado['PRO_PRECO'];?></li>
                      <li><span class="font-weight-bold">Contato:</span><?php echo $resultado['USU_TELEFONE'];?> </li>
                    </ul>
                    <a href="produto-editar.php?codigo=<?PHP echo $resultado['PRO_CODIGO']; ?>"><button class="btn btn-sm btn-success">editar</button></a>            <a href="?excluir=<?PHP echo $resultado['PRO_CODIGO']; ?>"><button class="btn btn-sm btn-danger">excluir</button></a>
              </div>
            </div>
          </div>
        </div>     
    
      <?php } ?>

  </div>
    
</div>
</div>
		<div class="row">
			<div class="col-sm invisible">
				a

			</div>
		</div>
		<div class="row">
			<div class="col-sm invisible">
				a
				
			</div>
		</div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm invisible">
        a
        
      </div>
    </div>
		<div class="row">
			<div class="col-sm invisible">
				a
				
			</div>
		</div>

		<div class="row">
			<div class="col-sm-11 invisible">
				
			</div>
			<div class="col-sm-1">
				<button class="rounded-circle btn-success btn-lg" data-toggle="modal" data-target="#exampleModal"><i class='fas fa-plus'></i></button>
			</div>
		</div>
</div>



<?php 
include("bot.php");
?>