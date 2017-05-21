function voltar(){//tira a escolha dos tipos e fornece ao usuário quantos tipos ele quer adicionar
var texto = document.getElementById("tipos");
texto.innerHTML='<a class="btn btn-info">Escolha quantos tipos a questao tem:</a>'+
'<select name="tipo" class="btn btn-default" id="tipo">'+
    '<option value="1">1 Tipo</option>'+
    '<option value="2">2 Tipos</option>'+
    '<option value="3">3 Tipos</option>'+
    '<option value="4">4 Tipos</option>'+
'</select>'+
'<input type="button" class="btn btn-success" value="Confirmar" onclick="aparecendo()">';
};

function aparecendo(){
var tipo=document.getElementById("tipo").value;//quantos tipos tem a pergunta
//console.log(tipo);
var cont;
var texto = document.getElementById("tipos");/* Contem os select com os quais tipos o usuário pode inserir e os botoes de voltar
*  para quantos tipos o usuário quer inserir e  o botao  */
var html='<a class="btn btn-success">Tipos da resposta</a>"';
// console.log("texto");
texto.innerHTML='';
for(cont=0;cont<tipo;cont++){//for que irá exibir ao usuário as opções de tipos para o usuário escolher(referente a quantos tipos ele escolheu anteriormente)
html= html+'<select id="escolhido"  name="escolhido" class="btn btn-default">'+
                                  '<option value="Vis">Visual</option>'+
                                  '<option value="Ver">Verbal</option>'+
                                  '<option value="Seq">Sequencial</option>'+
                                  '<option value="Glo">Global</option>'+
                                  '<option value="Sen">Sensorial</option>'+
                                  '<option value="Int">Intuitivo</option>'+
                                  '<option value="Ati">Ativo</option>'+
                                  '<option value="Ref">Reflexivo</option>'+
                                  '</select>' ;
}
html = html + '<input type="button" value="voltar" class="btn btn-danger" onclick='+"'"+'voltar()'+"'"+'> \n\
\n\<input type="button" value="enviar" id="enviarPergunta" onclick='+"'"+'conferindo()'+"'"+' class="btn btn-success"> ';
//botao de enviar a pergunta pro banco
texto.innerHTML=html;
}

function conferindo(){//checa pra ver se algum campo não foi preenchido
var conteudoPergunta = tinyMCE.get("conteudoPergunta").getContent();
if(conteudoPergunta === ""){
alert("o conteudo da pergunta não foi preenchido");
var conteudoResposta = tinyMCE.get("conteudoResposta")
}};

function quantresp(quantidade_resposta/*quantas respostas o usuário decidiu inserir na questão*/){
//console.log("entrou a função que irá conter o for para imprimir as respostas");
var cont=0;//contador para o for
//console.log(quantidade_resposta);
var quantidade = parseInt(quantidade_resposta);//transformando o valor em um número inteira já que ele vem como string para poder ser utilizado como tal
//console.log(quantidade_resposta);
var html = document.getElementById("respostas");//pega tudo que está na div com o id respostas
html.innerHTML= "";//zera a div
for(cont=1;cont<quantidade+1;cont++){//for que adiciona os campos que o usuário vai digitar as repostas
//console.log(cont);
//console.log("conteudoResposta"+cont);
html.innerHTML = html.innerHTML + '<div class="btn btn-default">'+
'<div1>'+
'<h1>Conteudo da resposta</h1>'+
'<textarea name="conteudo" rows="3" cols="50" id="conteudoResposta'+cont+'"></textarea>'+
'<br>'+
'<a class="btn btn-info">Escolha por qual status deseja inserir:</a>'+
'<select name="status" class="btn btn-default" id="statusResposta'+cont+'" >'+
'<option value="a">ativo</option>'+
'<option value="i">inativo</option>'+
'</select></div1><br>'+
'<div2 id="tipos">'+
'<a class="btn btn-info">Escolha se a questão está certa ou errada:</a>'+
'<label>'+
    '<input type="radio" name="correta"  id="radio" value="'+cont+'" checked>Questao correta'+
    '</label>'+
'</select>'+
'</div2>'+
'</div>';//onde serão inseridos os dados  das respostas
}
cont = cont-1;
html.innerHTML = html.innerHTML + '<br><br><input type="button" class="btn btn-warning" value="preview da questao" onclick='+"'"+'preview('+cont+')'+"'"+'>&nbsp&nbsp&nbsp&nbsp\
<input type="button" value="Remover colocação de perguntas" class="btn btn-danger" onclick='+"'"+'limpando2()'+"'"+'>';/*botao de limpar as resposatas ja que no questionario
* o aluno pode escolher se vai ou não responder a pergunta */
};

