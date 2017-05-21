<?php

  
    $conteudo = $_POST["nome"];
    
    if($conteudo!=""){
    include_once 'conexa_acento.php';
    
    $sql = "select * from perguntas where Conteudo like '".$conteudo." %' ";
    
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table">
            <tr>
                <th>conteudo</th>
                <th>status</th>
                <th>tipo</th>
                <th>ID_pergunta</th>
            </tr>            
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row["Conteudo"]; ?></td>
                <td><?php echo $row["Status"]; ?></td>
                <td><?php echo $row["Tipo"]; ?></td>
                <td><?php echo $row["ID_pergunta"]; ?></td>
               
                
            </tr>
            <?php
        }
        
        
    } }else{
        echo "Nenhum questionario encontrado!";
    }
    
    
?>
