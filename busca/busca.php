<?php
    
    $nome = $_POST["nome"];    
    //echo $nome;
    
    if($nome != ""){
    
    include_once 'conexa_acento.php';
    
    $sql = "select * from questionario   
            where nome like '".$nome."%' ";
    
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table">
            <tr>
                <th>nome</th>
                <th>status</th>
                <th>conclusão</th>
                <th>instrução</th>
                <th>ID_questionario</th>
            </tr>            
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row["Nome"]; ?></td>
                <td><?php echo $row["Status"]; ?></td>
                <td><?php echo $row["conclusao"]; ?></td>
                <td><?php echo $row["instrucao"]; ?></td>
                <td><?php echo $row["ID_questionario"]; ?></td>
                
            </tr>
            <?php
        }
        
        
    }else{
        echo "Nenhum questionario encontrado!";
    }
    
    }
?>
