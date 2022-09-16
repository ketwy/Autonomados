<?php
include("config.php");
include("top.php");

$codigo = $_GET['codigo'];

if(isset($_POST['nome'])) {
  $nome = $_POST['nome'];
  $codigousuario = $_POST['codigousuario'];
  $sobrenome=$_POST['sobrenome'];
  $cpf=$_POST['cpf'];
  $cep=$_POST['cep'];
  $latitude=$_POST['latitude'];
  $longitude=$_POST['longitude'];
  $rua=$_POST['rua'];
  $bairro=$_POST['bairro'];
  $email=$_POST['email'];
  $senha=$_POST['senha'];
  $ptref=$_POST['ptref'];
  $dtnasc=$_POST['dtnasc'];
  $foto=$_FILES['arquivo']['name'];

  $tel=$_POST['telefone'];
  $sex=$_POST['sexo'];
  $cid=$_POST['cid'];
  $num=$_POST['num'];


 if($foto==""){
 $consulta = $MySQLi->query("UPDATE TB_USUARIOS set USU_NOME = '$nome', USU_SOBRENOME = '$sobrenome' , USU_CPF= '$cpf', USU_CEP = '$cep', USU_LATITUDE = '$latitude', USU_LONGITUDE = '$longitude', USU_RUA = '$rua', USU_BAIRRO = '$bairro', USU_EMAIL = '$email', USU_SENHA = '$senha', USU_PTPREF = '$ptref',USU_DATANASCIMENTO = '$dtnasc', USU_TELEFONE = '$tel', USU_NUMCASA='$num', USU_CID_CODIGO=$cid, USU_SEX_CODIGO=$sex
  where USU_CODIGO = $codigousuario");
 header("Location:usuario.php");
}

}
$consulta2= $MySQLi-> query("SELECT * FROM TB_CIDADES JOIN TB_ESTADOS ON CID_EST_CODIGO=EST_CODIGO");
$consulta1= $MySQLi-> query("SELECT * FROM TB_SEXOS");
$consulta3 = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();

?>

  	<div class="container">
 <form class="needs-validation" novalidate  action="?" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3 mt-3">
                <label for="firstName">Nome:</label>
                <input type="text"  id="input2" class="form-control" name="nome" value="<?php echo $resultado3['USU_NOME']; ?>">
              </div>
              <div class="col-md-6 mb-3 mt-3">
                <label for="lastName">Sobrenome: </label>
                <input type="text"  id="input13" class="form-control" name="sobrenome" value="<?php echo $resultado3['USU_SOBRENOME']; ?>">
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email: </label>
              <input type="text"  id="input7" class="form-control" name="email" value="<?php echo $resultado3['USU_EMAIL']; ?>"READONLY STYLE="pointer-events: none;background: #ccc;">
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
              <input type="text"  id="input3" class="form-control" name="cpf" value="<?php echo $resultado3['USU_CPF']; ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 mb-3">
               <label for="state">Cidade:</label>
                <select class="custom-select d-block w-100" name="cid" required>
                  <?php while ($resultado2 = $consulta2->fetch_assoc()){ ?>
                    <option value="<?php echo $resultado2['CID_CODIGO']; ?>"
                      <?php if($resultado2['CID_CODIGO'] == $resultado3['USU_CID_CODIGO']) echo " selected"; ?>>
                      <?php echo $resultado2['CID_CIDADE']; ?>, <?php echo $resultado2['EST_UF']; ?>
                      </option>
                  <?PHP } ?>
                </select>
              </div>

              <div class="col-sm-6 mb-3">
                <label for="address">CEP:</label>
                <input type="text"  id="input4" class="form-control" name="cep" value="<?php echo $resultado3['USU_CEP']; ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4 mb-3">
                <label for="address">Rua:</label>
                <input type="text"  id="input10" class="form-control" name="rua" value="<?php echo $resultado3['USU_RUA']; ?>">
               
              </div>
              <div class="col-sm-3 mb-3">
                <label for="address">Bairro:</label>
                <input type="text"  id="input11" class="form-control" name="bairro"  value="<?php echo $resultado3['USU_BAIRRO']; ?>">
              </div>

              <div class="col-sm-5 mb-3">
                <label for="address">Nº da residência:</label>
                <input type="text"  id="input12" class="form-control" name="num"  value="<?php echo $resultado3['USU_PTPREF']; ?>">
              </div>
            </div>

            <div class="row">
              <div class=" col-sm mb-3">
                <label for="address">Ponto de referência:</label>
                <input type="text"  id="input12" class="form-control" name="ptref"  value="<?php echo $resultado3['USU_PTPREF']; ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 mb-3">
                <label for="address">Latitude:</label>
                <input type="text"  id="input5" class="form-control" name="latitude" value="<?php echo $resultado3['USU_LATITUDE']; ?>">
               
              </div>
              <div class="col-sm-6 mb-3">
                <label for="address">Longitude:</label>
                <input type="text"  id="input6" class="form-control" name="longitude" value="<?php echo $resultado3['USU_LATITUDE']; ?>">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-12">
                Não sabe sua latitude ou longitude? <a style="color: green " data-toggle="modal" data-target="#exampleModalCenter">clique aqui</a>
              </div>
              
            </div>

             <div class="row">
              <div class="col-sm-6 mb-3">
                <label for="address">Data de Nascimento:</label>
                <input type="date"  id="input9" class="form-control" name="dtnasc" value="<?php echo $resultado3['USU_DATANASCIMENTO']; ?>">
              </div>
              <div class="col-sm-6 mb-3">
                <label for="state">Sexo</label>
                <select class="custom-select d-block w-100" name="sexo" >
                  <?php while ($resultado1 = $consulta1->fetch_assoc()){ ?>
                    <option value="<?php echo $resultado1['SEX_CODIGO']; ?>"
                      <?php if($resultado1['SEX_CODIGO'] == $resultado3['USU_SEX_CODIGO']) echo " selected"; ?>>
                      <?php echo $resultado1['SEX_SEXO']; ?>
                      </option>
                  <?PHP } ?>
                </select>
              </div>
            </div>

            <div class="row invisible">
              <div class="col-md mb-3 mt-3">
                <label  for="input1">Código:</label>
                <input type="text"  id="input1" class="form-control" name="codigousuario"   value="<?php echo $resultado3['USU_CODIGO']; ?>" READONLY STYLE="pointer-events: none;background: #ccc;">
              </div>
            </div>

            <button class="btn btn-success text-dark btn-lg btn-block mb-3" type="submit">Salvar</button>
          </form>
        </div>
      </div>
        </div>
        
      </div>
    </form>
</div>

<?php include("bot.php");?>
