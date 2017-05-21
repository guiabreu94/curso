<!doctype html>
<html lang="pt-BR">
<style>
           .img-divulgacao{
               float: left;
               width: 30%;
               margin-right: 10px
           }

           .evento{
               width: 100%;
               display: table;
               border-bottom: 1px solid #CCC;
               padding-bottom: 20px;
           }

           header,footer{
              background-color: #FFD700;
              text-align: center;
              color:#FFF;
              font-size: 40px;
              padding: 10px 0;
           }
           div1{
               text-align: center;
               background-color: #FFFFFF;

           }
           footer{
               background-color: #222;
               padding: 10px 0;
               margin-top: 20px;
               text-align: center;
           }
           .central{
               text-align: center;
               border : solid;
           }
           .esquerda{
               text-align: left;
               font-size: 15px;
           }

       </style>
       <?php
$userid=$_GET["userid"];
       ?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script type="text/javascript"
 src="jquery-3.1.1.js"></script>
</head>
    <meta charset="UTF-8">
    <title>Questionario de definição de ensino de aprendizagem ensino de aprendizagem</title>
</head>
<script>

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-97041911-1', 'auto');
ga('send', 'pageview');

</script>
<header>Universidade veiga de almeida</header>
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
</head>
<body>
<header>Universidade veiga de almeida</header>
<form  name="form1"  id="form1" action=""  method="post">

<h1 class="btn btn-default">Instruções do questionario</h1>
<br>
<a class="btn btn-default">Descrição das instruções</a>
<input type="hidden" value="" id="userid" name="userid">
<input type="hidden" value="Ensino de aprendizagem" name="questionario">
<input type="button" value="teste" id="teste" class="btn btn-info" >
<input type="submit" value="começar questionario" class="btn btn-info" onclick='passar_id()'>
</form>
<script>
function passar_id(){
var passagem=document.querySelector("#userid");
passagem.value=user_id;
}

$("#teste").click(function(){
  //console.log("alo");
  var passagem=document.querySelector("#userid");
  passagem.value=user_id;
  console.log(userid);
 $.post("verificacao_resposta.php",
        {userid:"'"+userid.value+"'"},//Recebe um retorno denominado confere
        function(confere){//Recebe um retorno denominado confere
          if(confere===1){
            //alert("alo1");
            console.log(userid.value);
            console.log(confere);
            console.log("alo1");
          }else{
            //alert("alo2");
            console.log(userid.value);
            console.log(confere);
            console.log("alo2");
          }

        }

   );


});
</script>
<footer><footer>
</body>
</html>
