<?php
  include("config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>AUTONOMADOS! Sistema de serviços autonomos!</title>
    <meta charset="utf-8">
    <meta name="author" content="Ketlly Azevêdo,Amanda Cristina e Daniel Lucas e ">
    <meta name="description" content="AUTONOMADOS! Sistema de serviços autonomos!">
    <meta name="keywords" content="acessar,comprar,home,login">
    <link rel="icon" href="autonomados.png">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5R3a_sPmpFyBMR-Y8Zl4PF1-noUePiM&callback=initMap"
    async defer
    async defer></script>
  </head>

  <body onload="getLocation()">

    <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark" >
      <a id="menu-toggle" class="mr-3" style='color: #228B22'><i class='fas fa-ellipsis-v'></i></a>
      <a class="navbar-brand" style='color: #228B22' href="index.php"><i class='fas fa-home mr-1' style='color: #228B22'></i>Home</a>
      <button class="navbar-toggler btn1" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="nav-link" style='color: #228B22;' href="login.php"><button class="btn btn-success text-dark rounded">entrar!</button></a>
    </button>
      </div>  
    </nav>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Bem vindo</div>
      <div class="list-group list-group-flush">
        <a href="perfil.php" class="list-group-item list-group-item-action"><i class='fas fa-user-circle' style='color:#228B22'></i> Perfil</a>
        <a href="verprodutos.php" class="list-group-item list-group-item-action">Produtos</a>
        <a href="sair.php" class="list-group-item list-group-item-action">Sair</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
