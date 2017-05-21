var respostas=1;//ter quantas respostas que ja foram inseridas
var perguntas = new Array(110);//vai armazenar o conteudo todas as perguntas_cont
var conteudoRespostas = new Array(420);//vai armazenar o conteudo de todas as respostas
var statusRespostas = new Array(420);//vai armazenar os status de todas a perguntas
var statusPerguntas = new Array(110);//vai aramazenar o status das respostas
var tiposPergunta = new Array(110);//vai armazenar o tipo das perguntas
var slotRespostas=1;//inicializao o slot de perguntas
//variavel que marca qual slot esta sendo armazenados os dados das respostas
var respostasCorretas = new Array(110);//quarda quais são as respostas corretas para que posteriormente elas sejam passadas para o banco de dados
var numeroQuestao = new Array(110);
var quantidadeRespostasCadaPergunta = new Array(110); // como a quantidade de cada pergunta pode variar esse vetor grava o numero de respostas que cada pergunta tem
//var questionario{perguntas}  //objeto com todo o questionario

/* var questionario{QuantidadeRespostas : respostas,
                 ConteudoPerguntas : perguntas,
                 ConteudoRespostas : conteudoRespostas,
                 StatusPerguntas : statusPerguntas,
                 StatusRespostas : statusRespostas,
                 TipoPerguntas : tipoPerguntas};
esse objeto tem que ser montado ao final quando for ser feito o input para o envio pro PHP e entao para o MySQL
                 */


function voltar(){//função que sai da seleção dos tipos e volta para a seleção de quantos tipos o usuário deseja inserir
var texto = document.getElementById("tipos");//pega o valor do local onde serão impressos os tipos
texto.innerHTML='<a class="btn btn-info">Escolha quantos tipos a questao tem:</a>'+
'<select name="tipo" class="btn btn-default" id="tipo">'+
    '<option value="1">1 Tipo</option>'+
    '<option value="2">2 Tipos</option>'+
    '<option value="3">3 Tipos</option>'+
    '<option value="4">4 Tipos</option>'+
'</select>'+
'<input type="button" class="btn btn-success" value="Confirmar" onclick="aparecer()">';
};//printa um select com as opções

function aparecer(){//printa para o usuário os selects referentes aos tipos de acordo com quantos tipos ele decidiu inserir
var tipo=document.getElementById("tipo").value;//quantos tipos tem a pergunta
//console.log(tipo);
var cont;//contador
var texto = document.getElementById("tipos");/* Contem os select com os quais tipos o usuário pode inserir e os botoes de voltar
*  para quantos tipos o usuário quer inserir e  o botao  */
var html='<a class="btn btn-success">Tipos da resposta</a>"';//enunciado de identificação do select a seguir
// console.log("texto");
texto.innerHTML='';
//var numeroTipos; variavel sem recebimento de valor algum
for(cont=0;cont<tipo;cont++){//for para printar o numero de selects de acordo com o numero de tipos selecionados
html= html+'<select id="escolhido'+cont+'"  name="escolhido" class="btn btn-default">'+
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
html = html + '<input type="button" value="voltar" class="btn btn-danger" onclick='+"'"+'voltar()'+"'"+'>'+
'<input type="button" value="confirmar" id="enviarPergunta" onclick='+"'"+'conferindo('+tipo+')'+"'"+' class="btn btn-success"> ';
texto.innerHTML=html;
//printa o botao de voltar para retornar o passo do procedimento alem de um botao que irá ratificar a escolha da resposta
}

function conferindo(numeroTipos){
var conteudoPergunta = tinyMCE.get("conteudoPergunta").getContent();
if(conteudoPergunta === ""){//confirma se a pergunta foi de fato preenchida
alert("o conteudo da pergunta não foi preenchido");
//var conteudoResposta = tinyMCE.get("conteudoResposta");


}else{
  var campoHidden = document.querySelector("#tiposPergunta");//pega o compo onde serão passados os tipos
var texto = document.getElementById("tipos");//pega os tipos da pergunta
var cont;//contador
var todosTipos="";//variavel que ira juntar todos os tipos em um só.Separados por ponto para ser mais facil a pasagem no PHP
for(cont=0;cont<numeroTipos;cont++){// for que "junta" todos os tipos
todosTipos = todosTipos +document.querySelector("#escolhido"+cont).value;
todosTipos = todosTipos + ".";

}
texto.innerHTML='<a class="btn btn-default">'+todosTipos+'</a>'+'<input type="button" value="voltar" class="btn btn-danger" onclick='+"'"+'voltar()'+"'"+'>';//mostra para o usuário quais foram os tipos que ele escolheu possibilitando que ele troque caso necessário
campoHidden.value = todosTipos;//passa para o campo hidden que servira para a passagem do PHP
}

};

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
<input type="button" value="Remover colocação de respostas" class="btn btn-danger" onclick='+"'"+'limpando2()'+"'"+'>';/*botao de limpar as resposatas ja que no questionario
* o aluno pode escolher se vai ou não responder a pergunta */
};

