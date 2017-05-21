<?php 
/*
Chamada IP 



 $PostNomeAluno=$_POST["Canvas_nome"];
 $PostIDAluno=$_POST["Canvas_id_aluno"];
 $PostIDCurso=$_POST["Canvas_id_aluno"];
 $PostNomeCurso=$_POST["Canvas_NomeCurso"];
 
if $PostNomeAluno = null {
    
}
        
 */
include_once 'conexa_acento.php';
//Controle de session 

$nome=$_POST["questionario"];




?>





<HTML>
<HEAD>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<TITLE>Índice de questionário de ensino de aprendizagem</TITLE>
</HEAD>
  <style>
div1 {
    position: fixed;
    right:  0pt;
    
}
</style>
<div1  >
    <b class="btn btn-default">Número de respostas até o momento</b>
    <a class="btn btn-danger"  id='num_respostas'></a>
    </div1>

<BODY BGCOLOR=#ffffff>
    
    
<CENTER>
                       <script type="text/javascript" 
                      src="jquery-3.1.1.js"></script>
<?php /*<script type="text/javascript">
$(document).ready(function(){
  $('#finaliza').click(function() {
      var i;
      for(i=1;i<45;i++){
    if (! $("input[type='radio'][name='q"+i+"']").is(':checked') ){
      window.alert("A questão"+i+" não foi preenchida.Por favor, selecione uma alternativa.");
      return false; // para submit habilite esta linha
      i=50;
    }
    }
  });
}); */?>
    
