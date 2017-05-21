<?php
$useridint=$_POST["userid"];
$nome_quest=$_POST["questionario"];
//$userid='46480000000000993';
$userid='"'.$useridint.'"';
include_once "conexa_acento_200.php";
//echo "<br>Userid:".$userid."<br>";
$sql = "select codigo_resp from questionario_resp where id_aluno = ".$userid;
$resposta_servidor = mysqli_query($con,$sql);
$resposta = mysqli_fetch_array($resposta_servidor);
//var_dump($resposta);
echo "o cod_resp é:".$resposta["codigo_resp"]."<br>";
if($resposta["codigo_resp"] != null){
  echo "<br>acho<br>";

 header("location:/teste/questionario_respondido_outravez.php?userid=".$useridint."&questionario=".$nome_quest);
}else{
  echo "<br>não achou <br>";
   header("location:/teste/Questionario_Opicional_Fotos200.php?userid=".$useridint."&questionario=".$nome_quest);
}
mysqli_close($con);

?>
