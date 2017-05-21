<?php 

$nome=$_POST["questionario"];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR' });</script>
        <title></title>
    </head>
    <body>
        <form action="">
            
            <div class="conteiner">
                <a class="btn btn-default">Didite o conteudo da pergunta que deseja modificar</a>
                <input type="text" name="procurap" id="procurap" placeholder="Digite a pergunta">
                <input type="button" name="busca_perguntas" class="btn btn-success" value="Veja todas as perguntas" onclick='buscaperguntas()' >
                
                
                <script >
                    function buscaperguntas(){
                    
      $.post("busca/buscalista_todas_perguntas.php",
      {},
      function(resposta){
          $("#conteudo").html(resposta);
      }
                );              
    };
                    </script>
            
        <script>            
            $(document).ready(function(){//Só carregar o scrpit quando o documento terminar de carregar
               
               //ao soltar uma tecla dentro do input com id nome
               $("#procurap").keyup(function(){//so da o input no nome a partir do momento que o usuário escreve, a cada letra escrita uma nova pesquisa
                   //alert('ok');
                   
                   //guarda o valor digitado no campo nome                   
                   var vnome = $("#procurap").val();                   
                   //alert(vnome);
                   
                   //url, dados, função de retorno
                   $.post("busca/busca_lista_perguntas.php",//Faz o post na função busca.php
                         {nome:vnome},//passa a variavel nome para a busca.php
                         function(resposta){
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );
                   
               });
               
            });            
        </script>
        
        
            </div>
        </form>
        
        <form action="">
            
            <div class="conteiner">
                <a class="btn btn-default">Didite o conteudo da resposta que deseja modificar</a>
                <input type="text" id="procurar" placeholder="Digite a resposta">
                <input type="button" name="busca_respostas" class="btn btn-success" value="Veja todas as respostas" onclick='buscarespostas()' >
            
                <script>
                    function buscarespostas(){
                    
      $.post("busca/buscalista_todas_respostas.php",
      {},
      function(resposta){
          $("#conteudo").html(resposta);
      }
                );              
    };
                    </script>
                
        <script>            
            $(document).ready(function(){//Só carregar o scrpit quando o documento terminar de carregar
               
               //ao soltar uma tecla dentro do input com id nome
               $("#procurar").keyup(function(){//so da o input no nome a partir do momento que o usuário escreve, a cada letra escrita uma nova pesquisa
                   //alert('ok');
                   
                   //guarda o valor digitado no campo nome                   
                   var vnome = $("#procurar").val();                   
                   //alert(vnome);
                   
                   //url, dados, função de retorno
                   $.post("busca/busca_lista_respostas.php",//Faz o post na função busca.php
                         {nome:vnome},//passa a variavel nome para a busca.php
                         function(resposta){
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );
                   
               });
               
            });            
        </script>
        
        
            </div>
        </form>
        
        <div id="conteudo">
            
            
            
            
        </div>
    </body>
</html>
