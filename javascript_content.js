function lista(){//função acionada pelo botao com o value de : click para lista de questionarios
                   $.post("busca/buscalista_todos_questionarios.php",//faz um post pra função:buscalista_toso_questionarios.php
                         {},//Não envia nenhuma variavel pra função
                         function(resposta){//recebe um retorno que fika armazenada na variavel resposta
                             $("#conteudo").html(resposta);
                         }//pega a variável resposta e imprime no id conteudo em formato html, ja que o "print" normal é do tipo texto
                         );
    };


    $(document).ready(function(){//Faz com que a função só seja carregada quando a página carregar

               //ao clicar na tecla de envia
               $("#quest2").click(function(){//Função que só é ativada quando o botao for clicado, botao referente ao id quest2


                   //guarda o valor digitado no campo nome2
                   var vnome = $("#nome2").val();


                   //url, dados, função de retorno
                   $.post("confere.php",//Faz post para a função confere.php
                         {nome:vnome},//passa a variável para a função
                         function(confere){//Recebe um retorno denominado confere
                             if(confere==="incorreto"){//testa para ver se esta incorreto
                             window.location = 'requerimentos_curriculo.php';//caso esteja incorreto a página é recarregada
                             alert('Não Há questionario com esse nome!');//Mostra um alert informando o usuário

                          }
                         }
                    );

               });

            });

    $(document).ready(function(){//Faz com que a função só seja carregada quando a página carregar

               //ao clicar na tecla de envia
               $("#quest").click(function(){//Função que só é ativada quando o botao for clicado, botao referente ao id quest2


                   //guarda o valor digitado no campo nome
                   var vnome = $("#nome").val();


                   //url, dados, função de retorno
                   $.post("confere.php",//Faz post para a função confere.php
                         {nome:vnome},//Recebe um retorno denominado confere
                         function(confere){//Recebe um retorno denominado confere
                             if(confere==="incorreto"){//testa para ver se esta incorreto
                             window.location = 'requerimentos_curriculo.php';   //caso esteja incorreto a página é recarregada
                             alert('Não Há questionario com esse nome!');//Mostra um alert informando o usuário

                          }
                         }
                    );

               });

            });


             function checagem(valor,passagem){//chamada pelo select com id escolha que determina que atributo será procurado no abcno de dados.
                     //console.log(valor);
                     if(valor==="esc"){
                         /* Caso o select esteja em escolha não será exibido nada.Mas também se caso algo tenha sido imprimido ele zera o conteudo que
                          * do id que foi informado */
                        passagem.innerHTML ='';

                     }
                     else if(valor==="Conteudo" || valor==="nome" || valor==="instrucao" || valor==="conclusao"){
                         /* Como todos os valores do if são strings que não são fixas(não são enum) foi utilizado a função key up*/
                         passagem.innerHTML = '<a class="btn btn-default">Escreva qual '+valor+' deseja procurar</a>   <input type="text" id="pro" name="procurap"  placeholder=" '+valor+'">';
                         /* tag <a> descrevendo a operação que pode ser feita com o input  a seguir
                          * input do tipo texto que será recurso para a função keyup */
                          $("#pro").keyup(function(){//so da o input no nome a partir do momento que o usuário escreve, a cada letra escrita uma nova pesquisa

                              var vnome = $("#pro").val();//Pega o value do id chamado "pro" que no caso é o input para a procura da variavel fornecido no banaco de dados
                              var vcoluna = document.getElementById("escolha").value;//Pega a string do logal com id escolha, que no caso será em qual coluna da tabela dentro do banco de dados que será feita a mudança
                              $.post("busca/busca_lista_questionarios.php",//Faz o post na função busca_lista_questionarios.php
                         {nome:vnome,coluna:vcoluna},//passa as variaveis nome e coluna para a busca_lista_questionarios.php
                         function(resposta){
                             $("#conteudo").html(resposta);//joga o conteudo de resposta(que é um retorno da função busca_lista_questionarios.php) em html para o lugar que esta com id conteudo
                         }
                    );

                          });

                     }else if(valor==="Status"){//Caso o valor seja status ele será um enum(ele será "a"=ativo ou "i"= inativo)
                         /* Select que passa para o usuário quais são os possíveis status */
                         passagem.innerHTML = '<a class="btn btn-default">Por qual Status procurar</a><select name="Status" id="escolhido" onclick="buscando_resp()">\n\
                      <option value="0">Escolha</option>\n\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select>';

                         }
    };

               function buscando_resp(){

                        var vnome = document.getElementById("escolhido").value;//Pega o valor que deseja-se mudar
                        var vcoluna = document.getElementById("escolha").value;//Pega em qual atributo será posto o valor
                       // console.log(vnome);
                      // console.log(vcoluna);
                      //  console.log("alo");
                              $.post("busca/busca_lista_questionarios_.php",//Faz o post na função busca_lista_questionarios.php
                         {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca_lista_questionarios.php
                         function(resposta){
                             //console.log("entrou no post");
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );
                    };


function aparecer(num,num_quest_nece){//função que faz o botao limpar aparecer somente quando o botão responder for apertado

                            if(redefinir[num]===0){
                                if(resposta<num_quest_nece ){//n deixa q o botao seja printado mesmo q todas as respostas necessárias tenham cido respondidas
          var div = document.getElementById("limpar"+num);//nome do id do local onde será posto o botão limpar

                div.innerHTML = '<input type="button" value="limpar" class="btn btn-danger" onclick=limpar'+num+'(),atualizar()>';}}//printa o botao limpar em limpar especifico
            };//printa o botao limpar em limpar especifico