function limpando2(){//fuinção que limpa as respostas caso o aluno não queira responder
var html=document.getElementById("respostas");
html.innerHTML='<input type="button" id="retorno" value="click para adicionar as respostas" class="btn btn-default" onclick='+"'"+'print_respostas(document.getElementById("respostas"))'+"'"+'>';
//retorna para o procedimento anterior que seria selecionar quantas se o usuário quer inserir respostas para a pergunta
var preview = document.querySelector("#preview");
//console.log(preview);
preview.textContent ="";//limpa a div que contem o preview da pergunta do usuário e de suas respostas
};

function montaObjeto(numeroRespostas){//monta um objeto questao que será usado por varias funções
switch (numeroRespostas) {//vai "recuperar" todas as respostas que o usuário quis inserir de acordo com o número de quantas foram requisitadas para a inserção

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
 tipos : document.querySelector("#tiposPergunta").value,//recebe o tipo da pergunta selecionado pelo usuário
 resposta : resposta, // vetor contendo o conteudo de todas as respostas
 status_resposta : status, //vetor contendo status de todas as respostas
 numeroRespostas : numeroRespostas, // numero de respostas a serem adicionadas
 correta : document.getElementsByName("correta"), //vetor que tem como informação qual é a resposta correta
resp_vazio :function vazio(){//checa pra ver se há alguma resposta vazia
var cont;//contador
for(cont=1;cont<this.numeroRespostas+1;cont++){//for para checar todas as repostas
if(this.resposta[cont]===""){
return 1;//booleano de retorno
}
}
return 0;},
procura_correta : function procura(){//procura a questao correta
var cont;//contador
for(cont=0;cont<this.numeroRespostas;cont++){
if(this.correta[cont].checked===true){
//var retorno ="a resposta "+ this.correta[cont].value+" esta correta";
return (cont);
cont=200;}}}
};

return questao;

};
function preview(num_respostas){//monta como a resposta ficaria apos ser adicionada no questionario
var numero = parseInt(num_respostas);//tranforma  em int para que possa ser usado no for
var questao = montaObjeto(numero);//monta o objeto que "pega"  as perguntas

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
  var respostas = document.querySelector("#respostas1");//pega o valor da div onde o preview das respostas estará posicionado
  if(respostas.textContent===""){//testa para ver se ja existe alguma resposta impressa
var numero=parseInt(numeroRespostas);//transforma a variavel em inteiro pra que seja utilizada no for

var questao = montaObjeto(numero);//monta o objeto

var respostaCorreta = questao.procura_correta();//verifica qual é a resposta correta

for(cont=1;cont<numero+1;cont++){//for para a impressão das respostas na div com id #resposta1 que representa o primeiro preview do usuário antes de inserir no questionario
if(questao.status_resposta[cont] === "a"){//checa pra ver se a questao esta ativa,pois não estando ela não irá aparecer
respostas.innerHTML = respostas.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+questao.resposta[cont]+'</a> </label>';
if((cont-1) === respostaCorreta){//printa um botao de correta ao lado da resposta que foi selecionada pelo usuário como correta
respostas.innerHTML = respostas.innerHTML + '<a class="btn btn-success">Correta</a> ';
        }else{
          respostas.innerHTML = respostas.innerHTML + '<br>';}
      }}
respostas.innerHTML = respostas.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger" onclick='+"'"+'preview('+numero+')'+"'"+'>';//botao que limpa as respostas
}else{//caso haja alguma resposta na div

  alert("As respostas referentes a esse botão pergunta ja estão exibidadas na página em seu devido lugar, sendo assim não é possível apertalo de novo");


}

};


