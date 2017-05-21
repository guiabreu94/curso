<?php

$questoes = $_POST["questoes"];
$aluno = $_POST["userid"];
echo "id do aluno".$aluno."<br>";
$questionario = $_POST["questionario"];
echo $questionario." a variavel questionario<br>";
echo $questoes;
include 'conexa_acento_200.php';
$sql_ID_questionario = "select ID_questionario from questionario where nome like '".$questionario."'";//query que retorna o id do questionario
$ID_questionario_cont = mysqli_query($con,$sql_ID_questionario);
$ID_questionario = mysqli_fetch_array($ID_questionario_cont);
echo "<br>".$ID_questionario["ID_questionario"]."<br>";
//echo "<br>Comando sql para a inserção dos dados<br>";
//echo  "insert into questionario_resp values(null,".$ID_questionario["ID_questionario"].",".$aluno.")";

//$sql_insercao_dados = "insert into questionario_resp values(null,".$ID_questionario["ID_questionario"].",".$aluno.")";
//mysqli_query($con,$sql_insercao_dados);

mysqli_close($con);
include 'conexa_acento_200.php';
$sql_codigo_resp="select codigo_resp from questionario_resp where ID_aluno = ".$aluno." and ID_questionario = ".$ID_questionario["ID_questionario"]."";
echo "<br>".$sql_codigo_resp."<br>";
$array_codigo_resp= mysqli_query($con,$sql_codigo_resp);
$codigo_resp = mysqli_fetch_array($array_codigo_resp);
echo "<br>O codigo de resposta que será utilizado na tabela tentativas será<br>";
echo "<br>".$codigo_resp["codigo_resp"]."<br>";
mysqli_close($con);
include 'conexa_acento_200.php';
//inserção dos dados do questionário do aluno no banco de dados;
echo "alo";
echo "<br>";
//echo $questoes;
//echo $questoes."<br>";
$cada_questao = explode(".",$questoes);//recupera cada questao que o aluno esqolhu responder
$i=0;//inicializa o contador do for
$cont = sizeof($cada_questao);//ve quantas questoes foram respondidas
//echo $cont;
$cont-=1;
$sql_max_tentativa="select max(tentativa) from tentativas_resposta";
$max_tentativa=mysqli_query($con,$sql_max_tentativa);
$max_tentativa=mysqli_fetch_array($max_tentativa);
//echo $max_tentativa["max(tentativa)"];
mysqli_close($con);
//include 'conexa_acento_200.php';
echo "O ID do aluno é:".$aluno."<br>";
//$sql_zera_tentativa="update tentativas_resposta set tentativa=0 where tentativa=1 and codigo_resp=".$codigo_resp["codigo_resp"]."";
//mysqli_query($con,$sql_zera_tentativa);
//mysqli_close($con);
$max_tentativa["max(tentativa)"]=$max_tentativa["max(tentativa)"]+1;
include 'conexa_acento_200.php';
for($i=0;$i<$cont;$i++){
    if($i==0){
       // echo $cada_questao[$i];
    $cada_questao[$i] = intval($cada_questao[$i]);

    }
//echo $cada_questao[0]."\n";
$questao=$_POST["q".$cada_questao[$i]];// usado para receber as questoes que foram respondidas
$quest=explode("/",$questao);// como questao vem com a resposta dele e o id da resposta para poder ser inserido na tabela de tentivas é preciso fazer  a separação
$sql_insercao_tentativas="insert into tentativas_resposta values(".$max_tentativa["max(tentativa)"].",".$cada_questao[$i].",".$quest[1].",null,".$codigo_resp["codigo_resp"].",null)";
echo "<br>".$sql_insercao_tentativas."<br>";
mysqli_query($con,$sql_insercao_tentativas);
//teste do retorno do explode
//echo $questao." aki1<br>";
//echo $quest[0]."aki2<br>";
//echo $quest[1]."aki3<br>";
//echo $quest." <br>";

if($quest[0]=="c"){
    $questao="Correta";
}else{
    $questao="Errada";
}
echo "A questao ".$cada_questao[$i]." está ".$questao.": sendo a resposta de id ".$quest[1]."<br>";

}
mysqli_close($con);







/*echo $questao."\n";

echo $cada_questao[1]."\n";
echo $cada_questao[2]."\n";
echo $cada_questao[3]."\n";*/



?>