function limpando2(){//fuinção que limpa as respostas caso o aluno não queira responder
var html=document.getElementById("respostas");
html.innerHTML='<input type="button" id="retorno" value="click para adicinar perguntas e respostas" class="btn btn-default" onclick='+"'"+'print_respostas(document.getElementById("respostas"))'+"'"+'>';
//retorna para o procedimento anterior que seria selecionar quantas se o usuário quer inserir respostas para a pergunta
var preview = document.querySelector("#preview");
//console.log(preview);
preview.textContent ="";//limpa a div que contem o preview da pergunta do usuário e de suas respostas
};

function montaObjeto(numeroRespostas){//monta o objeto questao que será usado nas funções subsequentes
switch (numeroRespostas) {//de acordo com o numero de respostas o vetor do objeto de respostas será preemchido

case 2:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = {1 : document.getElementById("conteudoResposta1").value,
                2 : document.getElementById("conteudoResposta2").value};

var status = {1 : document.getElementById("statusResposta1").value,
              2 : document.getElementById("statusResposta2").value};
              var num_resps=2;
break;
case 3:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = {1 : document.getElementById("conteudoResposta1").value,
                2 : document.getElementById("conteudoResposta2").value,
                3 : document.getElementById("conteudoResposta3").value};

var status = {1 : document.getElementById("statusResposta1").value,
              2 : document.getElementById("statusResposta2").value,
              3 : document.getElementById("statusResposta3").value};
              var num_resps=3;
break;
case 4:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = {1 : document.getElementById("conteudoResposta1").value,
                2 : document.getElementById("conteudoResposta2").value,
                3 : document.getElementById("conteudoResposta3").value,
                4 : document.getElementById("conteudoResposta4").value};

var status = {1 : document.getElementById("statusResposta1").value,
              2 : document.getElementById("statusResposta2").value,
              3 : document.getElementById("statusResposta3").value,
              4 : document.getElementById("statusResposta4").value};
              var numeroRespostas=4;
break;
default:
//console.log("não acessou nenhum dos cases anteriores");
break;
//tinyMCE.get("conteudo1").getContent()
}
var questao = {pergunta : tinyMCE.get("conteudoPergunta").getContent(), //conteudo da pergunta
 Status : document.getElementById("status").value, // status da pergunta
 resposta : resposta, // vetor contendo o conteudo de todas as respostas
 status_resposta : status, //vetor contendo status de todas as respostas
 numeroRespostas : numeroRespostas, // numero de respostas a serem adicionadas
 correta : document.getElementsByName("correta"), //vetor que tem como informação qual é a resposta correta
resp_vazio :function vazio(){//ve se ha alguma resposta vazia
var cont;
for(cont=1;cont<this.numeroRespostas+1;cont++){
if(this.resposta[cont]===""){
return 1;
}
}
return 0;},
procura_correta : function procura(){//acha a resposta correta
var cont;
for(cont=0;cont<this.numeroRespostas;cont++){
if(this.correta[cont].checked===true){
//var retorno ="a resposta "+ this.correta[cont].value+" esta correta";
return (cont);
cont=200;}}}
};

return questao;//objeto retornado

}


function preview(num_respostas){//monta literalmente o preview da questao em baixo das opções
var numero = parseInt(num_respostas);
var questao = montaObjeto(numero);

if(questao.resp_vazio() === 1){//verifica se alguma resposta não foi preenchida

alert("Alguma resposta não foi preenchida");

}else if(questao.pergunta === ""){//verifica se a pergunta não foi preenchuda

alert("A pergunta não foi preenchida");
}else{
var questao = montaObjeto(num_respostas);//monta o objeto que será utilizado para montar o preview
var texto = document.querySelector("#preview");//pega o valor da div onde será printado o preview
texto.innerHTML='<h1>Preview da pergunta</h1>'+
'<a class="btn btn-default">'+questao.pergunta+'</a>'+
'<input type="button" value="responder" class="btn btn-info" onclick='+"'"+'printRespostasPreview('+questao.numeroRespostas+')'+"'"+'>'+
'<br><div1 id="respostas1"></div1>';
}

}

