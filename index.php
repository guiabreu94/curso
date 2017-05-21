<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <style>
            .img-divulgacao{
                float: left;
                width: 30%;
                margin-right: 10px
            }

            .evento{
                width: 100%;
                display: table;
                border-bottom: 1px solid #CCC;
                padding-bottom: 20px;
            }

            header,footer{
               background-color: #FFD700;
               text-align: center;
               color:#FFF;
               font-size: 40px;
               padding: 10px 0;
            }
            div1{
                text-align: center;
                background-color: #FFFFFF;

            }
            footer{
                background-color: #222;
                padding: 10px 0;
                margin-top: 20px;
                text-align: center;
            }
            .central{
                text-align: center;
                border : solid;
            }
            .esquerda{
                text-align: left;
                font-size: 15px;
            }

        </style>
<html>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <header>
        Universidade Veiga de Almeida
    </header>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


            <br>
            <br>
            <div class="btn btn-danger ">
                <h1>Questionário estático<h1>
            <a href="questionario.php" class="btn btn-primary">Página do questionario</a>
            </div>
           <!-- <a href="Questionario_dinamico.php" class="btn btn-primary">Página do questionario dinâmico</a> -->
            <div class="btn btn-danger ">
                <h1>Vizualizar e editar questionarios</h1>
            <a href="requerimentos_curriculo.php" class="btn btn-primary">Página de questionario completamente dinamico ja funcional</a>
            </div>

           <div class="btn btn-danger ">
               <h1>Fotos</h1>
            <a href="upload_fotos.php" class="btn btn-primary">Página para upload de fotos</a>
        </div>
        <div class="btn btn-danger">
          <h1>Conectando com o canvas<h1>
            <a href="conexao_canvas.php" class="btn btn-primary">Página para testar a coneção com o canvas</a>
        </div>

    </body>
    <footer>

    </footer>
</html>
