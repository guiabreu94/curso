
function aparecer(num,num_quest_nece){//função que faz o botao limpar aparecer somente quando o botão responder for apertado
                            
                            if(redefinir[num]===0){
                                if(resposta<num_quest_nece ){//n deixa q o botao seja printado mesmo q todas as respostas necessárias tenham cido respondidas
          var div = document.getElementById("limpar"+num);//nome do id do local onde será posto o botão limpar
            
                div.innerHTML = '<input type="button" value="limpar" class="btn btn-danger" onclick=limpar'+num+'(),atualizar()>';}}//printa o botao limpar em limpar especifico
            };//printa o botao limpar em limpar especifico
            
            
     
    
    /*function limpando2(){
     var html=document.getElementById("respostas");
     html.innerHTML='<input type="button" value="click para adicinar perguntas e respostas" class="btn btn-default" onclick='+"'"+'resposta()'+"'"+'>';
    };*/
    
    
 
  
    
    
    
    
    

