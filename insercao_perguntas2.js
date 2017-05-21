    function limp(){//retira da pagina a busca além de limpar os "rastros" da mesma
    $("#butao").html('<input type="button" class="btn btn-success" value="acionar a busca" onclick="buscar()"><br>');//botao de busca
    $("#buscar2").html("");//zera a div que contem a busca
    $("#conteudo").html("");//zera a div onde é exibido o retorno da busca
}
function buscar(){//adiciona um botao que insere a busca para o usuário poder procurar a pergunta desejada ou simplesmente ver todas as perguntas
    var texto;
    texto='\
<div1 class="btn btn-default">'+
 '<h1>Procura de questionarios</h1>'+
'<a class="btn btn-default">Escolha por qual atributo deseja procurar</a>'+
'<select id="escolha" class="btn btn-default" onclick='+"'"+'checagem_button(document.getElementById("escolha").value,document.getElementById("texto"))'+"'"+'>'+
'<option value="0">Escolha</option>'+
'<option value="nome">Nome</option>'+
'<option value="instrucao">Instrução</option>'+
'<option value="Conteudo">Conteudo</option>'+
'<option value="conclusao">Conclusão</option>'+
'<option value="Status">Status</option>'+
'</select>'+
'<input type="button" value="click para lista de questionarios" id="procurando2" class="btn btn-primary" onclick='+"'"+'lista2()'+"'"+'>'+
'<br> <h id="texto" class="direita"> </h>'+
'</div1>';
$("#buscar2").html(texto);//printa o texto na div com o id=busca2
$("#butao").html('<input type="button" class="btn btn-danger" value="retirar busca" onclick="limp()"><br>');//botao para retirar a busca

}
function checagem_button(valor,passagem){
  //chamada pelo select com id escolha que determina que atributo será procurado no abcno de dados.
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
                   $.post("busca/busca_lista_questionarios_butao_selecao.php",//Faz o post na função busca_lista_questionarios.php
              {nome:vnome,coluna:vcoluna},//passa as variaveis nome e coluna para a busca_lista_questionarios.php
              function(resposta){
                  $("#conteudo").html(resposta);//joga o conteudo de resposta(que é um retorno da função busca_lista_questionarios.php) em html para o lugar que esta com id conteudo
              }
         );

               });

          }else if(valor==="Status"){//Caso o valor seja status ele será um enum(ele será "a"=ativo ou "i"= inativo)
              /* Select que passa para o usuário quais são os possíveis status */
              passagem.innerHTML = '<a class="btn btn-default">Por qual Status procurar</a><select name="Status" id="escolhido" onclick="buscando_resp_perg()">\n\
           <option value="0">Escolha</option>\n\
           <option value="a">Ativo</option>\n\
           <option value="i">Inativo</option> </select>';



} }
function buscando_resp_perg(){

         var vnome = document.getElementById("escolhido").value;//Pega o valor que deseja-se mudar
         var vcoluna = document.getElementById("escolha").value;//Pega em qual atributo será posto o valor
        // console.log(vnome);
       // console.log(vcoluna);
       //  console.log("alo");
               $.post("busca/busca_lista_questionarios_butao_selecao.php",//Faz o post na função busca_lista_questionarios.php
          {nome:vnome,coluna:vcoluna},//passa a variavel nome para a busca_lista_questionarios.php
          function(resposta){
              //console.log("entrou no post");
              $("#conteudo").html(resposta);//joga o conteudo de resposta em html para o lugar que esta com id conteudo
          }
     );
     };
     function lista2(){//função acionada pelo botao com o value de : click para lista de questionarios
                        $.post("busca/buscalista_todos_questionarios_selecao.php",//faz um post pra função:buscalista_toso_questionarios.php
                              {},//Não envia nenhuma variavel pra função
                              function(resposta){//recebe um retorno que fika armazenada na variavel resposta
                                  $("#conteudo").html(resposta);
                              }//pega a variável resposta e imprime no id conteudo em formato html, ja que o "print" normal é do tipo texto
                              );
         };
   function selecao_questionario(nome){
     texto= document.querySelector("#questionarioSelecionado");
     texto.innerHTML = '<a class="btn btn-primary">O questionario selecionado foi:</a>' + '<a class="btn btn-default">'+nome+'</a>';
   }
