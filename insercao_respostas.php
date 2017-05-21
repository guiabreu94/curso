<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR' });</script>
        <script src="javascript_content.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <header>Universidade Veiga de Almeida</header>
    <br>
    <style>

         header,footer{
               background-color: #FFD700;
               text-align: center;
               color:#FFF;
               font-size: 40px;
               padding: 10px 0;
            }

            footer{
                background-color: #222;
                padding: 10px 0;
                margin-top: 20px;
                text-align: center;
            }
        .esquerda{
                text-align: left;
                font-size: 15px;
            }
            a3{
                background-color: #FFD700;
               text-align: center;
               color:#FFF;
               font-size: 40px;
               padding: 10px 0;
            }
    </style>
    <body>
        <form action="gravar_respostas.php" class="form control-label" method="post">
        <div class="btn btn-default">

            <div1>
                <h1>Conteudo da resposta</h1>
                <textarea name="conteudo" rows="3" cols="50" id="conteudo1"></textarea>

             <a class="btn btn-info">Escolha por qual status deseja inserir:</a>
             <select name="status" class="btn btn-default" id="status" >
                <option value="a">ativo</option>
                <option value="i">inativo</option>
                                </select>
                </div2>
            </div1>
        </div>
            <br><br>
            <div class="btn btn-default">
                <h1>Procura e escolha da perguntas</h1>
                <a class="btn btn-info">Digite a pergunta</a>
                <input type="text" class="btn btn-default" id="pergunta" placeholder="Pegunta que procura" >
                <a class="btn btn-info">Digite a resposta</a>
                <input type="text" class="btn btn-default"  id="resposta" placeholder="Resposta que procura">
                <br>
            </div>
            <div id="passagem_id"></div>

            <script src='insercao_respostas.js'>
            </script>

        </form>
        <br>
        <a class="btn btn-default">Procure a questao desejada e escolha e clicando na pergunta a qual essa resposta pertence</a>
        <br>
        <input type="button" class="btn btn-success" value="enviar">
        <footer></footer>
        <div id="print">


        </div>

    </body>
    <footer></footer>
</html>
