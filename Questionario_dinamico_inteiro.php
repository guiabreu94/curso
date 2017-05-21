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
<TITLE>Índice de questionário de ensino de aprendizagem</TITLE>
</HEAD>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<BODY BGCOLOR=#ffffff>
<CENTER>
    <!--Cógigo javascript que da um alert caso o aluno n tenha respondido todas as questoes    -->
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
              <FORM ACTION="gravar.php" METHOD="post">
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
                    <!-- Pega o enunciado do questionario que está no banco e o colaca  -->  
                </DL>
               <?php  $questionarios = "select conteudo from questionario  where nome like '".$nome."' ";
               $questionario_cont= mysqli_query($con,$questionarios);
               $questionario = mysqli_fetch_array($questionario_cont);
               echo $questionario["conteudo"];
               ?>
                <OL>
                    <br>
                    <DIV class="conteiner">
                        
                  
                      <!-- Faz request ao banco e monta um questionario dinamico com as perguntas e as respostas contidas no banco   -->
                      <?php
                     
                      
                      $perguntas = "select p.conteudo from perguntas 
                                    as p inner join contem  on contem.ID_pergunta = p.ID_pergunta
                                    inner join questionario on questionario.ID_questionario = contem.ID_questionario
                                    where questionario.nome like '".$nome."' ";
                      
                      $repostas = "select r.conteudo from respostas
                                   as r inner join respondem on respondem.ID_resposta = r.ID_resposta
                                   inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta
                                   inner join contem on contem.ID_pergunta = perguntas.ID_pergunta
                                   inner join questionario on questionario.ID_questionario = contem.ID_questionario
                                   where questionario.nome ='".$nome."' "; 
                     // $result;
                      $perguntas_cont= mysqli_query($con,$perguntas);
                      $respostas_cont= mysqli_query($con,$repostas);
                     // $row = mysqli_fetch_array($result);
                      // echo var_dump($row);
                     /*while($row = mysqli_fetch_array($result)){
                         echo $row["Conteudo"];
                     }*/
                     $num_questao=1;
                      while($pergunta= mysqli_fetch_array($perguntas_cont)){
                      
                    echo  "<LI>"; echo $pergunta["conteudo"]; echo "<BR />";
                      echo "<INPUT TYPE=radio NAME=q".$num_questao." VALUE=-1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"]; echo "<BR>";
                    echo "<INPUT TYPE=radio NAME=q".$num_questao." VALUE=1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"];  echo "</LI><P>";
                    
                     $num_questao++;
                      }?>  
                      
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
          
            <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff><BLOCKQUOTE>
                
              </BLOCKQUOTE></TD>
          
        </TD>
    </TR>
  </TABLE>
</CENTER>
</BODY>
</HTML>
