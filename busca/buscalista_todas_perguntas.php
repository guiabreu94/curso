<?php


    include_once 'conexa_acento.php';
    
    $sql = "select * from perguntas ; ";
    
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table">
            <tr>
                <th>conteudo</th>
                <th>status</th>
                <th>tipo</th>
                
            </tr>            
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."c".'"> <input type="button" class="btn btn-default"   value="'.$row["Conteudo"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',1)"> </a>'; ?></td>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."s".'"> <input type="button"  class="btn btn-default" value="'.$row["Status"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',2)"> </a>'; ?></td>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."t".'"> <input type="button"  class="btn btn-default" value="'.$row["Tipo"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',3)"> </a>'; ?></td>
                
               
                
            </tr>
            <?php
        }
        
        
    } 
    
    
?>
