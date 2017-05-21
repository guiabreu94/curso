<?php

    $coluna = $_POST["coluna"];/*Oriundo da função pesquisar.php.Refere-se qual será o atributo na tabela que será usado como "localizador(que será
     * usado no like)" do que se quer trabalhar */
    $conteudo = $_POST["nome"];/* O atributo oriundo da função pesquisar.php.Tal atributo é a variavel que será usada para a busca
     *  , sendo assim usada depois do comando like */
    //echo "alo";
    if($conteudo!=""){//Filtra se foi passado algum valor, ja que como é usado o comando like pode ter sido passado um valor nulo
    include_once 'conexa_acento.php';//faz a conexão com o banco
    if($coluna=="Status" || $coluna=="Tipo"){
        /* Status e tipo são tratados de forma diferente em relação a conteudo.Isso se da porque são valores fixos(enum)
         * ,sendo status ativo("a") e inativo("i") e tipo determinando os varios estilos de apredizagem.  */
        $sql = "select * from perguntas where ".$coluna." like '%".$conteudo."%' ";
    }else{
        /* Conteudo é uma "valor mutavel" quer dizer que ele é uma cadeia de caracteres que não são fixos ,
         * sendo assim precisam do % para que haja uma procura "seletiva" */
    $sql = "select * from perguntas where ".$coluna." like '%".$conteudo."%' ";
    }
    
    
    $result = mysqli_query($con, $sql);//Joga a query no banco e retorna a resposta do banco, que no caso é tudo que esta contido na tabela perguntas
    
    if(mysqli_num_rows($result) > 0){
        /* Se houver algum retorno dentro do variavel ressult oriundo a funcção mysqli_query então entra-se nesse comando if */
        ?>
        <table class="table" id="tabela"> <!-- Table que lista todos os valores inportantes na tela para o usuário -->
            <tr>
                <th>conteudo</th>
                <th>status</th>
                <th>tipo</th>
                
            </tr>            
        <?php
        while($row = mysqli_fetch_array($result)){//Enquanto $row receber algum valor, quer dizer , enquanto ainda não tiverem "acabados" os retornos da query que foi enviada ao banco
            ?>
            <tr>
                <?php
                /* Faz a listagem das perguntas que desejadas no banco com o seguinte formato:
                 * 1-Dentro de uma tag <a></a> com um id composto:
                 *  pelo id da pergunta(ID_pergunta) e mais um caracte referente a que tipo do atributo que esta sendo posto no td.
                 * Isso para que posteriormente ele seja identificado pelo código javascript(comando = console.log(document.getElementById(id+"c")); por exemplo) para que seja feita
                 * a mudança caso o usuário queira mudar tal campo no banco.
                 * 2-Tem seu conteudo o valor de cada coluna, o qual é oriundo do banco de dados
                 * 3-Tem como tipo um "button" para que quando clickado acione a função javascript editar pergunta que como o nome ja diz edita a pergunta tanto
                 * na tela quanto diretamente no banco
                 * 4- Tem no seu id as letras:
                 * "c" representando conteudo
                 * "s" representando status
                 * "t representando tipo"  */
                 
                
                
                ?>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."c".'"> <input type="button" class="btn btn-default"   value="'.$row["Conteudo"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',1)"> </a>'; ?></td>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."s".'"> <input type="button"  class="btn btn-default" value="'.$row["Status"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',2)"> </a>'; ?></td>
                <td ><?php echo '<a id="'.$row["ID_pergunta"]."t".'"> <input type="button"  class="btn btn-default" value="'.$row["Tipo"].'" onclick="editar_perguntas('.$row["ID_pergunta"].',3)"> </a>'; ?></td>
               
               
                
            </tr>
            <?php
        }
        
        
    } }else{
        echo "Nenhuma pergunta encontrada!";//Caso n tenho nenhum retorno na função mysqli_query essa string é exibida
    }
    
    
?>