function print_respostas(texto){//retorna quantas respostas deseja-se adicionar

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

  var numero = parseInt(numeroRespotas);//passando para int para garantir que seja passado um valor interira para ser usado no for
  var questao = montaObjeto(numero);//monta o objeto da questao

  var texto = document.querySelector("#impressao");//pega o conteudo com o id impressao
  texto.innerHTML = texto.innerHTML + '<div1 id="questao'+respostas+'"></div1>';//adiciona uma div onde serao postas as perguntas e as respostas
  divQuestao = document.querySelector("#questao"+respostas);//onde serão postas as respostas de cada questao inserida pelo usuário, quanto mais questoes mais divs
  //console.log("a quantidade de perguntas no momento é de");
//  console.log(respostas);
  var respoMomento = respostas;//respoMomento recebe qual o número da resposta que esta sendo inserida
//  console.log("o slot onde a pergunta esta alocada é");
//  console.log(respoMomento);
  numeroQuestao[respoMomento]=respostas;//passa qual é o numero da questao que posteriormente sera usada no PHP para a inserção no banco de dados
  if(questao.Status==="a"){//verifica se a questao esta ativa
  divQuestao.innerHTML = '<a class="btn btn-default">'+questao.pergunta+'</a>'+
              '<input type="button" value="responder" class="btn btn-info" onclick='+"'"+'botaoRespostaPreviewQuestionario('+questao.numeroRespostas+','+respoMomento+')'+"'"+'>'+
              '<br><div1 id="divRespostas'+respoMomento+'"></div1>'+'<br><br>';}//adiciona o enunciado da questao o botao responder(a partir do qual ao clicar serão impressas as respostas)
              perguntas[respoMomento] = questao.pergunta;//grava a pergunta digitada no vetor global para ser passada posteriormente para o PHP
              tiposPergunta[respoMomento]= questao.tipos;//recebe o tipo da pergunta vinda do objeto
            //  console.log("tipos da pergunta");
            //  console.log(tiposPergunta[respoMomento]);
              //console.log("perguntas[respoMomento]");
            //  console.log(perguntas[respoMomento]);
            //  console.log(questao.pergunta);
              statusPerguntas[respoMomento] = questao.Status;
              if(respoMomento===1){
              slotRespostas = respoMomento;
            }else{ //grava o status escolhido da pergunta em um vetor para posteriormente ser passado para o PHP
              slotRespostas = (respoMomento-1) * 5;}//como no maximo existem no maximo 4 respostas para cada pergunta
              var cont=0;//contador do for
            //  console.log("slotrespostas");
            //  console.log(slotRespostas);
            console.log("antes do for");

              for(cont = 1;cont < (questao.numeroRespostas)+1;cont++){//for que controla a gravação dos vetores que serão usados posteriormente no PHP
                conteudoRespostas[slotRespostas]=questao.resposta[cont];//grava o conteudo do que foi digitado(das respostas) e esta no objeto no vetor global que será usado para passar os valores para o PHP
                  statusRespostas[slotRespostas]=questao.status_resposta[cont];//grava o status do que foi escolhido(das respostas) e esta no objeto no vetor global que será usado para passar os valores para o PHP
                 console.log("slot");
                  console.log(slotRespostas);
                  console.log("conteudo da resposta");
                  console.log(conteudoRespostas[slotRespostas]);
                  //console.log("SLOT");
                  //console.log(slotRespostas);
                  console.log(questao.resposta[cont]);
                  console.log("status da resposta");
                  console.log(statusRespostas[slotRespostas]);
                  console.log(questao.status_resposta[cont]); //teste para checar a passagem das respostas corretamente
                if(questao.procura_correta=cont){//o retorno da questao.procura_correta é a resposta selecionada pelo usuário como correta sendo assim ao ser igual ao
                  respostasCorretas[slotRespostas]=slotRespostas;
                }else{
                  respostasCorretas[slotRespostas]="nenhuma resposta correta";//diz que a resposta é a alternativa errada baseando-se no objeto criado pelas opçoes da inserção
                }
                slotRespostas++;//controla onde será inserida a pergunta no vetor
              }

              quantidadeRespostasCadaPergunta[respostas]=questao.numeroRespostas;//armazena quatas respostas a pergunta tem para servir para o busca no php postiormente
//limpando as textareas
tinyMCE.get("conteudoPergunta").setContent("");//zera o conteudo da pergunta
document.querySelector("#tiposPergunta").value = "";//zera o valor do campo hidden que contem o tipo da pergunta que o usuário tinha inserido

respostas++;//adiciona mais um no numero de perguntas que o usuário esta inserindo para ser utilizado como maximo de vezes de check no PHP
voltar();
};

