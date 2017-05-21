<?php

    //$coluna = $_POST["coluna"];
    //$conteudo = $_POST["nome"];
    //echo "alo";


    include_once 'conexa_acento.php';

        $sql = "select ID_questionario from questionario";

    //$sql = "select * from questionario  ";


    $result = mysqli_query($con, $sql);

$ola=mysqli_fetch_array($result);
    var_dump($ola)

?>