function printRespostasPreview(numeroRespostas){
var numero=parseInt(numeroRespostas);
var questao = montaObjeto(numero);
var respostas = document.querySelector("#respostas1");//div onde serão impressas as respostas
var respostaCorreta = questao.procura_correta();//rpcura qual é a resposta correta
for(cont=1;cont<numero+1;cont++){//for que vai printando as respostas
if(questao.status_resposta[cont] === "a"){//caso a resposta esteja ativa ela será printada
respostas.innerHTML = respostas.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+questao.resposta[cont]+'</a> </label>';
if((cont-1) === respostaCorreta){
respostas.innerHTML = respostas.innerHTML + '<a class="btn btn-success">Correta</a> ';
        }else{
          respostas.innerHTML = respostas.innerHTML + '<br>';}
      }}
respostas.innerHTML = respostas.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger" onclick='+"'"+'preview('+numero+')'+"'"+'>';
//botao que retira as respostas
}



//acao é um parametro que indica se eu estou fazendo a mudança ou se estou procurad

/*  function preview(num_respostas){
var resposta;
var  questao = montaObjeto(num_respostas);

  //var print = questao.correta[1].checked;
  var respostaCorreta = questao.procura_correta();//valida se houve alguma resposta que não foi respondida
  console.log("variavel print");
  //console.log(print);
   if(questao.resp_vazio() === 1){

    alert("Alguma resposta não foi preenchida");

   }else if(questao.pergunta === ""){

   alert("A pergunta não foi preenchida");
   }else{

   var texto = document.querySelector("#preview");
   texto.innerHTML='<h1>Preview da pergunta</h1><br><br>'+
                    '<a class="btn btn-default">'+questao.pergunta+'</a>'+
                    '<input type="button" value="responder" class="btn btn-info">'+
                    '<br><div1 id="respostas1"></div1>';
                        var respostas = document.getElementById("respostas1");
                                            var cont=0;
    for(cont=1;cont<num_respostas+1;cont++){
        respostas.innerHTML = respostas.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+questao.resposta[cont]+'</a> </label> ';
        if((cont-1) === respostaCorreta){

            respostas.innerHTML = respostas.innerHTML + '<a class="btn btn-success">Correta</a> ';
            respostas.innerHTML = respostas.innerHTML + '<input type="button" value="mudar" class="btn btn-danger" id="mudando" onclick='+"'"+'mudarCorreta('+questao.numeroRespostas+')'+"'"+'><br>';

                          }else{respostas.innerHTML = respostas.innerHTML + '<br>';}

                        }
   respostas.innerHTML = respostas.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger">';
   }
   console.log(questao);
};*/

/* function mudarCorreta(numeroRespostas){
questao =  montaObjeto(numeroRespostas)
console.log(questao);

var previewQuestao = document.querySelector("#preview");
previewQuestao.innerHTML = '<h1>Seleção de qual resposta é a correta</h1><br><br>'+
       '<a class="btn btn-default">'+questao.pergunta+'</a>'+
       '<input type="button" value="responder" class="btn btn-info">'+
       '<br><div1 id="respostas1"></div1>';
       var respostas = document.getElementById("respostas1");
                               var cont=0;
                               for(cont=1;cont<questao.numeroRespostas+1;cont++){
                                 respostas.innerHTML = respostas.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+questao.resposta[cont]+'</a> </label>'+
                                 '&nbsp&nbsp<input type="button" value="correta" class="btn btn-success">';
                               }
                              respostas.innerHTML = respostas.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger">';
}*/

function print_respostas(texto){//printa pro usuário quantas respostas ele gostaria de inserir com a pergunta

texto.innerHTML='<a class="btn btn-default">Quantas respostas deseja adicionar:</a><select id="quantidade"  name="quantidade" class="btn btn-default">'+
                                  '<option value="2">2</option>'+
                                  '<option value="3">3</option>'+
                                  '<option value="4">4</option>'+
                                  '</select>'+
                                  '<input type="button" value="confirmar" class="btn btn-default" onclick='+"'"+'quantresp(document.getElementById("quantidade").value)'+"'"+'>';
};

/*var botao = document.querySelector("#mudando");
botao.addEventListener("click",function(questao){
//event.preventDefault();
console.log(questao);
por que esse código não esta funcionando
});*/