function botaoRespostaPreviewQuestionario(quantidadeRespostas,idpergunta_div){
  var texto = document.querySelector("#divRespostas"+idpergunta_div);
  if(texto.textContent===""){
 console.log("quantidade resposta quando entra na parseint");
 console.log(quantidadeRespostas);
  quantidaderesposta=parseInt(quantidadeRespostas);
  //console.log("alo");
console.log(quantidaderesposta);
 console.log("quantidade de resposta depois que passa pelo parseint");
 console.log(quantidaderesposta);
 console.log("esse é o id da pergunta");
 console.log(idpergunta_div);
 if(idpergunta_div===1){
var slotRespostas = idpergunta_div;
}else{
  var slotRespostas = ((idpergunta_div)-(1))*5;
  console.log("slotRespostas");
  console.log(slotRespostas);
}
/* como o máximo de respostas que podem ser inseridos são 4 tem-se em mente que caso tudo seja preenchido o slot de começo tem que ser 4 vezes
o numero do slot  */
var cont=0;//contador
for(cont=0;cont<quantidaderesposta;cont++){
  //console.log(conteudoRespostas[slotRespostas]);
if(statusRespostas[slotRespostas]==="a"){
  console.log("SLOT");
  console.log(slotRespostas);
  texto.innerHTML= texto.innerHTML + '<br><label> <input type="radio" name="q"><a class="btn btn-warning">'+conteudoRespostas[slotRespostas]+'</a> </label>';
  //adicionando as alternativas para a resposta
}else{

}
  slotRespostas++;//redireciona pro proximo slot de respostas(proxima pergunta)
}


texto.innerHTML = texto.innerHTML + '<br><input type="button" value="limpar" class="btn btn-danger" onclick='+"'"+'limpaRespostasPreview('+idpergunta_div+')'+"'"+'>';
//botao que permite ao usuário limpar as questoes printadas na tela

}else{

  alert("As respostas referentes a esse botão pergunta ja estão exibidadas na página em seu devido lugar, sendo assim não é possível apertalo de novo");
//printa na tela caso o usuário tenha apertado previamente sem apertar o botao de limpar, não deixando então que ele copie a resposta várias vezes na div abaixo da resposta
}

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
