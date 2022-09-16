<?php

$endereco="localhost";
$usuario="root";
$senha="usbw";
$banco="DB_AUTONOMADOS";

	$MySQLi=new mysqli($endereco,$usuario,$senha,$banco,3307);
	if(mysqli_connect_errno()){
		die(mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($MySQLi,"utf8");

	require_once  'Main.php'; 
?>
