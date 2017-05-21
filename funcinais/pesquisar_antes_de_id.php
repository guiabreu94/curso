<?php

$nome=$_POST["questionario"];


?>
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
<html>
    <header>
        Universidade veiga de Almeida
    </header>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.min.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="busca/busca.js"></script>
        <script>tinymce.init({ selector:'textarea', language:'pt_BR' });</script>
        <script src="busca/busca.js"></script>
        <title></title>
    </head>
    <body>
        <form action="">
            <br>
               <div class="btn btn-default">
                <h2>Pesquisa perguntas e respostas</h2>
                <a class="btn btn-default">Digite o conteudo da pergunta</a> <input type="text" id="pergu" class="btn btn-default" >
                <a class="btn btn-default">Digite o conteudo da resposta</a> <input type="text" id="respo"  class="btn btn-default" >


            </div>
            <script>

                    $("#respo").keyup(function(){

                        var vnome = document.getElementById("respo").value;

                        $.post("busca/relacao_resp.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#conteudo").html(resposta);
                        });
                    });

                 $("#pergu").keyup(function(){

                        var vnome = document.getElementById("pergu").value;

                        $.post("busca/relacao_perg.php",
                        {conteudo:vnome},
                        function(resposta){
                            $("#conteudo").html(resposta);
                        });

                    });
                </script>
            <br><br>
            <div1  >
                 <div class="btn btn-default">
                     <h1>Pesquisas de perguntas</h1>
                     <br>
                <a class="btn btn-default">Selecione o que deseja mudar da pergunta </a>
                <select name="escolha" id="escolha" class="btn btn-default" onclick='checagem(document.getElementById("escolha").value,document.getElementById("texto"))'>
                    <option value="esc">Escolha</option>
                    <option value="Conteudo">Conteudo</option>
                    <option value="Status">Status</option>
                    <option value="Tipo">Tipo</option>
                </select>
              <!--  <input type="text" name="procurap" id="procurap" placeholder="Digite a pergunta"> -->

                <input type="button" name="busca_perguntas" class="btn btn-success"  value="Veja todas as perguntas" onclick='buscaperguntas()' ><br>
                 <h3 id="texto" class="esquerda"  > </h3>

            </div>

        </form>

        <br><br>

        <div class="btn btn-default">
            <h2>Pesquisa de respostas</h2>
                <a class="btn btn-default">Didite o conteudo da resposta que deseja modificar</a>
                <select name="escolha" id="escolher" class="btn btn-default" onclick='checando(document.getElementById("escolher").value,document.getElementById("text"))'>
                    <option value="esc">Escolha</option>
                    <option value="Conteudo">Conteudo</option>
                    <option value="status">Status</option>
                    <option value="Correta">Correta</option>
                </select>


                <input type="button" name="busca_respostas" class="btn btn-success" value="Veja todas as respostas" onclick='buscarespostas()' >
                <br>   <h5 id="text" class="esquerda" > </h5>
                </div>
            </div1>
            <br>
            <a href="requerimentos_curriculo.php" class="btn btn-danger">Voltar para a pagina anterior</a>

            <br><br>
            <footer></footer>
        <div id="conteudo">

            <script>



               function editar_perguntas(id,tipo){
                  // console.log("esse é o id:"); 
                //   console.log(id);
                //   console.log("esse é o tipo:");
                //   console.log(tipo);
               var texto;
                    if (tipo===1){
                      //  console.log(document.getElementById(id+"c"));
                        texto = '<textarea name="conteudo" rows="4" cols="50" id="p'+id+'_Conteudo"> </textarea> <input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Conteudo")'+"'"+' > ';
                        document.getElementById(id+"c").innerHTML=texto;
                       // $("#id").html(texto);

                    }else if(tipo === 2){
                      //  console.log(document.getElementById(id+"s"));
                        texto = '<select name="Status" id="p'+id+'_Status" >\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select> \n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Status")'+"'"+' >';
                        document.getElementById(id+"s").innerHTML=texto;


                    }else if(tipo === 3){
                      //  console.log(document.getElementById(id+"t"));

                        texto = '<select id="quantidade"  name="ssd" >\n\
                                                  <option value="1">1 Tipo</option>\n\
                                                  <option value="2">2 Tipos</option>\n\
                                                  <option value="3">3 Tipos</option>\n\
                                                  <option value="4">4 Tipos</option>\n\
                                                  </select>\n\
<input type="button" class="btn btn-info" id="boto" value="Quantidade" onclick='+"'"+'escolha_tipo('+id+')'+"'"+' >';
                        document.getElementById(id+"t").innerHTML=texto;
                       // $("#id").html(texto);

                    }else{
                      //  console.log(document.getElementById(id));
                        texto = '<input type="text">';
                        document.getElementById(id).innerHTML=texto;
                       //$("#id").html(texto);

                    }

               };

               function escolha_tipo(id){
               var texto;
               var num_tipo = document.getElementById("quantidade").value;
              // console.log("esta recebendo o numero:");
              // console.log(num_tipo);
               if(num_tipo==="1"){
                   num_tipo=1;
                  // console.log("Antes atribuir o select a variavel texto quando num 1");
                   texto = '<select id="p'+id+'_Tipo"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"p","Tipo")'+"'"+' >';
  //  console.log("Antes de tentar  dar input do select 1");
     document.getElementById(id+"t").innerHTML= texto;
        }else if(num_tipo==="2"){
            num_tipo=2;
          // console.log("Antes atribuir o select a variavel texto quando num 2");
               texto = '<select id="Tipo1"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                             <select id="Tipo2"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
     <input type="button" class="btn btn-success" value="confirmar" onclick='+"'"+'gerar_butao('+num_tipo+','+id+')'+"'"+' > ';
    //     console.log("Antes de tentar  dar input do select 2");
                   document.getElementById(id+"t").innerHTML= texto;

               }else if(num_tipo==="3"){
                   num_tipo=3;
                  // console.log("Antes atribuir o select a variavel texto quando num 3");
                   texto = '<select id="Tipo1"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                             <select id="Tipo2"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                              <select id="Tipo3"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
<input type="button" class="btn btn-success" value="confirmar" onclick='+"'"+'gerar_butao('+num_tipo+','+id+')'+"'"+'>';
  //  console.log("Antes de tentar  dar input do select 3");
                    document.getElementById(id+"t").innerHTML=texto;
       }else if(num_tipo==="4"){
           num_tipo=4;
        //   console.log("Antes atribuir o select a variavel texto quando num 4");
            texto = '<select id="Tipo1"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                             <select id="Tipo2"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                              <select id="Tipo3"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
                                                   <select id="Tipo4"  name="escolhido" >\n\
                                                  <option value="Vis">Visual</option>\n\
                                                  <option value="Ver">Verbal</option>\n\
                                                  <option value="Seq">Sequencial</option>\n\
                                                  <option value="Glo">Global</option>\n\
                                                  <option value="Sen">Sensorial</option>\n\
                                                  <option value="Int">Intuitivo</option>\n\
                                                  <option value="Ati">Ativo</option>\n\
                                                  <option value="Ref">Reflexivo</option>\n\
                                                  </select>\n\
\n\<input type="button" class="btn btn-success" value="confirmar" onclick='+"'"+'gerar_butao('+num_tipo+','+id+')'+"'"+'>';
                                                    //   console.log("Antes de tentar  dar input do select 4");
                                                   document.getElementById(id+"t").innerHTML=texto;

    }
    };


    function gerar_butao(num,id){
    var texto;
//    console.log("esse é o num da função gerar_butao");
  //  console.log(num);
    var valor;
    if(num===2){
        valor= ""+document.getElementById("Tipo1").value+","+ document.getElementById("Tipo2").value+"";
      //  console.log(valor);
    }else if(num===3){
        valor=""+document.getElementById("Tipo1").value+","+ document.getElementById("Tipo2").value+","+document.getElementById("Tipo3").value+"";
      //  console.log(valor);
    }else if(num===4){
        valor= ""+document.getElementById("Tipo1").value+","+document.getElementById("Tipo2").value+","+document.getElementById("Tipo3").value+","+document.getElementById("Tipo4").value+"";
      //  console.log(valor);
    }
    texto ='<input type="hidden" id="p'+id+'_Tipo" value="'+valor+'" >\n\
<a class="btn btn-default">'+valor+'</a>\n\
<input type="button" class="btn btn-info" value="enviar" onclick='+"'"+'enviar('+id+',"p","Tipo")'+"'"+'>\n\
     ';
    document.getElementById(id+"t").innerHTML=texto;
  };

             function editar_respostas(id,tipo){
                //   console.log(id);
                  // console.log(tipo);
               var texto;
                    if (tipo===1){
                    //    console.log(document.getElementById(id+"c"));
                        texto = '<textarea rows="4" cols="50" id=r'+id+'_Conteudo> </textarea>\n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"r","Conteudo")'+"'"+' >';
                        document.getElementById(id+"c").innerHTML=texto;
                       // $("#id").html(texto);

                    }else if(tipo === 2){
                    //    console.log(document.getElementById(id+"co"));
                         texto = '<select id="r'+id+'_Correta"  name="escolhido" >\n\
                                                  <option value="c">Correta</option>\n\
                                                  <option value="e">Errada</option>\n\
                                                  </select>\n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"r","Correta")'+"'"+' >';

                        document.getElementById(id+"co").innerHTML=texto;
                        //$("#id").html(texto);

                    }else if(tipo === 3){
                      //  console.log(document.getElementById(id+"s"));
                         texto = '<select name="Status" id="r'+id+'_status" >\n\
                      <option value="a">Ativo</option>\n\
                      <option value="i">Inativo</option> </select>\n\
<input type="button" class="btn btn-info" value="mudar" onclick='+"'"+'enviar('+id+',"r","status")'+"'"+' >';
                        document.getElementById(id+"s").innerHTML=texto;
                       // $("#id").html(texto);

                    }else{
                    //    console.log(document.getElementById(id));
                        texto = '<input type="text">';
                        document.getElementById(id).innerHTML=texto;
                       //$("#id").html(texto);

                    }

               };

            function enviar(vid,vtipo,vslot){
            var funcao=0;
          //  console.log("o id da pergunta é: "+vid);
          //  console.log("o tipo da é: "+vtipo);
          //  console.log("a coluna q vai mudar é: "+vslot);
            var mudanca = document.getElementById(vtipo+vid+"_"+vslot).value;
          //  console.log("a mudança será: "+mudanca);
                                          $.post("gravar_modificacao.php",//Faz o post na função busca.php
                         {id:vid,coluna:vslot,mudanca:mudanca,tipo:vtipo},//passa a variavel nome para a busca.php
                         function(){
                            // console.log(" post");

                         }
                    );
            if(vtipo==="r"){
                funcao="editar_respostas";
    }else{
        funcao="editar_respostas";
    }
          //  console.log("Antes do if: "+vid);
          //  console.log("Antes do if: "+vslot);

            if(vslot==="Conteudo"){
                vslot="c";
                document.getElementById(vid+vslot).innerHTML= '<input type="button" class="btn btn-default"  value="'+mudanca+'" onclick="'+funcao+'('+vid+',1)">';
        }else if(vslot==="Status" || vslot==="status"){
            vslot="s";
            if(vslot==="Status"){
            document.getElementById(vid+vslot).innerHTML= '<input type="button" class="btn btn-default"  value="'+mudanca+'" onclick="'+funcao+'('+vid+',2)">';
        }else{
            document.getElementById(vid+vslot).innerHTML= '<input type="button" class="btn btn-default"  value="'+mudanca+'" onclick="'+funcao+'('+vid+',3)">';
        }
        }else if(vslot==="Correta"){
            vslot="co";
            document.getElementById(vid+vslot).innerHTML= '<input type="button" class="btn btn-default"  value="'+mudanca+'" onclick="editar_respostas('+vid+',2)">';
        }else{
         vslot="t";
         document.getElementById(vid+vslot).innerHTML= '<input type="button" class="btn btn-default"  value="'+mudanca+'" onclick="editar_perguntas('+vid+',3)">' ;
        }

    };

            </script>
        </div>
    </body>
    <footer>

    </footer>
</html>
