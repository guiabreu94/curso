/* ao digitar será buscado la no banco as perguntas com as palavras digitadas*/
                    $("#pergunta").keyup(function(){

                        var vnome = document.getElementById("pergunta").value;

                        $.post("insercao/relacao_resp.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#print").html(resposta);
                        });
                    });

/* ao digitar será buscado la no banco as perguntas com as palavras digitadas*/
                 $("#resposta").keyup(function(){
                        var vnome = document.getElementById("resposta").value;
                        $.post("insercao/relacao_perg.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#print").html(resposta);
                        });
                    });

    function passagem_id(id_repassado,conteudo){/*recebe da função pgp relacao_perg o conteudo da pergunta e o id da pergunta que foi selecionada pelo usuário */
        var texto= document.getElementById("passagem_id");//pega o conteuda da div onde será impresso o conteudo abaixo
        texto.innerHTML='<br><div class="btn btn-default"><h1>Seleção da pesquisa</h1><a class="btn btn-default">A pergunta escolhida foi:</a><a class="btn btn-danger">'+conteudo+'</a>\n\
        <input type="hidden" id="os_id" name="id" value='+id_repassado+'><br><br>\n\
<input type="button" class="btn btn-success" value="Preview da resposta no formulario" onclick='+"'"+'preview(tinyMCE.get("conteudo1").getContent(),"'+conteudo+'",'+id_repassado+',document.getElementById("status").value)'+"'"+'">\n\
</div><br><br>';//contem um título da operação  a pergunta selecionada e a opão de ser feito um preview

      //  console.log(document.getElementById("os_id").value);

    };

    function preview(conteudo_resposta,conteudo_pergunta,id,status){
        //console.log(conteudo_resposta);
        if(tinyMCE.get("conteudo1").getContent()===""){//verifica se o conteudo esta vazio
            alert("O campo de resposta não foi preenchido");
        }else{//caso n esteja vazio entao exibi-se o preview

        var texto = document.getElementById("print");
        texto.innerHTML = '<h1>Preview da pergunta</h1> <br><br><a class="btn btn-default" id="identificador">'+conteudo_pergunta+'</a><div1 id="butao">\n\
<input type="button" id="butao" value="responder" class="btn btn-info" onclick='+"'"+'show("'+conteudo_resposta+'",'+id+',"'+status+'")'+"'"+'> </div1> <br><br><div id="resposta1"></div>';
        }
    }

     function show(conteudo_resposta,id,status){
         //console.log("a resposta digitada é");
         //console.log(conteudo_resposta);
         //console.log("alo");
         var texto = document.getElementById("butao");
         texto.innerHTML= "";
         $.post("registro/preview.php",
         {id:id,conteudo_resposta:conteudo_resposta,status:status},
         function(resposta){
         $("#resposta1").html(resposta);

    });
    //console.log(status);// esta retornando o valor certo
    }
     function limpando(id,conteudo_resposta,status){
         var texto= document.getElementById("resposta1");
         //console.log(conteudo_resposta);
         texto.textContent="";
         var butao = document.getElementById("butao");
         butao.innerHTML = '<input type="button" value="responder" class="btn btn-info" onclick='+"'"+'show("'+conteudo_resposta+'",'+id+',"'+status+'")'+"'"+' >';
     }

     function editar(){
         var texto = document.getElementById("resposta1");
         var respostas = texto.getElementsByClassName("btn btn-warning");
         //console.log(respostas.length);
         var cont;
         for(cont=0;cont<respostas.length;cont++){
             //console.log(respostas[cont]);
             //console.log(respostas[cont]);
         }
     }
