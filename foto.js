

/* ao digitar será buscado la no banco as perguntas com as palavras digitadas*/
                    $("#pergunta").keyup(function(){

                        var vnome = document.getElementById("pergunta").value;

                        $.post("funcoesFoto/relacao_resp.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#print").html(resposta);
                        });
                    });

/* ao digitar será buscado la no banco as perguntas com as palavras digitadas*/
                 $("#resposta").keyup(function(){
                        var vnome = document.getElementById("resposta").value;
                        $.post("funcoesFoto/relacao_perg.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#print").html(resposta);
                        });
                    });

                    function passgem_id(id,conteudo){
                    }

function passagem_id_2(id,conteudo,tipo){
  console.log("entrou na função");
  texto = document.querySelector("#respostaEscolhida");
  if(tipo==="p"){
    texto.innerHTML='<a class="btn btn-default">O conteudo da pergunta selecionada foi:</a>  <a class="btn btn-danger">'+conteudo+'</a>'+
    '<input type="hidden" id="id" value="'+id+'"' + '<input type="hidden" id="tipo" value"p">';
  }else{

    texto.innerHTML='<a class="btn btn-default">O conteudo da resposta selecionada foi:</a>  <a class="btn btn-danger">'+conteudo+'</a>' +
    '<input type="hidden" name="id" id="id" value="'+id+'"' + '<input type="hidden" name="tipo" value"r">';
  }


}
function algunId(){
checando = document.querySelector("#id");
alert("alo");
if(id===NULL){
alert("não foi possível fazer o envio pois não foi selecionada nenhuma pergunta ou resposta");
}
}
