    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <header>Universidade Veiga de Almeida</header>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR', max_height: 400,resize: 'both' });</script>
        <meta charset="UTF-8">
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
    </style>
    <body>
        <br>
        <form action="gravar_perguntas.php"  method="post">
        <div class="btn btn-default">

            <div1>
                <h1>Conteudo da pergunta</h1>
            <textarea name="conteudo"  class="form-control"   id="conteudoPergunta" ></textarea>
            <!-- text onde o conteudo da pergunta será inserido -->

             <a class="btn btn-info">Escolha por qual status deseja inserir:</a>
            <select name="status" class="btn btn-default" id="status" >
                <option value="a">ativo</option>
                <option value="nome">inativo</option>
                                </select>

             <div2 id="tipos">
                <a class="btn btn-info">Escolha quantos tipos a questao tem:</a>
                <select name="tipo" class="btn btn-default" id="tipo">
                    <option value="1">1 Tipo</option>
                    <option value="2">2 Tipos</option>
                    <option value="3">3 Tipos</option>
                    <option value="4">4 Tipos</option>
                </select>
                <input type="button" class="btn btn-success" value="Confirmar" onclick="aparecer()">
                </div2>

             <br><br><br>

             <div  id="respostas">
                 <input type="button" id="retorno" value="click para adicinar perguntas e respostas" class="btn btn-default" onclick='print_respostas(document.getElementById("respostas"))'>
             </div>
        </form>
            </div>
            <br>
            <a href="pesquisar.php" class="btn btn-danger">Voltar para a pagina anterior</a>
        </div>
        <script src="insercao_perguntas.js"></script>
        <div id="preview"></div>
<br><br>
        <div id="butao">
<br>
<input type="button" class="btn btn-success" value="acionar a busca" onclick="buscar()">
<!--<input type="button" class="btn btn-danger" value="retirar busca" onclick="limp()">-->
<br></div>
<div2 id="buscar2">

</div2>
<input type="button" class="btn btn-success" value="enviar"><br>
<br>
<div id="questionarioSelecionado" >

</div>


<footer></footer>
<h1>Click no nome do questinário para seleciona-lo</h1>
    <div id="conteudo">
    </div>


        <script src="insercao_perguntas2.js"></script>
        <script src="javascript_content.js"></script>
    </body>
