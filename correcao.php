<?php

$questoes = $_POST["questoes"];
$aluno = $_POST["userid"];
//echo $questoes;
//echo $questoes."<br>";
$cada_questao = explode(".",$questoes);//recupera cada questao que o aluno esqolhu responder
$i=0;//inicializa o contador do for
$cont = sizeof($cada_questao);//ve quantas questoes foram respondidas
//echo $cont;
$cont-=1;
echo "O ID do aluno é:".$aluno."<br>";
for($i=0;$i<$cont;$i++){
    if($i==0){
       // echo $cada_questao[$i];
    $cada_questao[$i] = intval($cada_questao[$i]);

    }
//echo $cada_questao[0]."\n";
$questao=$_POST["q".$cada_questao[$i]];
//echo $questao." <br>";
$questao_correta=explode(".",$questoes);
if($questao=="c"){
    $questao="Correta";
}else{
    $questao="Errada";
}
echo "A questao ".$cada_questao[$i]." está ".$questao."<br>";

}




/*echo $questao."\n";

echo $cada_questao[1]."\n";
echo $cada_questao[2]."\n";
echo $cada_questao[3]."\n";*/



?>
