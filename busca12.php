<?php
include_once 'conexa_acento.php';//conexão com o banco
$nome = $_POST["nome"];//nome do questinario para poder localizar a pergunta para então localizar a resposta
$num = $_POST["questao"];//numero da questao para saber localizar a resposta que pertence a questao correspondente

$sql ="select r.conteudo,r.Correta,r.status from respostas as r
inner join respondem on respondem.ID_resposta = r.ID_resposta
inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta
where perguntas.ID_pergunta = ".$nome."; ";//query para achar a resposta desejada

$result = mysqli_query($con,$sql);//Pega a query ,faz a conexão com o banco e retorna os valores necessários
$cont=0;

while($row=mysqli_fetch_array($result)){
if($row["status"]=="a"){
    echo "<label>";
                    echo "<INPUT TYPE=radio NAME=q".$num." VALUE=".$row["Correta"]." >";                        
                      echo $row["conteudo"];echo "</label>";
                      echo "<BR>";
                      /* retorna a resposta desejada junto com seu respectivo name que será usado posteriormente 
                     * para resgatar quais foram as perguntas respondidas e se elas foram respondidas e se estão corretas ou não  */
                    
}

}


