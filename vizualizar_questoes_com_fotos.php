<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once 'conexa_acento.php'; ?>

<html>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $sql = "select foto from perguntas";
         
        $result= mysqli_query($con, $sql);
       
                $row = mysqli_fetch_array($result);
                     
                        echo $row["foto"];
                    ?>
                
        <img src="img/201606181736066345.jpg" class="img-divulgacao img-responsive">
        <a href="index.php" class="btn btn-default"> Voltando para index</a>
                        <?php
          
                
        
        ?>
    </body>
</html>
