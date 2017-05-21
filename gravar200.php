
        <?php
        include_once 'conexa_acento_200.php';
        $ini=0;
$userid=$_POST["userid"];
//echo "alo".$userid;
       for($ini=1;$ini<45;$ini+=1){
           if(empty($_POST["q".$ini])==true){
               echo "q".$ini."não foi preenchido";
              header("Location:questionario.php");
           }
       }

        $Ati_Ref[11]=0;$Sen_int[11]=0;$Vis_ver[11]=0;$Seq_Glo[11]=0;
       //$id_aluno=$_POST["id"];
        $slot=0;
        for($c=1;$c<44;$c+=4)
        {
            //for para armazenar cada questão em um slot do vetor para que posteriormente sejam usadas para calcular o perfil do aluno
         $Ati_Ref[$slot]=$_POST["q".$c];
         $Sen_int[$slot]=$_POST["q".($c+1)];
         $Vis_ver[$slot]=$_POST["q".($c+2)];
         $Seq_Glo[$slot]=$_POST["q".($c+3)];
         $Ati_Ref[11]+=$Ati_Ref[$slot];
         $Sen_int[11]+=$Sen_int[$slot];
         $Vis_ver[11]+=$Vis_ver[$slot];
         $Seq_Glo[11]+=$Seq_Glo[$slot];
         $slot++;
        }
    $Ativo=0;$Reflexivo=0;$Sensorial=0;$Verval=0;$Intuitivo=0;$Visual=0;$Sequencial=0;$Global=0;


    /*Separa um vetor que contem um valor "duplo" em dois atributos por exemplo:
     * $Ati_Ref é o atributo que tem o valor para dizer se o aluno é ativo ou reflexivo, sendo assim,
     * è separado tal valor em duas variáveis sendo elas:
     * $Ativo e Reflexivo */
        if($Ati_Ref[11]<0)
        {
            $Ativo=($Ati_Ref[11]*(-1));
        }else
        {
            $Reflexivo=$Ati_Ref[11];
        }

        if($Sen_int[11]<0)
        {
            $Sensorial=($Sen_int[11]*(-1));
        }else
        {
            $Intuitivo=$Sen_int[11];
        }

        if($Vis_ver[11]<0)
        {
            $Visual=($Vis_ver[11]*(-1));
        }else
        {
            $Verval=$Vis_ver[11];
        }

        if($Seq_Glo[11]<0)
        {
            $Sequencial=($Seq_Glo[11]*(-1));
        }else
        {
            $Global=$Seq_Glo[11];
        }



        ?>

    <HTML>
      <script>
      var UserId = <?php $user_id ?>;

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-97041911-1', 'auto');
      //ga('require', 'linkid');
      ga('set', 'userId', UserId); // Defina o ID de usuário usando o user_id conectado.
      ga('send', 'pageview');
      </script>
 <HEAD>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <TITLE>
   Learning Styles Scales
  </TITLE>
 </HEAD>

 <BODY BGCOLOR=#ffffff>
  <CENTER>
   <TABLE CELLPADDING=2 CELLSPACING=0 BORDER=0 BGCOLOR=#ffd700 WIDTH=90%>
    <TR>
     <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff WIDTH=100%>
      <TABLE CELLPADDING=5 CELLSPACING=0 BORDER=0 BGCOLOR=#ffffff WIDTH=100%>
       <TR>
        <TD ALIGN=left VALIGN=middle BGCOLOR=#ffd700>
         <FONT FACE="Helvetica" COLOR=#ffffff>
	  <B>UVA</B> Universidade Veiga de Almeida
	 </FONT>
        </TD>
       </TR>
       <TR>
        <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff>
	 <P>
	 <H1>
	  Estilos de aprendizado, resultados.
	 </H1>
	</TD>
       </TR>
       <TR>
        <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff>
	 <HR WIDTH=90%>
	</TD>
       </TR>
       <TR>
        <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff>
	 <P>
	 <BLOCKQUOTE>

         <FONT SIZE=+1>
	  <PRE>
