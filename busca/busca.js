
 function buscaperguntas(){//função que vai no banco e busca todas as perguntas;Função chamada pelo botão com o nome busca_perguntas

      $.post("busca/buscalista_todas_perguntas.php",//Posta na função buscalista_todas_perguntas.php
      {},//Não informa nenhuma valor no post
      function(resposta){
          $("#conteudo").html(resposta);//Retorna para a tag com o id conteudo o conteudo de resposta em formato html
      }
                );
    };


 function buscarespostas(){// função que vai no banco e busca todas as perguntas;Função chamada pelo botão com name busca_respostas

      $.post("busca/buscalista_todas_respostas.php",//Posta na função buscalista_todas_respostas.php
      {},//Não informa nenhuma valor no post
      function(resposta){
          $("#conteudo").html(resposta);//Retorna para a tag com o id conteudo o conteudo de resposta em formato html
      }
                );
    };

 function checando(valor,passagem){//Função que retorna os valores solicitados de acordo com o atributo informado
     //Função chamada pelo botao com name escolha e id escolher




                     if(valor==="esc"){//Caso seja escolhido o botao escolhido
                        passagem.innerHTML ='';//Não passa nada para o campo como também caso haja algo escrito acaba-se linpado-o

                     }
                     else if(valor==="Conteudo"){//caso o valor seja um cateudo ele é tratado pela função keyup(conforme vai-se digitando faz-se a consulta no banco de dados)

          /* posta na tag com id passagem em formato html.Um botao com a instrução e uma caixa de testo para com o id resp */
          passagem.innerHTML = '<a class="btn btn-default">Escolha qual conteudo deseja procurar</a> <input type="text" id="resp" name="procurap"  placeholder="Conteudo da pergunta">';

                          $("#resp").keyup(function(){//so da o input no nome a partir do momento que o usuário escreve, a cada letra escrita uma nova pesquisa

                              var vnome = $("#resp").val(); //Pega o value da tag com id resp, o qual será o valor que será trasferido para o banco de dados
                              var vcoluna = document.getElementById("escolher").value;//Pega o value da tag com o id escolher, que será qual o "identificador" do atributo que será modificado na tabela
                              $.post("busca/busca_lista_respostas.php",//Faz o post na função busca_lista_respostas.php
                         {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca_lista_respostas.php
                         function(resposta){
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );

                          });

                     }else if(valor==="status"){//Se o valor tiver o "identificador" status então ele será tratado como enum sendo assim predeterminado
                         passagem.innerHTML = '<a class="btn btn-default">Escolha qual status deseja procurar</a> <select name="Status" id="escolhido_resp" onclick="buscando()">\n\
                      <option value="0">Escolha</option>\n\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select>';
         /* select que irá determinar qual o valor que o usuario quer botar no banco  */

                         }else if(valor==="Correta"){//Se ele tiver o "identificador" Correta ele será tratado como enum sendo assim predeterminado
                             passagem.innerHTML = '<a class="btn btn-default">Escolha respostas certas ou erradas</a> <select id="escolhido_resp"  name="escolhido" onclick="buscando()">\n\
                                                  <option value="0">Escolha</option>\n\
                                                  <option value="c">Certo</option>\n\
                                                  <option value="e">Errado</option>\
                                                  </select>';
     /* select que irá determinar qual o valor que o usuario quer botar no banco."c" para certo e "e" para errado//  */
                             }    };




function buscando(){//Função chamada pelas fuções checagem e checando para trazer dados do banco

                        var vnome = document.getElementById("escolhido_resp").value;//Pega o valor inserido para a mudança da input com id escolhido_resp
                        var vcoluna = document.getElementById("escolher").value;//Pega o identificador de onde o canteudo informado será inserido na tabela

                              $.post("busca/busca_lista_respostas.php",//Faz o post na função busca_lista_respostas.php
                         {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca_lista_respostas.php
                         function(resposta){
                             //console.log("entrou no post");
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );



                    };

 function checagem(valor,passagem){//Função chamada pelo input com id escolha e name escolha.Essa função recebe o "identificador" do valor e o valor que deseja-se mudar
                     //console.log(valor);
                     if(valor==="esc"){//Caso o que esteja selecionado seja escolha
                        passagem.innerHTML ='';//Não aparece nada pro usuário e caso ja tenha será apagado

                     }
                     else if(valor==="Conteudo"){//Caso o "identificador" seja conteudo
                         passagem.innerHTML = '<a class="btn btn-default">Qual conteudo deseja procurar</a> <input type="text"  id="pro" name="procurap"  placeholder="Conteudo da pergunta">';
                         //botao input para o recebimento do do texto que será inserido para a procura do conteudo
                          $("#pro").keyup(function(){//so da o input no nome a partir do momento que o usuário escreve, a cada letra escrita uma nova pesquisa

                              var vnome = $("#pro").val();//Pega o valor da tag que tem como id pro
                              var vcoluna = document.getElementById("escolha").value;// pega o valor da tag que tem como id escolha
                              $.post("busca/busca_lista_perguntas.php",//Faz o post na função busca_lista_perguntas.php
                         {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca.php
                         function(resposta){
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );

                          });

                     }else if(valor==="Status"){//Caso o "identificador" busca.php seja status será exibido na tela um select com os possíveis valores que o usuaário pode modifica-lo
                         passagem.innerHTML = '<a class="btn btn-default">Por qual Status procurar </a> <select name="Status"  id="escolhido" onclick="buscando_resp()">\n\
                      <option value="0">Escolha</option>\n\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select>';

                         }else if(valor==="Tipo"){
                             passagem.innerHTML = '<a class="btn btn-default">Por qual estilo de aprendizagem deseja procurar</a> <select id="escolhido"  name="escolhido" onclick="buscando_resp()">\n\
                                                  <option value="0">Escolha</option>\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>';

                             }
    };

    function buscando_resp(){

                        var vnome = document.getElementById("escolhido").value;
                        var vcoluna = document.getElementById("escolha").value;

                              $.post("busca/busca_lista_perguntas.php",//Faz o post na função busca.php
                         {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca.php
                         function(resposta){
                             //console.log("entrou no post");
                             $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
                         }
                    );
                    };


                 /*    function editar_perguntas(id,tipo){
                   console.log(id);
                   console.log(tipo);
               var texto;
                    if (tipo===1){
                        console.log(document.getElementById(id+"c"));
                        texto = '<textarea name="conteudo" rows="4" cols="50" id="p'+id+'_Conteudo"> </textarea> <input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Conteudo")'+"'"+' > ';
                        document.getElementById(id+"c").innerHTML=texto;


                    }else if(tipo === 2){
                        console.log(document.getElementById(id+"s"));
                        texto = '<select name="Status" id="p'+id+'_Status" >\n\
                      <option value="0">Escolha</option>\n\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select> \n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Status")'+"'"+' >';
                        document.getElementById(id+"s").innerHTML=texto;


                    }else if(tipo === 3){
                        console.log(document.getElementById(id+"t"));
                        texto = '<select id="p'+id+'_Tipo"  name="escolhido" >\n\
                                                  <option value="0">Escolha</option>\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Tipo")'+"'"+' >';
                        document.getElementById(id+"t").innerHTML=texto;


                    }else{
                        console.log(document.getElementById(id+"cr"));
                        texto = '<input type="text">';
                        document.getElementById(id).innerHTML=texto;
                    }

               };*/
