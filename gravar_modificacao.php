<?php

$id=$_POST["id"];
$coluna=$_POST["coluna"];
$mudanca=$_POST["mudanca"];
$tipo=$_POST["tipo"];


include_once 'conexa_acento.php';

if($tipo == "p"){

$sql = "update perguntas set ".$coluna." = '".$mudanca."' where ID_pergunta = ".$id;


    
}else{
   $sql= "update respostas set ".$coluna." = '".$mudanca."' where ID_resposta = ".$id;
    
}

mysqli_query($con, $sql);

?>