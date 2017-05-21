<?php

$conteudo=$_POST["conteudo"];

include_once 'conexa_acento.php';

$sql = "select respostas.conteudo as conteudoresposta,respostas.ID_resposta as id_da_resposta,perguntas.ID_pergunta as id_da_pergunta, perguntas.conteudo as conteudopergunta from respostas 
inner join respondem on respondem.ID_resposta = respostas.ID_resposta 
inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta 
where respostas.conteudo like '%".$conteudo." %' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
      
        ?> 
<tr>
    <th>Pergunta</th>
    <th>Resposta</th>
</tr>
        
          <?php  
          
       while($row = mysqli_fetch_array($result)){
           
   ?>
<tr>
<td><?php echo '<a id="'.$row["id_da_pergunta"]."cp".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudopergunta"].'" onclick='."'".'passagem_id('.$row["id_da_pergunta"].',"'.$row["conteudopergunta"].'")'."'".'> </a>'; ?></td>
<td><?php echo '<a id="'.$row["id_da_resposta"]."cr".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudoresposta"].'" "> </a>'; ?></td>
<tr>
<?php
       }       
}else{
    echo "Nada foi encontrado";
}
?>