<?php 
include("top.php");
include("verificar.php");
include("config.php");
$codusu=$_SESSION["codigousuario"];
$consulta=$MySQLi->query("SELECT * FROM TB_USUARIOS JOIN TB_CIDADES ON USU_CID_CODIGO=CID_CODIGO JOIN TB_ESTADOS ON CID_EST_CODIGO=EST_CODIGO where USU_CODIGO=$codusu");
$consulta2=$MySQLi->query("SELECT * FROM TB_PRODUTOS where PRO_USU_CODIGO=$codusu");
$resultado=$consulta->fetch_assoc();
?>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          
                          <?php
                            $id=$resultado['USU_CODIGO'];
                            $foto_db=$resultado['USU_IMAGEM'];
                          ?>

                            <img src="fotoss/<?php echo $foto_db ?>" title="Autonomo" alt="Autonomo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $resultado['USU_NOME'];?>
                                    </h5>
                                    <h6>
                                        Profissional Autonomo
                                    </h6>
                                    <p class="proile-rating">Quantidade de Produtos publicados : <span><?php echo mysqli_num_rows($consulta2); ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Seus dados</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="usuario-editar.php?codigo=<?PHP echo $resultado['USU_CODIGO']; ?>"><button class="profile-edit-btn">Editar Perfil</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work invisible">
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_NOME'];?> <?php echo $resultado['USU_SOBRENOME'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Data de Nascimento:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_DATANASCIMENTO'];?></p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_EMAIL'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefone:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_TELEFONE'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CPF:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_CPF'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Endereço:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_RUA'];?>, <?php echo $resultado['USU_BAIRRO'];?>, <?php echo $resultado['USU_NUMCASA'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ponto de referencia:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_PTPREF'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cidade:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['CID_CIDADE']; ?>, <?php echo $resultado['EST_UF']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CEP:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $resultado['USU_CEP']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<?php include("bot.php");?>