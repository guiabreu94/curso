<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="style.css">
       <script src="js/jquery.min.js"></script>
       <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR' });</script>

    </head>
<style>
header,footer{
      background-color: #FFD700;
      text-align: center;
      color:#FFF;
      font-size: 40px;
      padding: 10px 0;
   }

   footer{
       background-color: #222;
       padding: 10px 0;
       margin-top: 20px;
       text-align: center;
   }
.esquerda{
       text-align: left;
       font-size: 15px;
   }
   a3{
       background-color: #FFD700;
      text-align: center;
      color:#FFF;
      font-size: 40px;
      padding: 10px 0;
   }

</style>

    <body>
        <div class="container">
            <h1>Cadastro de fotos</h1>

            <!--habilitar o form a enviar arquivo->  enctype="multipart/form-data"-->
            <form action="gravar_foto.php" method="post" enctype="multipart/form-data">

                <div class="form-horizontal">



                <label>
                    Foto:<br>
                    <input type="file" name="foto" class="form-control" required>
                </label>
                <br>


                <div class="btn btn-default">
                    <h1>Procura e escolha da perguntas</h1>
                    <a class="btn btn-info">Digite a pergunta</a>
                    <input type="text" class="btn btn-default" id="pergunta" placeholder="Pegunta que procura" >
                    <a class="btn btn-info">Digite a resposta</a>
                    <input type="text" class="btn btn-default"  id="resposta" placeholder="Resposta que procura">
                    <br><br>

                </div><br><input type="submit" value="Cadastrar" class="btn btn-success" onclick='algumId()'><br><br>

                <a href="index.php" class="btn btn-danger">Voltar para a pagina anterior</a>
            </form>

        </div>

<script src="foto.js"></script>
<br>
<div id="respostaEscolhida" class="btn btn-default">
</div>
<footer></footer>
<div id="print">

</div>
<footer></footer>
    </body>
</html>
