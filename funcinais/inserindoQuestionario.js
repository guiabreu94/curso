var respostas=0;//ter quantas respostas que ja foram inseridas
var perguntas = new Array(110);//vai armazenar o conteudo todas as perguntas_cont
var conteudoRespostas = new Array(420);//vai armazenar o conteudo de todas as respostas
var statusRespostas = new Array(420);//vai armazenar os status de todas a perguntas
var statusPerguntas = new Array(110);//vai aramazenar o status das respostas
var tipoPerguntas = new Array(110);//vai armazenar o tipo das perguntas
var slotRespostas=1;
//variavel que marca qual slot esta sendo armazenados os dados das respostas
var respostasCorretas = new Array(420);
var numeroQuestao = new Array(110);
var quantidadeRespostasCadaPergunta = new Array(110);
//var questionario{perguntas}  //objeto com todo o questionario

/* var questionario{QuantidadeRespostas : respostas,
                 ConteudoPerguntas : perguntas,
                 ConteudoRespostas : conteudoRespostas,
                 StatusPerguntas : statusPerguntas,
                 StatusRespostas : statusRespostas,
                 TipoPerguntas : tipoPerguntas};
esse objeto tem que ser montado ao final quando for ser feito o input para o envio pro PHP e entao para o MySQL
                 */


function voltar(){
var texto = document.getElementById("tipos");
texto.innerHTML='<a class="btn btn-info">Escolha quantos tipos a questao tem:</a>'+
'<select name="tipo" class="btn btn-default" id="tipo">'+
    '<option value="1">1 Tipo</option>'+
    '<option value="2">2 Tipos</option>'+
    '<option value="3">3 Tipos</option>'+
    '<option value="4">4 Tipos</option>'+
'</select>'+
'<input type="button" class="btn btn-success" value="Confirmar" onclick="aparecer()">';
};

function aparecer(){
var tipo=document.getElementById("tipo").value;//quantos tipos tem a pergunta
//console.log(tipo);
var cont;
var texto = document.getElementById("tipos");/* Contem os select com os quais tipos o usuário pode inserir e os botoes de voltar
*  para quantos tipos o usuário quer inserir e  o botao  */
var html='<a class="btn btn-success">Tipos da resposta</a>"';
// console.log("texto");
texto.innerHTML='';
for(cont=0;cont<tipo;cont++){
html= html+'<select id="escolhido"  name="escolhido" class="btn btn-default">'+
                                  '<option value="Vis">Visual</option>'+
                                  '<option value="Ver">Verbal</option>'+
                                  '<option value="Seq">Sequencial</option>'+
                                  '<option value="Glo">Global</option>'+
                                  '<option value="Sen">Sensorial</option>'+
                                  '<option value="Int">Intuitivo</option>'+
                                  '<option value="Ati">Ativo</option>'+
                                  '<option value="Ref">Reflexivo</option>'+
                                  '</select>';
}
html = html + '<input type="button" value="voltar" class="btn btn-danger" onclick='+"'"+'voltar()'+"'"+'> \n\
\n\<input type="button" value="enviar" id="enviarPergunta" onclick='+"'"+'conferindo()'+"'"+' class="btn btn-success"> ';
texto.innerHTML=html;
}