<div class="form-control-static">

    <p>  <b></b>  </p>

      <?php
    //  echo "Ati_Ref: ".$Ati_Ref[11]; echo " Sen_Int:".$Sen_int[11]; echo " Seq_Glo:".$Seq_Glo[11]; echo " Vis_Ver:".$Vis_ver[11];
      ?><br>
      <?php  /*echo "Ativo:".$Ativo; echo " Reflexivo:".$Reflexivo; echo " Sensorial:".$Sensorial; echo " Intuitivo:".$Intuitivo;
      echo " Visual:".$Visual; echo " Verbal:".$Verval; echo " Sequencial:".$Sequencial; echo " Global:".$Global;*/

      ?>

<!--  Monta vizualmente um "grafico" que indica ao aluno a qual "extremidade"(ativo ou reflexivo por exemplo) ele pertence -->
          <b>ATIVO</b>                                                          <b>REFLEXIVO</b>
<?php if($Ati_Ref[11]==-11){echo '<b class="btn btn-danger">';}?>               11  <?php if($Ati_Ref[11]==-11){echo'</b>';}?>
<?php if($Ati_Ref[11]==-9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Ati_Ref[11]==-9){echo'</b>';}?>
<?php if($Ati_Ref[11]==-7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Ati_Ref[11]==-7){echo'</b>';}?>
<?php if($Ati_Ref[11]==-5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Ati_Ref[11]==-5){echo'</b>';}?>
<?php if($Ati_Ref[11]==-3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Ati_Ref[11]==-3){echo'</b>';}?>
<?php if($Ati_Ref[11]==-1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Ati_Ref[11]==-1){echo'</b>';}?>
<?php if($Ati_Ref[11]==1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Ati_Ref[11]==1){echo'</b>';}?>
<?php if($Ati_Ref[11]==3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Ati_Ref[11]==3){echo'</b>';}?>
<?php if($Ati_Ref[11]==5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Ati_Ref[11]==5){echo'</b>';}?>
<?php if($Ati_Ref[11]==7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Ati_Ref[11]==7){echo'</b>';}?>
<?php if($Ati_Ref[11]==9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Ati_Ref[11]==9){echo'</b>';}?>
<?php if($Ati_Ref[11]==11){echo '<b class="btn btn-danger">';}?>  11<?php if($Ati_Ref[11]==11){echo'</b>';}?>
        <br>
      <b>SENSORIAL</b>                                                          <b>INTUITIVO</b>
         <?php if($Sen_int[11]==-11){echo '<b class="btn btn-danger">';}?>      11  <?php if($Sen_int[11]==-11){echo'</b>';}?>
<?php if($Sen_int[11]==-9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Sen_int[11]==-9){echo'</b>';}?>
<?php if($Sen_int[11]==-7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Sen_int[11]==-7){echo'</b>';}?>
<?php if($Sen_int[11]==-5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Sen_int[11]==-5){echo'</b>';}?>
<?php if($Sen_int[11]==-3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Sen_int[11]==-3){echo'</b>';}?>
<?php if($Sen_int[11]==-1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Sen_int[11]==-1){echo'</b>';}?>
<?php if($Sen_int[11]==1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Sen_int[11]==1){echo'</b>';}?>
<?php if($Sen_int[11]==3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Sen_int[11]==3){echo'</b>';}?>
<?php if($Sen_int[11]==5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Sen_int[11]==5){echo'</b>';}?>
<?php if($Sen_int[11]==7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Sen_int[11]==7){echo'</b>';}?>
<?php if($Sen_int[11]==9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Sen_int[11]==9){echo'</b>';}?>
<?php if($Sen_int[11]==11){echo '<b class="btn btn-danger">';}?>  11<?php if($Sen_int[11]==11){echo'</b>';}?>
 <br>
         <b>VISUAL</b>                                                          <b>VERBAL</b>
      <?php if($Vis_ver[11]==-11){echo '<b class="btn btn-danger">';}?>         11  <?php if($Vis_ver[11]==-11){echo'</b>';}?>
