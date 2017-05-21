<?php

  $coluna = $_POST["coluna"];
    $conteudo = $_POST["nome"];
    //echo "alo";
    if($conteudo!=""){
    include_once 'conexa_acento.php';
     if($coluna=="status" || $coluna=="Correta"){
        $sql = "select * from respostas where ".$coluna." like '".$conteudo."' ";
    }else{
    $sql = "select * from respostas where ".$coluna." like '%".$conteudo."%' ";
    }
    
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table">
            <tr>
                <th>conteudo</th>
                <th>Correta</th>
                <th>Status</th>
                
            </tr>            
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo '<a id="'.$row["ID_resposta"]."c".'"> <input type="button" class="btn btn-default"   value="'.$row["Conteudo"].'" onclick="editar_respostas('.$row["ID_resposta"].',1)"> </a>'; ?></td>
                <td><?php echo '<a id="'.$row["ID_resposta"]."co".'"> <input type="button" class="btn btn-default"   value="'.$row["Correta"].'" onclick="editar_respostas('.$row["ID_resposta"].',2)"> </a>'; ?></td>
                <td><?php echo '<a id="'.$row["ID_resposta"]."s".'"> <input type="button" class="btn btn-default"   value="'.$row["status"].'" onclick="editar_respostas('.$row["ID_resposta"].',3)"> </a>'; ?></td>
                
               
                
            </tr>
            <?php
        }
        
        
    } }else{
        echo "Nenhuma resposta encontrada!";
    }
    
    
?>
