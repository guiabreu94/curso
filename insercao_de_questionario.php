<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR' });</script>
        <script src="javascript_content.js"></script>

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
    <head>
    <header>Menu para adicionar um questionario</header>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    <br>
    <script>
        function limp(){
            $("#butao").html('<input type="button" class="btn btn-success" value="acionar a busca" onclick="buscar()"><br>');
            $("#buscar2").html("");
            $("#conteudo").html("");
        }
        function buscar(){
            var texto;
            texto='\
    <div1 class="btn btn-default">'+
         '<h1>Procura de questionarios</h1>'+
'<a class="btn btn-default">Escolha por qual atributo deseja procurar</a>'+
'<select id="escolha" class="btn btn-default" onclick='+"'"+'checagem(document.getElementById("escolha").value,document.getElementById("texto"))'+"'"+'>'+
'<option value="0">Escolha</option>'+
'<option value="nome">Nome</option>'+
'<option value="instrucao">Instrução</option>'+
'<option value="Conteudo">Conteudo</option>'+
'<option value="conclusao">Conclusão</option>'+
'<option value="Status">Status</option>'+
'</select>'+
'<input type="button" value="click para lista de questionarios" class="btn btn-primary" onclick='+"'"+'lista()'+"'"+'>'+
'<br> <h id="texto" class="direita"> </h>'+
'</div1>';
        $("#buscar2").html(texto);
        $("#butao").html('<input type="button" class="btn btn-danger" value="retirar busca" onclick="limp()"><br>');

        }

        </script>
        <form action="gravar_questionario.php" class="form control-label" method="post">

        <div4 class="btn btn-default">
            <h1>Inserção de um novo formulario</h1>
            <div5 class='btn btn default'>

                <h1>Conteudo:</h1>
                <textarea name="conteudo" id="conteudo" rows="3" cols="50" ></textarea>

            </div5>
             <div5 class='btn btn default'>

                <h1>Conclusão:</h1>
                <textarea name="conclusao" id="conclusao" rows="3" cols="50" ></textarea>

            </div5>
            <br>
             <div5 class='btn btn default'>

                <h1>Instrução:</h1>
                <textarea name="instrucao" id="instrucao" rows="3" cols="50" ></textarea>

            </div5>
            <div5 class='btn btn default'>

                <h1>Nome:</h1>
                <textarea name="nome" id="nome" rows="3" cols="50" ></textarea>

            </div5>
            <br><br>
            <!--<div5 class="btn btn default">
                <a class="btn btn-info">Insira o nome da pagina:</a>
                <input type="text" name="pagina">
            </div5>-->
            <div5>
                <a class="btn btn-info">Escolha por qual status deseja inserir:</a>
            <select name="status" class="btn btn-default" >

                <label>
                <option value="a">ativo</option>
                </label>

                <label>
                <option value="nome">inativo</option>
                </label>

            </select>
            </div5>
            <div5>
                <label>
                <a class="btn btn-info">digite o número de questoes necessárias:</a>

                <input type="text" class="btn btn-default" name="num" required>
                </label>
            </div5>
            <div>
                <label>
                <a class="btn btn-info">Digite a qual curso o questionario pertence:</a>

                <input type="text" class="btn btn-default" name="curso" required>
                </label>

            </div>

            <div >
                <h1>Inserir perguntas?</h1>

                <label>
                <input type="radio" name="insert" value="1" class="btn btn-default" >Inserir perguntas<br>
                </label>

                <label>
                <input type="radio" name="insert" value="2" class="btn btn-default" checked >Não inserir perguntas<br>
                </label>

            </div>
            <br>
            <a class="btn btn-danger" href="requerimentos_curriculo.php">Voltar a pagina</a>&nbsp&nbsp&nbsp
            <input type="submit" value="preview" class="btn btn-success" onclick="check()">
        </div4>

            <script>
                function check(){
                    var conteudo = tinyMCE.get("conteudo").getContent();
                    var conclusao = tinyMCE.get("conclusao").getContent();
                    var instrucao = tinyMCE.get("instrucao").getContent();
                    var nome = tinyMCE.get("nome").getContent();
        if(conteudo === "" || conclusao === "" || instrucao === "" || nome === ""){
            alert("Algum campo está em branco");
        }

                };


            </script>
        </form>
                <div id="butao">
<br>
        <input type="button" class="btn btn-success" value="acionar a busca" onclick="buscar()">
        <!--<input type="button" class="btn btn-danger" value="retirar busca" onclick="limp()">-->
        <br></div>
    <div2 id="buscar2">

    </div2>


    <footer></footer>
            <div id="conteudo">
            </div>
    </body>
    <footer></footer>
</html>
