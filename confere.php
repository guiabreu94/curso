<?php
  
//inportado via post pela funçaõ javascript, presente na pagina requerimento_curriculo.php

$nome = $_POST["nome"];//Recebe o nome do questionario que veio da página "requerimentos_currículo.php"   

include_once "conexa_acento.php";//Faz a conexão com o banco de dados e a database
if ($nome == "")//Checa se o valor enviado é nulo
{
    echo "incorreto";//Sendo nulo informa-se que esta incorreto o "input"
}  else{
$sql = "select Nome from questionario where nome like '".$nome."' ";
/* vai no banco procurando o nome que foi informado */

$result = mysqli_query($con, $sql);//Adiciona a variavel result o retorno da query do banco
$row = mysqli_fetch_array($result);//Pega o retorno dentro do result e joga dentro de um array(vetor)

if($row["nome"]==$nome){//Compara o que foi inserido com o retorno da procura do banco
    echo "Correto";//printa se estiver correto
}else{
    echo "incorreto";//printa se estiver errado
}

}
?>
