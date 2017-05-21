<?php
/*
Chamada IP



 $PostNomeAluno=$_POST["Canvas_nome"];
 $PostIDAluno=$_POST["Canvas_id_aluno"];
 $PostIDCurso=$_POST["Canvas_id_curso"];
 $PostNomeCurso=$_POST["Canvas_NomeCurso"];

if $PostNomeAluno = null {

}

 */
include_once 'conexa_acento.php';//conexão com o banco
//Controle de session

$nome="Ensino de aprendizagem";//nome identificador do questionário
$user=$_POST['user_id'];
$user = substr("$user", -3);//trasforma o id para fikar de acordo com user_id do canvas
echo $user;


?>





<HTML>
<HEAD>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<TITLE>Índice de questionário de <?php echo $nome;  ?></TITLE>
</HEAD>
<!-- Estilo que deixa presa a caixa de texto que indica ao aluno quantas questoes ele tem que responder e quantas sao necessário serem respondidas -->
  <style>
div1 {
    position: fixed;
    right:  0pt;

}
header,footer{
               background-color: #222;
               text-align: center;
               color:#FFF;
               font-size: 40px;
               padding: 20px 0;
            }

            footer{
                background-color: #ffd700;
                padding: 10px 0;
                margin-top: 20px;
                text-align: center;
            }

.box{

	border-style: solid;

	}

</style>
<div1  >
    <b class="btn btn-default">Número de respostas até o momento</b><!-- caixa de texto que identifica o que o número ao seu lado quer dizer -->
    <a class="btn btn-danger"  id='num_respostas'></a><!-- caixa de texto que contem quantas respotas o aluno ja requisitou para respoder as questoes -->
    </div1>

<BODY BGCOLOR=#ffffff>


<CENTER>
    <SCRIPT src="javascript_content.js"></script>
                       <script type="text/javascript"
                      src="jquery-3.1.1.js"></script>