<?php if($Vis_ver[11]==-9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Vis_ver[11]==-9){echo'</b>';}?>
<?php if($Vis_ver[11]==-7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Vis_ver[11]==-7){echo'</b>';}?>
<?php if($Vis_ver[11]==-5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Vis_ver[11]==-5){echo'</b>';}?>
<?php if($Vis_ver[11]==-3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Vis_ver[11]==-3){echo'</b>';}?>
<?php if($Vis_ver[11]==-1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Vis_ver[11]==-1){echo'</b>';}?>
<?php if($Vis_ver[11]==1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Vis_ver[11]==1){echo'</b>';}?>
<?php if($Vis_ver[11]==3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Vis_ver[11]==3){echo'</b>';}?>
<?php if($Vis_ver[11]==5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Vis_ver[11]==5){echo'</b>';}?>
<?php if($Vis_ver[11]==7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Vis_ver[11]==7){echo'</b>';}?>
<?php if($Vis_ver[11]==9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Vis_ver[11]==9){echo'</b>';}?>
<?php if($Vis_ver[11]==11){echo '<b class="btn btn-danger">';}?>  11<?php if($Vis_ver[11]==11){echo'</b>';}?>
       <br>
     <b>SEQUENCIAL</b>                                                          <b>GLOBAL</b>
    <?php if($Seq_Glo[11]==-11){echo '<b class="btn btn-danger">';}?>           11  <?php if($Seq_Glo[11]==-11){echo'</b>';}?>
<?php if($Seq_Glo[11]==-9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Seq_Glo[11]==-9){echo'</b>';}?>
<?php if($Seq_Glo[11]==-7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Seq_Glo[11]==-7){echo'</b>';}?>
<?php if($Seq_Glo[11]==-5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Seq_Glo[11]==-5){echo'</b>';}?>
<?php if($Seq_Glo[11]==-3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Seq_Glo[11]==-3){echo'</b>';}?>
<?php if($Seq_Glo[11]==-1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Seq_Glo[11]==-1){echo'</b>';}?>
<?php if($Seq_Glo[11]==1){echo '<b class="btn btn-danger">';}?>  1  <?php if($Seq_Glo[11]==1){echo'</b>';}?>
<?php if($Seq_Glo[11]==3){echo '<b class="btn btn-danger">';}?>  3  <?php if($Seq_Glo[11]==3){echo'</b>';}?>
<?php if($Seq_Glo[11]==5){echo '<b class="btn btn-danger">';}?>  5  <?php if($Seq_Glo[11]==5){echo'</b>';}?>
<?php if($Seq_Glo[11]==7){echo '<b class="btn btn-danger">';}?>  7  <?php if($Seq_Glo[11]==7){echo'</b>';}?>
<?php if($Seq_Glo[11]==9){echo '<b class="btn btn-danger">';}?>  9  <?php if($Seq_Glo[11]==9){echo'</b>';}?>
<?php if($Seq_Glo[11]==11){echo '<b class="btn btn-danger">';}?>  11<?php if($Seq_Glo[11]==11){echo'</b>';}?>
 <br>

                            </DIV>

          </PRE>
         </FONT>

	 </BLOCKQUOTE>
	</TD>
       </TR>
       <TR>
        <TD ALIGN=center VALIGN=middle BGCOLOR=#ffffff>
	 <HR WIDTH=90%>
	</TD>
       </TR>
       <TR>
        <TD ALIGN=left VALIGN=middle BGCOLOR=#ffffff>
	 <BLOCKQUOTE>
	  <UL>
              <div class="form-control-static">
	   <p ><?php/* echo $nome*/ ?></p>
           <!-- Vai no banco e retorna qual a colclusão do questionario -->
            <?php  $questionarios = "select conclusao from questionario";
               $questionario_cont= mysqli_query($con,$questionarios);
               $questionario = mysqli_fetch_array($questionario_cont);
               echo $questionario["conclusao"];
               ?>
<br>
<p>Caso queira mais informações sobre os ensinos de aprendizagem: <a href="https://testilumno.test.instructure.com/courses/604/files/112615/download?wrap=1">Baixe o pdf</a> </p>

           </div>
	 </BLOCKQUOTE>
	</TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>
  </CENTER>
<?php
//  echo "Ati_Ref: ".$Ati_Ref[11]; echo " Sen_Int:".$Sen_int[11]; echo " Seq_Glo:".$Seq_Glo[11]; echo " Vis_Ver:".$Vis_ver[11];
$sql_perfil = "insert into questionario_estilo values(null,$userid,$Ati_Ref[11],$Sen_int[11],$Seq_Glo[11],$Vis_ver[11],null)";
mysqli_query($con,$sql_perfil);

 ?>
 </BODY>
</HTML>