function conferindo(){
var conteudoPergunta = tinyMCE.get("conteudoPergunta").getContent();
if(conteudoPergunta === ""){
alert("o conteudo da pergunta não foi preenchido");
var conteudoResposta = tinyMCE.get("conteudoResposta")
}};

  function quantrespo(quantidade_resposta/*quantas respostas o usuário decidiu inserir na questão*/){
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

function montaObjeto(numeroRespostas){
switch (numeroRespostas) {//value

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
resp_vazio :function vazio(){
var cont;
for(cont=1;cont<this.numeroRespostas+1;cont++){
if(this.resposta[cont]===""){
return 1;
}
}
return 0;},
procura_correta : function procura(){
var cont;
for(cont=0;cont<this.numeroRespostas;cont++){
if(this.correta[cont].checked===true){
//var retorno ="a resposta "+ this.correta[cont].value+" esta correta";
return (cont);
cont=200;}}}
};

return questao;

};
function preview(num_respostas){//monta como a resposta ficaria apos ser adicionada no questionario
var numero = parseInt(num_respostas);
var questao = montaObjeto(numero);

if(questao.resp_vazio() === 1){

alert("Alguma resposta não foi preenchida");

}else if(questao.pergunta === ""){

alert("A pergunta não foi preenchida");
}else{
var questao = montaObjeto(num_respostas);
var texto = document.querySelector("#preview");
texto.innerHTML='<h1>Preview da pergunta</h1>'+
'<a class="btn btn-default">'+questao.pergunta+'</a>'+
'<input type="button" value="responder" class="btn btn-info" onclick='+"'"+'printRespostasPreview('+questao.numeroRespostas+')'+"'"+'>'+
'<br><div1 id="respostas1"></div1>'+'<br><br>'+
'<input type="button" class="btn btn-success" value="inserir questao no formulario" onclick='+"'"+'inserirQuestao('+numero+'),limpando2()'+"'"+'>';
//botao que "insere"  a questao no formulario
}
};

function printRespostasPreview(numeroRespostas){/* responde a botao responder que faz com que as respostas apareçam ja que no questionario o aluno pode escolher responder
  determinada resposta ou não*/
var numero=parseInt(numeroRespostas);

var questao = montaObjeto(numero);

var respostas = document.querySelector("#respostas1");

var respostaCorreta = questao.procura_correta();

for(cont=1;cont<numero+1;cont++){
if(questao.status_resposta[cont] === "a"){
respostas.innerHTML = respostas.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+questao.resposta[cont]+'</a> </label>';
if((cont-1) === respostaCorreta){
respostas.innerHTML = respostas.innerHTML + '<a class="btn btn-success">Correta</a> ';
        }else{
          respostas.innerHTML = respostas.innerHTML + '<br>';}
      }}
respostas.innerHTML = respostas.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger" onclick='+"'"+'preview('+numero+')'+"'"+'>';//botao que limpa as respostas
};


function print_respostas(texto){//retorna quaantas respostas deseja-se adicionar

texto.innerHTML='<a class="btn btn-default">Quantas respostas deseja adicionar:</a><select id="quantidade"  name="quantidade" class="btn btn-default">'+
                                  '<option value="2">2</option>'+
                                  '<option value="3">3</option>'+
                                  '<option value="4">4</option>'+
                                  '</select>'+
                                  '<input type="button" value="confirmar" class="btn btn-default" onclick='+"'"+'quantrespo(document.getElementById("quantidade").value)'+"'"+'>';
};

function inserirQuestao(numeroRespotas){
  //console.log("variavel respostas");
//  console.log(respostas);
// a variavel respostas são quantas respostas foram respondidas ate o dado momento

  var numero = parseInt(numeroRespotas);
  var questao = montaObjeto(numero);

  var texto = document.querySelector("#impressao");
  texto.innerHTML = texto.innerHTML + '<div1 id="questao'+respostas+'"></div1>';
  divQuestao = document.querySelector("#questao"+respostas);
  console.log("a quantidade de perguntas no momento é de");
  console.log(respostas);
  var respoMomento = respostas;
  console.log("o slot onde a pergunta esta alocada é");
  console.log(respoMomento);
  numeroQuestao[respoMomento]=respostas;
  divQuestao.innerHTML = '<a class="btn btn-default">'+questao.pergunta+'</a>'+
              '<input type="button" value="responder" class="btn btn-info" onclick='+"'"+'botaoRespostaPreviewQuestionario("'+questao.numeroRespostas+'","'+respoMomento+'")'+"'"+'>'+
              '<br><div1 id="divRespostas'+respoMomento+'"></div1>'+'<br><br>';
              perguntas[respoMomento] = questao.perguntas;//grava a pergunta digitada no vetor global para ser passada posteriormente para o PHP
              statusPerguntas[respoMomento] = questao.Status; //grava o status escolhido da pergunta em um vetor para posteriormente ser passado para o PHP
              slotRespostas = respoMomento * 4;//como no maximo existem no maximo 4 respostas para cada pergunta
              var cont=0;//contador do for
              for(cont = 0;cont < questao.numeroRespostas;cont++){
                conteudoRespostas[slotRespostas]=questao.resposta[cont];//grava o conteudo do que foi digitado(das respostas) e esta no objeto no vetor global que será usado para passar os valores para o PHP
                  statusRespostas[slotRespostas]=questao.status_resposta[cont];//grava o status do que foi escolhido(das respostas) e esta no objeto no vetor global que será usado para passar os valores para o PHP
                if(questao.procura_correta=cont){//o retorno da questao.procura_correta é a resposta selecionada pelo usuário como correta sendo assim ao ser igual ao
                  respostasCorretas[slotRespostas]="c";
                }else{
                  respostasCorretas[slotRespostas]="e";//diz que a resposta é a alternativa errada baseando-se no objeto criado pelas opçoes da inserção
                }
                slotRespostas++;//controla onde será inserida a pergunta no vetor
              }
              quantidadeRespostasCadaPergunta[respostas]=questao.numeroRespostas;//armazena quatas respostas a pergunta tem para servir para o busca no php postiormente
//limpando as textareas
tinyMCE.get("conteudoPergunta").setContent("");

respostas++;
};

function botaoRespostaPreviewQuestionario(quantidadeRespostas,idpergunta_div){
  console.log("quantidade resposta quando entra na parseint");
  console.log(quantidadeRespostas);
  quantidaderesposta=parseInt(quantidadeRespostas);
  console.log("quantidade de resposta depois que passa pelo parseint");
  console.log(quantidaderesposta);
  console.log("esse é o id da pergunta");
  console.log(idpergunta_div);
var texto = document.querySelector("#divRespostas"+idpergunta_div);
var slotRespostas = idpergunta_div * 4;
var cont=0;
for(cont=0;cont<quantidaderesposta;cont++){
  //console.log(conteudoRespostas[slotRespostas]);
if(statusRespostas[slotRespostas]==="a"){
  texto.innerHTML= texto.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+conteudoRespostas[slotRespostas]+'</a> </label>';
  //adicionando as alternativas ara a resposta
}else{

}
  slotRespostas++;
}


texto.innerHTML = texto.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger" onclick='+"'"+'limpaRespostasPreview('+idpergunta_div+')'+"'"+'>';

}

function limpaRespostasPreview(idDivSeraLimpa){
var texto = document.querySelector("#divRespostas"+idDivSeraLimpa);
texto.innerHTML = "";//limpa a div que contem as respostas das perguntas específicas dessa pergunta

}


/*switch (numero) {//value

case 2:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = document.getElementById("conteudoResposta1").value = "",
               document.getElementById("conteudoResposta2").value = "";
    var num_resps=2;
break;
case 3:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = document.getElementById("conteudoResposta1").value = "";
         document.getElementById("conteudoResposta2").value = "";
         document.getElementById("conteudoResposta3").value = "";
break;
case 4:
//console.log("numeroRespostas");
//console.log(numeroRespostas);
var resposta = document.getElementById("conteudoResposta1").value= "";
         document.getElementById("conteudoResposta2").value= "";
         document.getElementById("conteudoResposta3").value= "";
         document.getElementById("conteudoResposta4").value= "";
   var numeroRespostas=4;
break;
default:
//console.log("não acessou nenhum dos cases anteriores");
break;
//tinyMCE.get("conteudo1").getContent()

//OBS:Esse conjunto de comandos limpa o conteudo das perguntas que estao aparecendo para o usuário porém é necessário para o usuário escolher quantas perguntas ele quer inserir na próxima pergunta

}*/
// nao zerou o slot de pergunta e so adicionaou uma pergunta de duas e
