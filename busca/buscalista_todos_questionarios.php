<?php





    include_once 'conexa_acento.php';

    $sql = "select * from questionario; ";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table">
            <tr>
                <th>nome</th>
                <th>status</th>
                <th>conteudo</th>
                <th>instrução</th>
                <th>Questoes necessárias</th>
                <th>SIS_idcurso</th>
                
            </tr>
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row["Nome"]; ?></td>
                <td><?php echo $row["Status"]; ?></td>
                <td><?php echo $row["Conteudo"]; ?></td>
                <td><?php echo $row["instrucao"]; ?></td>
                <td><?php echo $row["Numero_questoes_necessarias"]; ?></td>
                <td><?php echo $row["SIS_idcurso"] ?></td>

            </tr>
            <?php
        }


    }


?>
