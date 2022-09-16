
<?php
	include("top.php");
  include("verifica.php");



	$codigo = $_GET['ver'];
  $consulta=$MySQLi->query("SELECT * FROM TB_PRODUTOS JOIN TB_USUARIOS ON USU_CODIGO=PRO_USU_CODIGO JOIN TB_RAMOS ON RAM_CODIGO=PRO_RAM_CODIGO JOIN TB_CIDADES ON USU_CID_CODIGO=CID_CODIGO JOIN TB_ESTADOS ON CID_EST_CODIGO=EST_CODIGO where PRO_CODIGO=$codigo");
	$resultado = $consulta->fetch_assoc();
    

  if(array_key_exists('button_dan', $_POST)) { 
     button_dan_fun(); 
  }

  $valor=$MySQLi->query("SELECT * FROM votos WHERE VOT_VOTO=1 AND VOT_PRO_CODIGO=$codigo ");
  $valor1=$MySQLi->query("SELECT * FROM votos WHERE VOT_VOTO=2 AND VOT_PRO_CODIGO=$codigo");
  $valor2=$MySQLi->query("SELECT * FROM votos  WHERE VOT_VOTO=3 AND VOT_PRO_CODIGO=$codigo");
  $valor3=$MySQLi->query("SELECT * FROM votos  WHERE VOT_VOTO=4 AND VOT_PRO_CODIGO=$codigo");
?>

<?php
  function button_dan_fun() {
    global $MySQLi, $codigo;

    if(isset($_POST['radio'])) {
      $voto=$_POST['radio'];
      if($voto <> ""){
          $consulta1=$MySQLi->query("insert into votos (VOT_VOTO,VOT_PRO_CODIGO)
          values('$voto',$codigo)");
      }
    }
  }
?>


    <div class="conteiner">
    	<div class="row">
    		<div class="col-sm">
    			<div class="row">
    				<div class="col-sm-4 mt-3">

              <?php $id=$resultado['PRO_CODIGO'];
        $foto_db=$resultado['PRO_IMAGEM'];
          ?>
        						<img src="fotos/<?php echo $foto_db ?>" width=200 height=200 class="card-img-top" alt="<?php echo $resultado['RAM_RAMO'];?>" title="<?php echo $resultado['PRO_NOME'];?>" style="width:100%">
					</div>
					<div class="col-sm-4 mt-3">
						<div class="row">
		    				<div class="col-sm">
		    					<h2 class="display-6"><strong><?php echo $resultado['PRO_NOME'];?></strong></h2><footer class="blockquote-footer"><?php echo $resultado['RAM_RAMO'];?></footer>
							</div>
		    			</div>
		    			<div class="row">
		    				<div class="col-sm">
		    					<p><span style="color: #7CFC00;"><strong> vendedor:</strong></span> <?php echo $resultado['USU_NOME'];?>. </p>
							</div>
		    			</div>
              <div class="row">
                <div class="col-sm">
                  <p><span style="color: #7CFC00;"><strong>Descrição do Produto:</strong></span> <?php echo $resultado['PRO_DESCRICAO'];?>. </p>
              </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  <p><span style="color: #7CFC00;"><strong>Contato:</strong></span></p>
                  <strong>Telefone:</strong> <?php echo $resultado['USU_TELEFONE'];?><br> 
                  <strong>Email:</strong> <?php echo $resultado['USU_EMAIL'];?><br>
              </div>
              </div>

             <div class="row">
                <div class="col-sm">
                  <p><span style="color: #7CFC00;"><strong>Endereço:</strong></span></p> 
                  <?php echo $resultado['CID_CIDADE']; ?>, <?php echo $resultado['EST_UF']; ?> , <?php echo $resultado['USU_CEP']; ?> 
              </div>
              </div> 

              
          
					</div>
					<div class="col-sm-4 mt-3">
						<div id="map"></div>
						
					</div>
    			</div>
    		</div>
    	</div>


      <div class="row">
        <div class="col-sm">
          <div class="row">
            <div class="col-sm-4 mt-3">
           <h1> Resultados</h1>
          </br>
         Ótimo:<?php echo mysqli_num_rows($valor); ?> </br>
         Bom:<?php echo mysqli_num_rows($valor1); ?> </br>
          Regular:<?php echo mysqli_num_rows($valor2); ?> </br>
          Ruim:<?php echo mysqli_num_rows($valor3); ?> </br>
          </div>
          <div class="col-sm-6 mt-3">
            <form  name='enquete' id='enquete' method='POST'>
            <input type="radio" name="radio" id="radio" value="1"> Ótimo 
            <input type="radio" name="radio" id="radio" value="2"> Bom 
            <input type="radio" name="radio" id="radio" value="3"> Regular 
            <input type="radio" name="radio" id="radio" value="4"> Ruim 

            <input type="submit" name="button_dan" id="button_dan" value="Votar">
            </form>
            
          </div>
          </div>
        </div>
      </div>
    	
    </div>
<script>
      var map;
      function getLocation()
        {
        if (navigator.geolocation)
          {
          navigator.geolocation.getCurrentPosition(initMap);
          }
        else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
        }function initMap(position) {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $resultado['USU_LATITUDE'];?>, lng:  <?php echo $resultado['USU_LONGITUDE'];?>},
          zoom: 25
        });
      }
    </script>

<?php include('bot.php'); ?>
