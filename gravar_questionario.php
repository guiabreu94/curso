<?php

$decisao = $_POST["insert"];
$nome=$_POST["nome"];
$conteudo = $_POST["conteudo"];
$conclusao = $_POST["conclusao"];
$instrucao = $_POST["instrucao"];
//$pagina = $_POST["pagina"];
$status = $_POST["status"];
$numero_questoes_necessarias = $_POST["num"];
$SIS_idcurso = $_POST["curso"];

if($decisao==2){

$cont;
//echo "nome:<br>";
//echo $nome."<br>";

//echo "conteudo:<br>";
//echo $conteudo."<br>";

//echo "conclusao:<br>";
//echo $conclusao."<br>";

//echo "instrução:<br>";
//echo $instrucao."<br>";

//echo "pagina:<br>";
//echo $pagina."<br>";

//echo "status:<br>";
//echo $status."<br>";

//echo "numero de questoes necessárias:<br>";
//echo $numero_questoes_necessarias."<br>";

/*include_once 'conexa_acento.php';

$sql1 ='select ID_questionario from  questionario ';
$result = mysqli_query($con, $sql1);

$armazem = [$ids];
$cont=0;
echo "<br>";

while($ids_questionarios=mysqli_fetch_array($result)){
    $armazem[$cont]=$ids_questionarios["ID_questionario"];
    echo $armazem[$cont];
    $cont++;
}*/

}else{
?>
<HTML>
<HEAD>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
      <script src="js/jquery.min.js"></script>
      <script src="tinymce/js/tinymce/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'textarea', language:'pt_BR', max_height: 400,resize: 'both' });</script>
      <meta charset="UTF-8">
      <script src=inserindoQuestionario28.js></script>


<TITLE>Índice de questionário de <?php echo $nome;  ?></TITLE>
</HEAD>
<!-- Estilo que deixa presa a caixa de texto que indica ao aluno quantas questoes ele tem que responder e quantas sao necessário serem respondidas -->
  <style>
div4 {
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



<div4  >
    <b class="btn btn-default">Número de respostas até o momento</b><!-- caixa de texto que identifica o que o número ao seu lado quer dizer -->
    <a class="btn btn-danger"  id='num_respostas'></a><!-- caixa de texto que contem quantas respotas o aluno ja requisitou para respoder as questoes -->
  </div4>
  <input type="hidden" value="nenhum tipo selecionado" id="tiposPergunta">

  <body>
      <br>
      <form action="gravar_perguntas.php"  method="post">
      <div class="btn btn-default">

          <div1>
              <h1>Conteudo da pergunta</h1>
          <textarea name="conteudo"  class="form-control"   id="conteudoPergunta" ></textarea>
          <!-- text onde o conteudo da pergunta será inserido -->

           <a class="btn btn-info">Escolha  qual status deseja inserir:</a>
          <select name="status" class="btn btn-default" id="status" >
              <option value="a">ativo</option>
              <option value="i">inativo</option>
                              </select>
           <div2 id="tipos">
              <a class="btn btn-info">Escolha quantos tipos a questao tem:</a>
              <select name="tipo" class="btn btn-default" id="tipo">
                  <option value="1">1 Tipo</option>
                  <option value="2">2 Tipos</option>
                  <option value="3">3 Tipos</option>
                  <option value="4">4 Tipos</option>
              </select>
              <input type="button" class="btn btn-success" value="Selecionar" onclick="aparecer()">

              </div2>
<div id="passagemId"></div>
           <br><br><br>

           <div  id="respostas">
               <input type="button" id="retorno" value="click para adicinar as respostas" class="btn btn-default" onclick='print_respostas(document.getElementById("respostas"))'>
           </div>
      </form>
          </div>
          <br>
          <a href="pesquisar.php" class="btn btn-danger">Voltar para a pagina anterior</a>
      </div>

      <div id="preview"></div>

      <?php
      // put your code here
      ?>
  </body>

<br><br>


<BODY BGCOLOR=#ffffff>


<CENTER>
    <!--  <SCRIPT src="javascript_content.js"></script> -->
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
              <H1> <?php echo $nome ?></H1>

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
                <p><?php echo $instrucao ?></p>

                <DL>
                      <?php/* echo $nome; */?>

                </DL>

                <?php echo $conteudo; ?>
                <OL>
                    <br>
                    <div id="impressao">
                    </div>

                <DD>
                 <!--   <INPUT type=button value=confirmar class="btn btn-primary" onclick="return checar()"> -->
                   <INPUT TYPE=button VALUE=verificar id="finaliza" class="btn btn-success" onclick='check()'> <!-- botao que envia as respostas para o banco  -->
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
<script>

function check(){
var i;
var j;
if (respostas>1){
for(i=1;i<respostas;i++){
  console.log()
  console.log("conteudo da pergunta");
console.log(perguntas[i]);
console.log("status da pergunta");
console.log(statusPerguntas[i]);
console.log("tipos da pergunta");
console.log(tiposPergunta[i]);
console.log("numero da pergunta");
console.log(numeroQuestao[i]);
console.log("quantidade de respostas da pergunta");
console.log(quantidadeRespostasCadaPergunta[i]);
console.log("conteuda das respostas");
//console.log("result");
//console.log(conteudoRespostas[1]);
if(numeroQuestao[i]===1){
  for(j=1;j<=quantidadeRespostasCadaPergunta[i];j++){
    console.log("Respostas de numero: "+j);
    console.log("conteudo da resposta");
    console.log(conteudoRespostas[((numeroQuestao[i]-1)*5)+j]);
    console.log("status da resposta");
    console.log(statusRespostas[((numeroQuestao[i]-1)*5)+j]);
}
}else{
for(j=0;j<quantidadeRespostasCadaPergunta[i];j++){

  console.log("Respostas de numero: "+j);
  console.log(conteudoRespostas[((numeroQuestao[i]-1)*5)+j]);
}}

}
console.log("a resposta correta é");//problema em verificar qual é a resposta correta
console.log(respostasCorretas[i]);




}else{
  console.log("nenhuma pergunta foi inserida");
}
}

</script>
                </HTML>
<?php
}


?>