</script>
  <TABLE CELLPADDING=2 CELLSPACING=0 BORDER=0 BGCOLOR=#ffd700 WIDTH=95%>
    <TR>
      <TD ALIGN=center VALIGN=middle BGCOLOR=#ffd700 WIDTH=70% ><TABLE CELLPADDING=5 CELLSPACING=0 BORDER=4 BGCOLOR=#ffd700  WIDTH=100%>
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
                      <?php

                      // Faz request ao banco e monta um questionario dinamico com as perguntas e as respostas contidas no banco
                      $perguntas = "select p.conteudo,p.ID_pergunta,p.status,p.foto from perguntas
                                    as p inner join contem  on contem.ID_pergunta = p.ID_pergunta
                                    inner join questionario on questionario.ID_questionario = contem.ID_questionario
                                    where questionario.nome like '".$nome."' ";


                     // $result;
                      $perguntas_cont= mysqli_query($con,$perguntas);//envia o comando mysql de perguntas e retorna a query com os resultados

                      $cont=0;
                       ?>
                   <?php $num_perguntas=$questionario["Numero_questoes_necessarias"];
                   //Cria uma variavel que armazena o numero de perguntas que tem que ser respondidas nesse questionario
                   ?>
                    <script type="text/javascript">
               resposta=0;//variável global que controla quantas respostas foram respondidas
                 var questao = new Array(<?php echo $num_perguntas  ?>);// array que guarda quais questoes foram respondidas para posteriormente serem recuperadas pelo php e enviados a banco de dados
               var i;//variavel usulizada para iniciar o vetor
               for(i=0;i<<?php echo $num_perguntas  ?>;i++){//for para iniciar o vetor
                   questao[i]=0;//inicialização do vetor
               }
               </script>

                   <?php
                      //Retorna quantas perguntas serão chamadas
                      $quantidade_perguntas= mysqli_num_rows($perguntas_cont)
                      //while que printa todas as perguntas do questionario em questao

                      ?>
                      <SCRIPT>
                      var redefinir = new Array(70);/*controla o alert de se o aluno respondeu ou não a pergunta além de controlar
              *  o respoder e o limpar podendo aparecer o alert dizendo
              *   que o aluno ja respondeu a uma pergunta e não deixar o reset limpar*/
                      var j;//variavel utilizada no for para inicialização do vetor
                      for(j=0;j<<?php echo $quantidade_perguntas ?>+1;j++){//for de inicialização do vetor
                   redefinir[j]=0;//inicializando o vetor
               }
                      </script>

                      <?php
                     ?> <?php
                      while($pergunta= mysqli_fetch_array($perguntas_cont)){//Enquanto houverem perguntas a serem trazidas do banco tal comando continuará rodando
                          ?><?php
                          $cont=$pergunta["ID_pergunta"];//identificador de cada pergunta para que seja possível que se identifique o input
                        $ID_pergunta;//id da pegunta no banco de dados
                          if($pergunta["status"] == "a"){//Se não estiver ativa a pergunta então ela assim como suas respostas e seus botoes não aparecerão

                       echo  "<LI>";  echo '<a class="btn btn-default">'.$pergunta["conteudo"].'</a>'; //Printa só o conteúdo da pergunta na tela do usuário
                        //numero da questao
    echo "&ensp;";
 echo '<input type="button" id="respostas'.$cont.'" class="btn btn-info" value="responder" onclick=aparecer('.$cont.','.$questionario["Numero_questoes_necessarias"].'),post'.$cont.'(),atualizar()> ' ; echo "<br><br>";
                          if($pergunta["foto"]!==""){echo "<br>";
      //echo $pergunta["foto"];
                        //Poe um botão que permite ao aluno dizer se quer ou não responder a questão

      echo '<img src=img/'.$pergunta["foto"].' class="img-rounded" alt="Cinque Terre" width="280" height="220">';

      echo "<br>";
  }
  ?> <h1 id="box">       </H1>
                      <?php
 //echo '<input type="button" value="limpar" onclick=limpar'.$cont.'(),atualizar()> '
                        ?>

                       <SCRIPT>
                        function aparecer(num,num_quest_nece){//função que faz o botao limpar aparecer somente quando o botão responder for apertado

                            if(redefinir[num]===0){//testa pra ver se a questao ja foi respondida
                                if(resposta<num_quest_nece ){//n deixa q o botao seja printado mesmo q todas as respostas necessárias tenham cido respondidas
          var div = document.getElementById("limpar"+num);//nome do id do local onde será posto o botão limpar

                div.innerHTML = '<input type="button" value="limpar" class="btn btn-danger" onclick=limpar'+num+'(),atualizar()>';}}//printa o botao limpar em limpar especifico
            };//printa o botao limpar em limpar especifico

                        </script>


                        <script type="text/javascript">
                        function post<?php echo $cont; ?>(){//cont determina a qual o nome da função que irá fazer referência ao input específico
                        var IDpergunta = <?php echo $pergunta["ID_pergunta"];?> ;//recebe o id da pergunta que será usada para buscar a reposta no banco
                        var num = <?php echo $cont; ?>;//recebe o número da questão
                        var slot=0;//marco o ponto de partida do for
                        //console.log("O numero de questos respondidas é:");
                      //  console.log(resposta);
                        //Redefinir é uma variavel que contro o aperto do botao responder.Sendo assim, caso o usuário tenha apertado o botao ele n podera apertar denovo e adicionar mais um numero no contador
                        if(redefinir[num]===0){//indica se a questão não foi respondida
                        //Testa para ver se o número de questoes reopndidas ja é igual ao que o questinario necessita, caso seja não deixa o usiário responder a não ser que ele concele uma resposta já respondida
                        if(resposta<<?php echo $questionario["Numero_questoes_necessarias"]; ?> ){
                            for(slot=0;slot<<?php echo $num_perguntas  ?>;slot++){
                                if(questao[slot]===0){
                                    //Armazena quais questoes foram abertas para serem respondidas para que posteriormente sejam checadas
                                    //console.log("o slot testado é");
                                  //  console.log(slot);
                                    //console.log("a questao é:");
                                    //console.log(num);
                                    questao[slot]=num;
                                    slot=<?php echo $num_perguntas  ?>;//faz com que o for pare caso entre no if
                                }
                            }
                        resposta++;//Aumenta em um o número de respostas feitas
                        redefinir[num]=1;//diz que a questao foi respondida
                           $.post("busca_com_foto.php",
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

                            function limpar<?php echo $cont; ?>(){//fução que limpa tanto as respostas,caso o usuário não queira mais respondelas, quanto o próprio botão de limpar(já que não há necessidade do usuário apertar o botão limpar sem que nenhuma resposta esteja esibida em sua tela).
                                 var num_questao = <?php echo $cont ?>; //numero da questao que esta sendo apagada
                                 var slot=0;//variavel que controla o slot do vetor para fazer a checagem para armazenar

                                if(redefinir[<?php echo $cont  ?>]===1){
                                    //redefenir é o array que contém o controle de ver se a questão está respondida ou não
                                for(slot=0;slot<<?php echo $num_perguntas  ?>;slot++){
                                    //remove da lista a questao que o aluno não deseja responder mais
                                    if(questao[slot]===num_questao){//procura a questao no vetor para entao tira-la das questoes respondidas
                                        questao[slot]=0;//zera o slot no qual a questao estava armazenada
            }
        }
                                redefinir[<?php echo $cont; ?>]=0;
            resposta--;//tira uma resposta do máximo que pode ser respondido
            var div = document.getElementById("conteudo<?php echo $cont; ?>");//pega a div com o in conteudo+cont na qual cont represente a qual questao que o usuário esta limpando
                div.innerHTML = "";//Limpa a tela do usuário(retira as respostas da tela)
                var div = document.getElementById("limpar<?php echo $cont;  ?>");//pega a div q representa o limpa+cont que é somente o o input type button limpar esta
                div.innerHTML = "";//tira o button de limpar da tela do usuário
             } }
                            </script>
                                                  <SCRIPT>
                                       function atualizar(){//é a função q atualiza o butão que atualiza o cursor de quetões ja respondidas até o momento
                                           var total= <?php echo $num_perguntas  ?>;//Recebe o numero de perguntas que o questionario selecionado
            var div = document.getElementById("num_respostas");//seleciona a div que representa o html que fica fixo na tela mostrando pro usuário o numero de questoes que ele ja respondeu
            //console.log("<a class=btn btn-danger> "+resposta+" </a>");
                div.innerHTML = resposta+"/"+total;}//mostra quantas perguntas ja foram respondidas pelo usuário
            </script>

            <div id="conteudo<?php echo $cont; ?>"  >
                          <!--local da resposta do servidor-->
                         </div> <?php

                        echo "<br>";
                        //div onde será posto o botão de limpar as respostas
                        ?>  <div id="limpar<?php echo $cont; ?>"> </div>
                      <?php echo "<br>";
                          } }

                          ?>
                </OL>
                Quando tiver preenchido o questionário acima, clique no botão Enviar abaixo. Seus resultados
                serão devolvidos a você.
                Se você não está satisfeito com suas respostas acima, clique em Redefinir para limpar as questoes repondidas.
                <DL>
                  <DT>


                      <script type="text/javascript">
                          /* função que checa se os prerequisitos do questionário foram atendidos:
                           * -O número de questoes requisitadas pelo questinário foram escolhidas para serem repondidas
                           * -Que todas as questoes escolhidas para serem respondidas foram de fato respondidas
                           * -Além disso gera um input do tipo hidden que irá fornece quais foram as questões que o aluno decidiu responder  */
                                function checar(){
                                    var k=0;//variavel do for que "varre" os slots do vetor procurando se  há alguma questão que foi requisitada pelo aluno mas não foi repondida
                                    var l;//variável que varre o vetor jogando pro vetor quais questoes foram respondidas
                                    var questoes_respondidas=0;//variavel que guardará as questoes respondidas passando-as posteriormente para o input type hidden
                                    if(resposta!==<?php echo $questionario["Numero_questoes_necessarias"]; ?>){
                                        alert("Voce não respodeu a quantidade de questões necessarias.");//da um alert de que o aluno não respondeu as questoes requisitadas pelo formulario
                                        return false;
                                    }else{

                                        for(k=0;k<<?php echo $num_perguntas  ?>;k+=1){//verifica qual questao não foi respondida
                                            //console.log(questao[k]);
                                            //checa se todas as questoes q o aluno decidiu responder estão de fato marcadas
                                        if (! $("input[type='radio'][name='q"+questao[k]+"']").is(':checked') ){//ve se cada radio esta checked(se tem alguma das alternativas marcadas)
                                        window.alert("A questão"+questao[k]+" não foi preenchida.Por favor, selecione uma alternativa.");//da um alerta mosrando pro usuário qual questão que ele deixou de responder
                                        return false; // para submit habilite esta linha
                                         k=<?php echo $num_perguntas  ?>;//faz com que se o for entre nesse if ao terminar sua execução ele saia do for
                                     }} }
                                     for(l=0;l<<?php echo $num_perguntas  ?>;l++){//for que irá jogar o vetor questao(que contém quais questoes foram respondidas) para a variável num_perguntas que passará para o input hidden que passa tais questoes para o php
                                     questoes_respondidas+= questao[l]+ ".";//adiciona a questão respondida com um ponto(.),usado como delimitador para ser usado no php com a função explode
                                     }
                            var passagem = document.getElementById("passagem");//vai na div com o id passagem e pega seu conteúdo onde será impresso o camp hidden que passaram para o php e por conseguinte para o banco quais questoes que o aluno respondeu
                                 passagem.innerHTML ='<input type="hidden" name="questoes" value="'+questoes_respondidas+'">';//campo hidden que faz a passagem das questoes respondidas para o php

                            };

                                        </script>

                                        <div2 id="passagem"><!-- div que será impresso o campo hidden de passagem de quais questoes do questionário foram respondidas -->
                                            </div2>

                  <DD>
                       <input type="hidden" value="<?php echo $user ?>" name="user_id" id="user">
                   <!--   <INPUT type=button value=confirmar class="btn btn-primary" onclick="return checar()"> -->
                     <INPUT TYPE=submit VALUE=Enviar id="finaliza" class="btn btn-success" onclick="return checar()"> <!-- botao que envia as respostas para o banco  -->
                      <INPUT TYPE=reset VALUE=Redefinir class="btn btn-info"> <!-- botao que tira as respostas de todas as questoes respondidas do aluno  -->
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
<footer>
    <h1>UVA</h1>
  </footer>
</BODY>
</HTML>
