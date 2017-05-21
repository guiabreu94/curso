<?php

    $coluna = $_POST["coluna"];
    $conteudo = $_POST["nome"];
    //echo "alo";
    if($conteudo!=""){
    include_once 'conexa_acento.php';
    if($coluna=="Status"){
        $sql = "select * from questionario where ".$coluna." like '".$conteudo."' ";
    }else{
    $sql = "select * from questionario where ".$coluna." like '%".$conteudo."%' ";
    }

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
                <th>Pagina</th>
            </tr>
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo '<input type="button" class="btn btn-default" value="'.$row["Nome"].'" onclick='."'".'selecao_questionario("'.$row["Nome"].'")'."'".' >';  ?></td>
                <td><?php echo $row["Status"]; ?></td>
                <td><?php echo $row["Conteudo"]; ?></td>
                <td><?php echo $row["instrucao"]; ?></td>
                <td><?php echo $row["Numero_questoes_necessarias"]; ?></td>
                <td><?php echo $row["SIS_idcurso"] ?></td>
                <td><?php echo $row["pagina"] ?></td>


            </tr>
            <?php
        }


    } }else{
        echo "Nenhuma pergunta encontrada!";
    }


?>
