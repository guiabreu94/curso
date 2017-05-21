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


                      <!-- Faz request ao banco e monta um questionario dinamico com as perguntas e as respostas contidas no banco   -->
                      <?php


                      $perguntas = "select conteudo from perguntas";
                      $repostas = "select conteudo from respostas";
                     // $result;
                      $perguntas_cont= mysqli_query($con,$perguntas);
                      $respostas_cont= mysqli_query($con,$repostas);
                     // $row = mysqli_fetch_array($result);
                      // echo var_dump($row);
                     /*while($row = mysqli_fetch_array($result)){
                         echo $row["Conteudo"];
                     }*/
                     $cont=0;
                      while($pergunta= mysqli_fetch_array($perguntas_cont)){
                      $cont++;
                    echo  "<LI>"; echo $pergunta["conteudo"]; echo "<BR />";
                      echo "<INPUT TYPE=radio NAME=q".$cont." VALUE=-1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"]; echo "<BR>";
                    echo "<INPUT TYPE=radio NAME=q".$cont." VALUE=1>";
                     ($resposta=mysqli_fetch_array($respostas_cont)); echo $resposta["conteudo"];  echo "</LI><P>";
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
