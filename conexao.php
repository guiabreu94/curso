<?php

 
header('Content-Type: text/html; charset=utf-8');
$con = mysqli_connect("127.0.0.1","root","","teste");
// Conecta ao banco de dados
//$conexao = mysql_connect('127.0.0.1','root',"");
//$banco = mysql_select_db('teste');

// Aqui está o segredo
$sql= "SET NAMES 'utf8'";
mysqli_query($con, $sql);
$sql = 'SET character_set_connection=utf8';
mysqli_query($con, $sql);
$sql ='SET character_set_client=utf8';
mysqli_query($con, $sql);
$sql ='SET character_set_results=utf8';
mysqli_query($con, $sql);

?>

