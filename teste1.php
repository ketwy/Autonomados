<?php
include("config.php");
$msg = 0;
if(isset($_POST['email'])) {
    $nome = $_POST['email'];
    $senha = $_POST['senha'];
    $consulta = $MySQLi->query("SELECT * FROM
    TB_USUARIOS where USU_EMAIL = '$nome'
    and USU_SENHA = '$senha'");
    if($resultado = $consulta->fetch_assoc()){
        $_SESSION['codigousuario'] =
            $resultado['USU_CODIGO'];
        $_SESSION['nomeusuario'] =
            $resultado['USU_NOME'];
        header("Location:index.php");
    }
    $msg = 1;
} 
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
  <title>Login!</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="styles.css">
  <meta charset="utf-8">
  <style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url();
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.card-header h3{
color: white;
}
.input-group-prepend span{
width: 50px;
background-color: #7CFC00;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}
.login_btn{
color: black;
background-color: #7CFC00;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
  </style>
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>ENTRE!</h3>
      </div>
      <div class="card-body">
        <?php if($msg==1) echo "<div class='alert alert-danger'>
            <strong>Atenção!</strong> Usuário ou senha inválido
          </div>"; ?>
        <form action="" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Usuário">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control"  name="senha" placeholder="Senha">
          </div>
          <div class="form-group">
            <input type="submit" value="Login" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Ainda não tem conta?<a href="usuario-criar.php">Crie agora</a>
        </div>
        <div class="d-flex justify-content-center">
          <a href="recuperar.php">Esqueceu a senha?</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>