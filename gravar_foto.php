<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            $tipo = $_POST["tipo"];
            //echo $identificador;
            $id = $_POST["id"];
            //echo $id;
            $foto = $_FILES["foto"]; //ARRAY

            //echo var_dump($foto);

            //Extrair a extensão do arquivo enviado
            $ext = explode(".", $foto["name"]);
            $ext = array_reverse($ext);
            $ext = $ext[0];

            //echo $ext;
            //verificar se a extensao é invalida
            if($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif"){
                echo "Foto inválida!";
            }elseif($foto["size"] > 1024*800){
                echo "Tamanho de imagem excedido";
            }else{

                //Passou pelas validações
                //echo "Ok";

                include_once 'conexa_acento.php';
                //gerar nome da imagem
            $nomefoto = $id.".".$ext;
                echo $nomefoto;



                //saltar os caracteres especiais da string
                if($identificador == "p"){


                $sql = "UPDATE perguntas SET foto = '".$nomefoto."' WHERE ID_pergunta = ".$id."";

                if(mysqli_query($con, $sql)){
                    echo "Gravado com sucesso!";
                    move_uploaded_file($foto["tmp_name"], "img/".$nomefoto);
                }else{
                    //echo "Erro ao gravar!";
                    echo $sql;
                }

                }else{


                $sql = "UPDATE respostas SET foto = '".$nomefoto."' WHERE ID_resposta = ".$id."";

                if(mysqli_query($con, $sql)){
                    echo "Gravado com sucesso!";
                    move_uploaded_file($foto["tmp_name"], "img/".$nomefoto);
                }else{
                    //echo "Erro ao gravar!";
                    echo $sql;
                }

                }
            }


        ?>
    </body>
</html>
