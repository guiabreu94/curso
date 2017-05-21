    
<html>
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
    <header>
        Universidade Veiga de Almeida
        
    </header>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR', max_height: 400,resize: 'both' });</script>
        <script src="javascript_content.js"></script>

        <form action="Questionario_Opicional_Fotos.php" method="post">
            
            
             <!-- <b>Informe o nome do questionario</b> -->
            <br>
            
            
           <!-- <a class="btn btn-default">Caso queira procurar por nome digite ao lado:</a> -->
         <!--   <input name="procura"  id="procura" type="text" placeholder="Pesquisa formulário">&ensp;&ensp;&ensp; -->
            
           <div class="btn btn-default">
               <h1>Procura de questionarios</h1>
            <a class="btn btn-default">Escolha por qual atributo deseja procurar</a>
            <select id="escolha" class="btn btn-default" onclick='checagem(document.getElementById("escolha").value,document.getElementById("texto"))'>
                <option value="0">Escolha</option>
                <option value="nome">Nome</option>
                <option value="instrucao">Instrução</option>
                <option value="Conteudo">Conteudo</option>
                <option value="conclusao">Conclusão</option>
                <option value="Status">Status</option>
            </select>
            
            
            <input type="button" value="click para lista de questionarios" class="btn btn-primary" onclick='lista()'>
            <br> <h id="texto" class="direita"> </h>
            <a class="btn btn-danger" href="insercao_de_questionario.php">Inserir um novo questionario</a>
           </div>
           <script>
      
           </script>
            <br> <br>
            <div id="limpando">
            
            <div1 class="btn btn-default">
                <h2>Selecionar o questionario</h2>
            <a class="btn btn-default">Digite o Nome para acessar o questionario:</a>
            <input name="questionario" type="text" id="nome" class="text-capitalize" placeholder="Nome do questionario">
            &ensp;&ensp;
            
            
            
            <input type="submit"  id="quest" class="btn btn-success" value="Ir para questionario">
            </div1>
            
        </form>
       
<form action="pesquisar.php" method="post">
    
    <div2 class="btn btn-default">
        <h1>Pesquisa de perguntas e repostas</h1>
    <a class="btn btn-default">Digite o Nome para acessar as peguntas e respostas:</a><input name="questionario" type="text" id="nome2" class="text-capitalize" placeholder="Nome do questionario">
    &ensp;&ensp;  <input type="submit"  id="quest2" class="btn btn-success" value="Ir para a consulta das perguntas e respostas">
    
    
  </div2>
</div>
</form>
        <a href="index.php" class="btn btn-danger">Voltar para a pagina anterior</a>
        <br><br>
        
<div id="conteudo">
                <!--local da resposta do servidor-->
            </div>
    </div2
    </body>
    <footer>
        
        
    </footer>
</html>
