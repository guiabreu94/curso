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
include_once 'conexao.php';
//Controle de session 
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<HTML>
<HEAD>
<TITLE>Índice de questionário de ensino de aprendizagem</TITLE>
</HEAD>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<BODY BGCOLOR=#ffffff>
<CENTER>
                       <script type="text/javascript" 
                      src="jquery-3.1.1.js"></script>
<script type="text/javascript">
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
}); 
    
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
              <FORM ACTION="gravar.php" METHOD="post">
                <B> Instruções </B>
                <P> Seu nome será impresso nas informações que lhe forem devolvidas.
                
                <DL>
                  <DT>  
                  <DD>
                      <?php/* echo $nome; */?>
                      
                </DL>
                Para cada uma das 44 perguntas abaixo, selecione uma das apções para indicar sua
                resposta. Só é possível escolher uma resposta para cada pergunta. Se ambas parecem se aplicar a
                você, escolha a que se aplica com mais freqüência. Quando terminar de selecionar
                as respostas para cada pergunta, selecione o botão Enviar no final do formulário.
                <OL>
                    <br>
                    <DIV class="conteiner">
                        
                  <LI>Eu entendo uma coisa melhor depois depois de:<BR />
                      <label>  <INPUT TYPE=radio NAME=q1 VALUE=-1>
                          Experimenta-la.</label><BR>
                          
               <label>     <INPUT TYPE=radio NAME=q1 VALUE=1>
                   Pensar sobre ela.</LI> </label><P>
                      
                  <LI>Eu prefiro ser considerado:<BR>
                 <label>   <INPUT TYPE=radio NAME=q2 VALUE=-1>
                     Realista.</LABEL><BR>
                     
                 <label>   <INPUT TYPE=radio NAME=q2 VALUE=1>
                     Inovador(a).</LI></label><P>
                      
                  <LI>Quando penso sobre o que fiz ontem, é mais provável que surjam:<BR>
                  <label>  <INPUT TYPE=radio NAME=q3 VALUE=-1>
                      Figuras. </LABEL><BR>
                      
                  <label>  <INPUT TYPE=radio NAME=q3 VALUE=1>
                      Palavras.</LI> </label><P>
                      
                  <LI>Eu tendo a:<BR>
                      <label>  <INPUT TYPE=radio NAME=q4 VALUE=-1>
                         Compreender os detalhes de um assunto, mas a
                         estrutura geral pode ficar imprecisa. </LABEL>
                         
                         <label> <INPUT TYPE=radio NAME=q4 VALUE=1>
                      Compreender a estrutura geral de um assunto,
                      mas os detalhes podem ficar imprecisos.</LI> </label><P>
                     
                          <label>  <LI>Quando estou aprendendo um assunto novo, algo que me ajuda é: <BR>
                                  <label>   <INPUT TYPE=radio NAME=q5 VALUE=-1>
                    Falar sobre ele. </label><BR>
                    
                    <LABEL> <INPUT TYPE=radio NAME=q5 VALUE=1>
                        Pensar sobre ele.</LI></label> <P>
                     
                  <LI>Se eu fosse um professor, eu preferiria ensinar uma disciplina:<BR>
                <label>    <INPUT TYPE=radio NAME=q6 VALUE=-1>
                    Que lidasse com fatos e situações reais.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q6 VALUE=1>
                      Que lidasse com ideias e teorias.</LI></label><P>
                      
                  <LI>Eu prefiro obter novas informações a partir de:<BR>
                   <label> <INPUT TYPE=radio NAME=q7 VALUE=-1>
                     Figuras, diagramas, gráficos ou mapas.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q7 VALUE=1>
                     Instruções escritas ou informações verbais.</LI></label><P>
                      
                      
                  <LI>Uma vez que eu entenda: <BR>
                  <label>  <INPUT TYPE=radio NAME=q8 VALUE=-1>
                     todas as partes, consigo entender o todo.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q8 VALUE=1>
                     o todo, consigo ver como as partes se encaixam.</LI></label><P>
                      
                  <LI>Em um grupo de estudo, trabalhando um assunto difícil, eu geralmente:<BR>
                   <label> <INPUT TYPE=radio NAME=q9 VALUE=-1>
                     Tomo a iniciativa e contribuo com ideias.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q9 VALUE=1>
                     Assumo uma posição discreta e escuto.</LI></label><P>
                      
                  <LI>Acho mais fácil:<BR>
                  <label>  <INPUT TYPE=radio NAME=q10 VALUE=-1>
                     Aprender fatos.</label><BR>
                <label>    <INPUT TYPE=radio NAME=q10 VALUE=1>
                      Aprender conceitos.</LI></label><P>
                      
                  <LI>Em um livro com várias figuras e desenhos, eu provavelmente:<BR>
                   <label> <INPUT TYPE=radio NAME=q11 VALUE=-1>
                     Observo as figuras e desenhos cuidadosamente.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q11 VALUE=1>
                     Concentro-me no texto escrito.</LI></label><P>
                      
                  <LI>Quando eu resolvo problemas de matemática eu:<BR>
                   <label> <INPUT TYPE=radio NAME=q12 VALUE=-1>
                     Geralmente trabalho uma etapa de cada vez para obter os resultados.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q12 VALUE=1>
                     Frequentemente percebo, sei as soluções, mas depois tenho que
                     me esforçar muito para compreender e descrever as etapas para chegar a essas soluções</LI></label><P>
                      
                  <LI>Nas disciplinas que cursei eu:<BR>
                   <label> <INPUT TYPE=radio NAME=q13 VALUE=-1>
                     Geralmente me aproximei de muitos dos colegas</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q13 VALUE=1>
                     Raramente me aproximei de muitos dos colegas.</LI></label><P>
                      
                  <LI>Em literatura de não ficção, eu prefiro:<BR>
                  <label>  <INPUT TYPE=radio NAME=q14 VALUE=-1>
                     Algo que me ensine fatos novos ou me mostre como fazer alguma coisa.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q14 VALUE=1>
                     Algo que me apresente novas ideias para pensar.</LI></label><P>
                      
                  <LI>Eu gosto de professores:<BR>
                  <label>  <INPUT TYPE=radio NAME=q15 VALUE=-1>
                     Que colocam um monte de diagramas no quadro.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q15 VALUE=1>
                     Que gastam bastante tempo explicando.</LI></label><P>
                      
                  <LI>Quando estou analisando uma história eu:<BR>
                   <label> <INPUT TYPE=radio NAME=q16 VALUE=-1>
                     Penso sobre os incidentes e tento colocá-los juntos para identificar os temas.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q16 VALUE=1>
                     Só identifico quais são os temas quando termino a leitura; então, tenho
                     que voltar à história e identificar os incidentes que demonstrem esses temas.
                  </LI></label><P>
                      
                  <LI>Quando começo a resolver um trabalho de casa, normalmente eu:<BR>
                   <label> <INPUT TYPE=radio NAME=q17 VALUE=-1>
                     Começo a trabalhar imediatamente buscando a sua solução.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q17 VALUE=1>
                     Primeiro tento compreender o problema como um todo.</LI></label><P>
                      
                  <LI>Quando estou estudando prefiro lidar com:<BR>
                <label>    <INPUT TYPE=radio NAME=q18 VALUE=-1>
                     Certezas, fatos concretos.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q18 VALUE=1>
                     Teorias, hipóteses, conceitos.</LI></label><P>
                      
                  <LI>Relembro melhor:<BR>
                  <label>  <INPUT TYPE=radio NAME=q19 VALUE=-1>
                     O que vejo. </label><BR>
                   <label> <INPUT TYPE=radio NAME=q19 VALUE=1>
                     O que ouço.</LI></label><P>
                      
                  <LI>É mais importante para mim que o professor:<BR>
                   <label> <INPUT TYPE=radio NAME=q20 VALUE=-1>
                     Apresente a matéria em etapas sequenciais claras.</label><BR>
                    <label><INPUT TYPE=radio NAME=q20 VALUE=1>
                     Apresente uma visão geral e relacione a matéria com outros assuntos.</LI></label><P>
                      
                  <LI>Eu prefiro estudar:<BR>
                 <label>   <INPUT TYPE=radio NAME=q21 VALUE=-1>
                     Em grupo.</LABEL><BR>
                   <label> <INPUT TYPE=radio NAME=q21 VALUE=1>
                     Sozinho(a).</LI></label><P>
                      
                  <LI>Eu costumo ser considerado(a):<BR>
                   <label> <INPUT TYPE=radio NAME=q22 VALUE=-1>
                     Cuidadoso(a) com os detalhes do meu trabalho.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q22 VALUE=1>
                     Criativo(a) na maneira de realizar meu trabalho.</LI></label><P>
                      
                  <LI>Quando busco orientação para chegar a um lugar desconhecido, eu prefiro:<BR>
                   <label> <INPUT TYPE=radio NAME=q23 VALUE=-1>
                     Um mapa.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q23 VALUE=1>
                     Instruções por escrito.</LI></label><P>
                      
                  <LI>Eu aprendo:<BR>
                   <label> <INPUT TYPE=radio NAME=q24 VALUE=-1>
                     Gradativamente, em um ritmo bastante regular. Se eu estudar bastante, “chego lá”.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q24 VALUE=1>
                     Indo e voltando, em saltos. Fico totalmente confuso(a) por algum tempo e,
                     então, repentinamente, tudo faz sentido, “num estalo”. </LI></label><P>
                      
                  <LI>Eu prefiro primeiro:<BR>
                  <label>  <INPUT TYPE=radio NAME=q25 VALUE=-1>
                     Experimentar, tentar fazer as coisas.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q25 VALUE=1>
                     Pensar sobre como é que eu vou fazer.</LI></label><P>
                      
                  <LI>Quando estou lendo por lazer, prefiro autores que:<BR>
                   <label> <INPUT TYPE=radio NAME=q26 VALUE=-1>
                     Explicitem claramente o que querem dizer.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q26 VALUE=1>
                     Digam as coisas de maneira criativa, interessante. </LI></label><P>
                      
                  <LI>Quando vejo um diagrama ou esquema em uma aula, relembro mais facilmente:<BR>
                  <label>  <INPUT TYPE=radio NAME=q27 VALUE=-1>
                     A figura.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q27 VALUE=1>
                     O que o professor disse a respeito dela.</LI></label><P>
                      
                      
                  <LI>Quando considero um conjunto de informações, provavelmente eu:<BR>
                   <label> <INPUT TYPE=radio NAME=q28 VALUE=-1>
                     Presto mais atenção aos detalhes e não percebo o quadro geral.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q28 VALUE=1>
                     Procuro compreender o quadro geral antes de atentar para os detalhes.</LI></label><P>
                      
                  <LI>Relembro mais facilmente:<BR>
                   <label> <INPUT TYPE=radio NAME=q29 VALUE=-1>
                     Algo que fiz.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q29 VALUE=1>
                     Algo sobre o que pensei, refleti bastante.</LI></label><P>
                      
                  <LI>Quando tenho alguma tarefa para executar, eu prefiro:<BR>
                   <label> <INPUT TYPE=radio NAME=q30 VALUE=-1>
                     Saber bem uma maneira de executar a tarefa.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q30 VALUE=1>
                     Desenvolver novas maneiras de executar a tarefa.</LI></label><P>
                      
                  <LI>Quando alguém está me mostrando dados, eu prefiro:<BR>
                   <label> <INPUT TYPE=radio NAME=q31 VALUE=-1>
                     Diagramas e gráficos.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q31 VALUE=1>
                     Texto resumindo os resultados.</LI></label><P>
                      
                  <LI>Quando escrevo um texto, um artigo, uma redação, eu prefiro trabalhar (pensar a respeito ou escrever):<BR>
                   <label> <INPUT TYPE=radio NAME=q32 VALUE=-1>
                     A parte inicial do texto e avançar linearmente do início para o fim.</label><BR>
                 <label>   <INPUT TYPE=radio NAME=q32 VALUE=1>
                     Diferentes partes do texto e ordená-las depois.</LI></label><P>
                      
                  <LI>Quando tenho que trabalhar em um projeto em grupo, eu prefiro que se faça:<BR>
                   <label> <INPUT TYPE=radio NAME=q33 VALUE=-1>
                     Um debate em grupo em que todos contribuam com ideias, um brainstorming* coletivo.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q33 VALUE=1>
                     Um brainstorming* individual, seguido de reunião do grupo para comparar ideias.</LI></label><P>
                      
                  <LI>Considero um elogio chamar alguém de:<BR>
                   <label> <INPUT TYPE=radio NAME=q34 VALUE=-1>
                     Sensato.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q34 VALUE=1>
                     Imaginativo.</LI></label><P>
                      
                  <LI>Quando conheço pessoas em uma situação informal, é mais provável que eu me lembre melhor:<BR>
                   <label> <INPUT TYPE=radio NAME=q35 VALUE=-1>
                     De sua aparência.</label><BR>
                    <label><INPUT TYPE=radio NAME=q35 VALUE=1>
                     Do que elas disseram sobre si mesmas.</LI></label><P>
                      
                  <LI>Quando estou aprendendo um assunto novo, eu prefiro:<BR>
                   <label> <INPUT TYPE=radio NAME=q36 VALUE=-1>
                     Concentrar-me no assunto, aprendendo o máximo possível sobre ele.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q36 VALUE=1>
                     Tentar estabelecer conexões entre o assunto e outros a ele relacionados.</LI></label><P>
                      
                  <LI>Geralmente sou considerado(a):<BR>
                   <label> <INPUT TYPE=radio NAME=q37 VALUE=-1>
                     Expansivo.</label><BR>
                    <label><INPUT TYPE=radio NAME=q37 VALUE=1>
                     Reservado(a).</LI></label><P>
    
                  <LI>Prefiro disciplinas que enfatizem:<BR>
                   <label> <INPUT TYPE=radio NAME=q38 VALUE=-1>
                     Material concreto (fatos, dados).</label><BR>
                   <label> <INPUT TYPE=radio NAME=q38 VALUE=1>
                      Material abstrato (conceitos, teorias).</LI></label><P>
 
                  <LI>Para entretenimento, eu prefiro:<BR>
                   <label> <INPUT TYPE=radio NAME=q39 VALUE=-1>
                     Assistir televisão.</label><BR>
                    <label><INPUT TYPE=radio NAME=q39 VALUE=1>
                     Ler um livro.</LI></label><P>

                  <LI>Alguns professores iniciam suas aulas com um resumo do que irão abordar.Tais resumos são:<BR>
                    <label><INPUT TYPE=radio NAME=q40 VALUE=-1>
                     De alguma maneira úteis para mim.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q40 VALUE=1>
                     Muito úteis para mim.</LI></label><P>

                  <LI>A ideia de fazer o trabalho de casa em grupo, com a mesma nota para todos do grupo:<BR>
                   <label> <INPUT TYPE=radio NAME=q41 VALUE=-1>
                     Sim, me agrada.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q41 VALUE=1>
                     Não me agrada.</LI></label><P>
 
                  <LI>Quando estou fazendo cálculos longos:<BR>
                    <label><INPUT TYPE=radio NAME=q42 VALUE=-1>
                     Costumo repetir todos os passos e conferir meu trabalho cuidadosamente.</label><BR>
                   <label> <INPUT TYPE=radio NAME=q42 VALUE=1>
                     Acho cansativo conferir o meu trabalho e tenho que me esforçar para fazê-lo.</LI></label><P>

                  <LI>Costumo relembrar, visualizar os lugares onde estive:<BR>
                    <label><INPUT TYPE=radio NAME=q43 VALUE=-1>
                     Com facilidade e bom detalhamento.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q43 VALUE=1>
                     Com dificuldade e sem muitos detalhes.</LI></label><P>
 
                  <LI>Quando estou resolvendo problemas em grupo, mais provavelmente eu:<BR>
                  <label>  <INPUT TYPE=radio NAME=q44 VALUE=-1>
                     Penso nas etapas do processo de solução.</label><BR>
                  <label>  <INPUT TYPE=radio NAME=q44 VALUE=1>
                     Penso nas possíveis consequências ou nas possíveis aplicações da solução para outras áreas.</LI></label><P>
                  </div>
                      
                </OL>
                Quando tiver preenchido o formulário acima, clique no botão Enviar abaixo. Seus resultados
                serão devolvidos a você.
                Se você não está satisfeito com suas respostas acima, clique em Redefinir para limpar o formulário.
                <DL>
                  <DT>
                  <DD>
                      <INPUT TYPE=submit VALUE=Enviar id="finaliza" class="btn btn-success">
                      <INPUT TYPE=reset VALUE=Redefinir class="btn btn-info">
                </DL>
              </FORM></TD>
          </TR>
          <TR>
            <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff><HR WIDTH=90%></TD>
          </TR>
          <TR>
            <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff><BLOCKQUOTE>
                
              </BLOCKQUOTE></TD>
          </TR>
        </TABLE></TD>
    </TR>
  </TABLE>
</CENTER>
</BODY>
</HTML>
