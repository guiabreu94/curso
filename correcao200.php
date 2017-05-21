<?php

//o programa está inserindo os dados com o numero 1 de tentativa e com o mesmo codigo_resp


$questoes = $_POST["questoes"];
$aluno = $_POST["userid"];
$questionario = $_POST["questionario"];
//echo $questionario." a variavel questionario<br>";
//echo $questoes;
include 'conexa_acento_200.php';
$sql_ID_questionario = "select ID_questionario from questionario where nome like '".$questionario."'";//query que retorna o id do questionario
$ID_questionario_cont = mysqli_query($con,$sql_ID_questionario);
$ID_questionario = mysqli_fetch_array($ID_questionario_cont);
//echo "<br>".$ID_questionario["ID_questionario"]."<br>";
//echo "<br>Comando sql para a inserção dos dados<br>";
//echo  "insert into questionario_resp values(null,".$ID_questionario["ID_questionario"].",".$aluno.")";

$sql_insercao_dados = "insert into questionario_resp values(null,".$ID_questionario["ID_questionario"].",".$aluno.")";
mysqli_query($con,$sql_insercao_dados);

mysqli_close($con);
include 'conexa_acento_200.php';
$sql_codigo_resp="select codigo_resp from questionario_resp where ID_aluno = ".$aluno." and ID_questionario = ".$ID_questionario["ID_questionario"]."";
//echo "<br>".$sql_codigo_resp."<br>";
$array_codigo_resp= mysqli_query($con,$sql_codigo_resp);
$codigo_resp = mysqli_fetch_array($array_codigo_resp);
//echo "<br>O codigo de resposta que será utilizado na tabela tentativas será<br>";
//echo "<br>".$codigo_resp["codigo_resp"]."<br>";

//inserção dos dados do questionário do aluno no banco de dados;
//echo "alo";
//echo "<br>";
//echo $questoes;
//echo $questoes."<br>";
$cada_questao = explode(".",$questoes);//recupera cada questao que o aluno esqolhu responder
$i=0;//inicializa o contador do for
$cont = sizeof($cada_questao);//ve quantas questoes foram respondidas
//echo $cont;
$cont-=1;
//echo "O ID do aluno é:".$aluno."<br>";
for($i=0;$i<$cont;$i++){
    if($i==0){
       // echo $cada_questao[$i];
    $cada_questao[$i] = intval($cada_questao[$i]);

    }
//echo $cada_questao[0]."\n";
$questao=$_POST["q".$cada_questao[$i]];// usado para receber as questoes que foram respondidas
$quest=explode("/",$questao);// como questao vem com a resposta dele e o id da resposta para poder ser inserido na tabela de tentivas é preciso fazer  a separação
$sql_insercao_tentativas="insert into tentativas_resposta values(1,".$cada_questao[$i].",".$quest[1].",null,".$codigo_resp["codigo_resp"].",null)";
//echo "<br>".$sql_insercao_tentativas."<br>";
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
//echo "A questao ".$cada_questao[$i]." está ".$questao.": sendo a resposta de id ".$quest[1]."<br>";

}
mysqli_close($con);







/*echo $questao."\n";

echo $cada_questao[1]."\n";
echo $cada_questao[2]."\n";
echo $cada_questao[3]."\n";*/



?>


<!doctype html>
<html lang="pt-BR">
<style>
           .img-divulgacao{
               float: left;
               width: 30%;
               margin-right: 10px
           }

           .evento{
               width: 100%;
               display: table;
               border-bottom: 1px solid #CCC;
               padding-bottom: 20px;
           }

           header,footer{
              background-color: #FFD700;
              text-align: center;
              color:#FFF;
              font-size: 40px;
              padding: 10px 0;
           }
           div1{
               text-align: center;
               background-color: #FFFFFF;

           }
           footer{
               background-color: #222;
               padding: 10px 0;
               margin-top: 20px;
               text-align: center;
           }
           .central{
               text-align: center;
               border : solid;
           }
           .esquerda{
               text-align: left;
               font-size: 15px;
           }

       </style>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
    <meta charset="UTF-8">
    <title>Questionario de definição de ensino de aprendizagem ensino de aprendizagem</title>
</head>
<script>
function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
var user_id = getParameterByName('user_id');

var UserId = '"'+user_id+'"';

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-97041911-1', 'auto');
ga('set', 'userId', UserId); // Defina o ID de usuário usando o user_id conectado.
ga('send', 'pageview');

</script>
<header>Universidade veiga de almeida</header>
<BODY BGCOLOR=#ffffff>
<CENTER>
                       <script type="text/javascript"
                      src="jquery-3.1.1.js"></script>

</head>
<body>



<h1 class="bg-warning">Questionario de perfil de ensino de aprendizagem</h1>

<div class="btn btn-default">
<h2 class="bg-success">Descrição das instruções do questionario de perfil</h2>
<p class="text-danger">Você ja respondeu a esse questionário.<br>
                        Infelizmente só é possível faze-lo uma vez.
</p>
<br>

</div>

<script>
function passar_id(){
var passagem=document.querySelector("#userid");
passagem.value=user_id;
}
</script>
<footer><footer>
</body>
</html>
