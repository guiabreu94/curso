<?php

$conteudo=$_POST["conteudo"];

include_once 'conexa_acento.php';
$perguntas = array(150);
$procura;
$i=0;
for($i=0;$i<150;$i++){
    $perguntas[$i]="";
}

$sql = "select respostas.conteudo as conteudoresposta,respostas.ID_resposta as id_da_resposta,perguntas.ID_pergunta as id_da_pergunta, perguntas.conteudo as conteudopergunta from respostas 
inner join respondem on respondem.ID_resposta = respostas.ID_resposta 
inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta 
where respostas.conteudo like '%".$conteudo." %' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
      
        ?> 
<table>
<tr>
    <th>Pergunta</th>
    <th>Resposta</th>
</tr>
        
          <?php  
          
       while($row = mysqli_fetch_array($result)){
           $procura=0;
           for($i=0;$i<150;$i++){
    if((strcmp( $perguntas[$i], $row["id_da_pergunta"]))==0){
        
        $procura="Ja apareceu";
        echo "Ja apareceu";
    }
}

if($procura==1){
for($i=0;$i<150;$i++){
    if(strcmp( $perguntas[$i], "" )==0){
        $perguntas[$i]= $row["id_da_pergunta"];
    }
}
   ?>
<tr>
<td><?php echo '<a id="'.$row["id_da_pergunta"]."cp".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudopergunta"].'" onclick="editar_perguntas('.$row["id_da_pergunta"].',4)"> </a>'; ?></td>
<td><?php echo '<a id="'.$row["id_da_resposta"]."cr".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudoresposta"].'" onclick="editar_respostas('.$row["id_da_resposta"].',5)"> </a>'; ?></td>
<tr>
<?php
}else{
    ?>
    <tr>
<td><?php echo '<a id="'.$row["id_da_pergunta"]."cp".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudopergunta"].'" "> </a>'; ?></td>
<td><?php echo '<a id="'.$row["id_da_resposta"]."cr".'"> <input type="button" class="btn btn-default"   value="'.$row["conteudoresposta"].'" onclick="editar_respostas('.$row["id_da_resposta"].',5)"> </a>'; ?></td>
<tr> <?php
}
       }       
}else{
    echo "Nada foi encontrado";
}
?>
</table>
<?php
?>