</script>  
  <TABLE CELLPADDING=2 CELLSPACING=0 BORDER=0 BGCOLOR=#ffd700 WIDTH=95%>
    <TR>
      <TD ALIGN=center VALIGN=middle BGCOLOR=#ffd700 WIDTH=70% >
          <TR>
            <TD ALIGN=left VALIGN=middle BGCOLOR=#ffd700 ><FONT FACE="Helvetica" COLOR=#ffffff> <B>Uva</B> Universidade </FONT></TD>
          </TR>
          <TR>
            <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff>
              <H1> Questionário de ensino de aprendizagem</H1>
             
              <H3>Universidade Veiga de Almeida<BR>
              </H3></TD>
          </TR>
          <TR>
            <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff><HR WIDTH=90%></TD>
          </TR>
          <TR>
            <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff><BLOCKQUOTE>
              <FORM ACTION="correcao.php" METHOD="post">
                  
                <B> Instruções </B>
                <!-- Pega as instruções do questionario que estão no banco e as coloca -->
                <P> <?php  $instrucao = "select instrucao from questionario where nome ='".$nome."'" ;
               $instrucao_cont= mysqli_query($con,$instrucao);
               $instrucao = mysqli_fetch_array($instrucao_cont);
               echo $instrucao["instrucao"];
               ?>
                
                <DL>
                  <DT>  
                  <DD>
                      
                      <?php/* echo $nome; */?>
                      
                </DL>
                <!-- Pega o enunciado do questionario que está no banco e o colaca  -->  
               <?php  $questionarios = "select conteudo,Numero_questoes_necessarias from questionario  where nome like '".$nome."' ";
               $questionario_cont= mysqli_query($con,$questionarios);
               $questionario = mysqli_fetch_array($questionario_cont);
               echo $questionario["conteudo"];
               ?>
                <OL>
                    <br>
                    <DIV class="conteiner">
                        
                  
                      
                      <?php
                     
                      // Faz request ao banco e monta um questionario dinamico com as perguntas e as respostas contidas no banco
                      $perguntas = "select p.conteudo,p.ID_pergunta from perguntas 
                                    as p inner join contem  on contem.ID_pergunta = p.ID_pergunta
                                    inner join questionario on questionario.ID_questionario = contem.ID_questionario
                                    where questionario.nome like '".$nome."' ";
                      
                      /*$repostas = "select r.conteudo,r.ID_resposta from respostas
                                   as r inner join respondem on respondem.ID_resposta = r.ID_resposta
                                   inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta
                                   inner join contem on contem.ID_pergunta = perguntas.ID_pergunta
                                   inner join questionario on questionario.ID_questionario = contem.ID_questionario
                                   where questionario.nome ='".$nome."' "; */
                     // $result;
                      $perguntas_cont= mysqli_query($con,$perguntas);
                      //$respostas_cont= mysqli_query($con,$repostas);
                     // $row = mysqli_fetch_array($result);
                      // echo var_dump($row);
                     /*while($row = mysqli_fetch_array($result)){
                         echo $row["Conteudo"];
                     }*/
                     /*$num_questao=1;
                      while($pergunta= mysqli_fetch_array($perguntas_cont)){
                      
                    echo  "<LI>"; echo $pergunta["conteudo"]; echo "<BR />";
                      echo "<INPUT TYPE=radio NAME=q".$num_questao." VALUE=-1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"]; echo "<BR>";
                    echo "<INPUT TYPE=radio NAME=q".$num_questao." VALUE=1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"];  echo "</LI><P>";
                    
                     $num_questao++;
                      }?>*/   
                      $cont=0;
                       ?><script type="text/javascript">
               resposta=0;//variável global que controla quantas respostas foram respondidas
               check=0;
                 var questao = new Array(14);
                 var redefinir = new Array(70);/*controla o alert de se o aluno respondeu ou não a pergunta além de controlar
              *  o respoder e o limpar podendo aparecer o alert dizendo
              *   que o aluno ja respondeu a uma pergunta e não deixar o reset limpar*/
               var i;
               var j;
               for(i=0;i<15;i++){
                   questao[i]=0;
               }
               for(j=0;j<70;j++){
                   redefinir[j]=0;
               }
               </script>
                         
                      <div id="textDiv"></div>   

                </script
                <div id="questoes" >
                          <!--local da resposta do servidor-->
                         </div> 
                    
                   
                   
                   <?php
                      //Retorna quantas perguntas serão chamadas
                      $quantidade_perguntas= mysqli_num_rows($perguntas_cont);
                      //while que printa todas as perguntas do questionario em questao
                      while($pergunta= mysqli_fetch_array($perguntas_cont)){//Enquanto houverem perguntas a serem trazidas do banco tal comando continuará rodando
                          
                        echo  "<LI>"; echo $pergunta["conteudo"]; //Printa só o conteúdo da pergunta na tela do usuário
                        //numero da questao
                        $cont++;//identificador de cada pergunta para que seja possível que se identifique o input
                        $ID_pergunta;//id da pegunta no banco de dados ?>
          

                        <!-- Poe um botão que permite ao aluno dizer se quer ou não responder a questão -->
<?php echo '<input type="button" id="respostas'.$cont.'" value="responder" onclick=post'.$cont.'(),atualizar()> ' ?> 
                        <input type="button" value="Reset" onclick="limpar<?php echo $cont; ?>();"> 
                        
                                   <SCRIPT>
                                       function atualizar(){
            var div = document.getElementById("num_respostas");
            console.log("<a class=btn btn-danger> "+resposta+" </a>");
                div.innerHTML = resposta;}
            </script>

                        <script type="text/javascript">
                        function post<?php echo $cont; ?>(){//cont determina a qual o nome da fução que irá fazer referência ao input específico
                        var IDpergunta = <?php echo $pergunta["ID_pergunta"];?> ;//recebe o id da pergunta que será usada para buscar a reposta no banco
                        var num = <?php echo $cont; ?>;//recebe o número da questão
                        var slot=0;
                        console.log("O numero de questos respondidas é:");
                        console.log(resposta);
                        //Redefinir é uma variavel que contro o aperto do botao responder.Sendo assim, caso o usuário tenha apertado o botao ele n podera apertar denovo e adicionar mais um numero no contador
                        if(redefinir[num]===0){
                        //Testa para ver se o número de questoes reopndidas ja é igual ao que o questinario necessita, caso seja não deixa o usiário responder a não ser que ele concele uma resposta já respondida    
                        if(resposta<<?php echo $questionario["Numero_questoes_necessarias"]; ?> ){
                            for(slot=0;slot<15;slot++){
                                if(questao[slot]===0){
                                    //Armazena quais questoes foram abertas para serem respondidas para que posteriormente sejam checadas
                                    console.log("o slot testado é");
                                    console.log(slot);
                                    console.log("a questao é:");
                                    console.log(num);
                                    questao[slot]=num;
                                    slot=16;
                                }
                            }
                        resposta++;//Aumenta em um o número de respstas feitas
                        redefinir[num]=1;//diz que a questao foi respondida
                           $.post("busca12.php",
                         {nome:IDpergunta,questao:num},//Passa para o banco o ID da pergunta para que a resposta seja trasida do banco,além de passar o numero da questão para q seja pasada no input o número correto para que seha feito o nome correto
                         function(resposta){
                             $("#conteudo<?php echo $cont;?>").html(resposta);//Nomeia o conteudo, que será usado para printar as respostas.
                         }
                    );}else{
            alert("Voce ja respondeu o numero maximo de questoes");//Alerta q indica ao aluno que todas as questoes requisitadas por esse formulário ja foram respondidas
                    }
                        
                        }else{
                        alert("Voce ja precionou pra responder a esta pergunta");//Indica ao usuário que ele ja clicou no botão para responder a questão
                        }};
                        
                        </script>
                        <!-- botão que retira a questão caso o aluno não queira responder -->
                         <!--Essa função limpa a tela do usuário.Além disso ele retira 1 das questões respondidas.
                            o nome que ele recebe varia de acordo com a questão que ela se refere.-->
                        <script type="text/javascript">
                           
                            function limpar<?php echo $cont; ?>(){
                                 var num_questao = <?php echo $cont ?>;
                                 var slot=0;
                                 var lista=0;
                                if(redefinir[<?php echo $cont  ?>]===1){
                                    //redefenir é o array que contém o controle de ver se a questão está respondida ou não
                                for(slot=0;slot<15;slot++){
                                    //remove da lista a questao que o aluno não deseja responder mais
                                    if(questao[slot]===num_questao){
                                        questao[slot]=0;
                                        for(lista=slot+1;lista<15;lista++){
                                            if(questao[lista]!==0){
                                                questao[lista-1]=questao[lista];
                                                questao[lista]=0;                                  
                    }else{
                        slot=16;
                        lista=16;
                    }
                }
            }
        }
                                redefinir[<?php echo $cont; ?>]=0;
            resposta--;//tira uma resposta do máximo que pode ser respondido
            var div = document.getElementById("conteudo<?php echo $cont; ?>");
                div.innerHTML = "";//Limpa a tela do usuário(retira as respostas da tela)
             } }
                            </script>
                        <div id="conteudo<?php echo $cont; ?>" >
                          <!--local da resposta do servidor-->
                         </div> <?php
 
                        echo "<br>";  
                      } 
                      
                      ?>
                </OL>
                Quando tiver preenchido o questionário acima, clique no botão Enviar abaixo. Seus resultados
                serão devolvidos a você.
                Se você não está satisfeito com suas respostas acima, clique em Redefinir para limpar o formulário.
                <DL>
                  <DT>
           
                      
                      <script type="text/javascript">
                                function checar(){
                                    var k=0;
                                    if(resposta!==<?php echo $questionario["Numero_questoes_necessarias"]; ?>){
                                        alert("Voce não respodeu a quantidade de questões necessarias.");
                                        return false;
                                    }else{
                                   
                                        for(k=0;k<15;k+=1){
                                            console.log(questao[k]);
                                            //checa se todas as questoes q o aluno decidiu responder estão de fato marcadas
                                        if (! $("input[type='radio'][name='q"+questao[k]+"']").is(':checked') ){
                                        window.alert("A questão"+questao[k]+" não foi preenchida.Por favor, selecione uma alternativa.");
                                        return false; // para submit habilite esta linha
                                         k=16;
                                     }} }
                            alert("ola");
                            
                            return false;}
                            
                                        </script>
                  <DD>
                      <INPUT TYPE=submit VALUE=Enviar id="finaliza" class="btn btn-success" onclick="return checar()">
                      <INPUT TYPE=reset VALUE=Redefinir class="btn btn-info">
                </DL>
              </FORM></TD>
          </TR>
          <TR>
            <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff><HR WIDTH=90%></TD>
          </TR>
          
            <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff><BLOCKQUOTE>
                
              </BLOCKQUOTE></TD>
          
        </TD>
    </TR>
  </TABLE>
</CENTER>
</BODY>
</HTML>
