<?php

$idPergunta = $_POST["id"];
$conteudo= $_POST["conteudo_resposta"];
$status = $_POST["status"];
include_once '../conexa_acento.php';


$sql="select r.conteudo,r.status,r.Correta from respostas as r
inner join respondem on respondem.ID_resposta = r.ID_resposta
inner join perguntas on perguntas.ID_pergunta = respondem.ID_pergunta
where perguntas.ID_pergunta =".$idPergunta;

$result= mysqli_query($con, $sql);

while($row=mysqli_fetch_array($result)){
    
    if($row["status"]=="a"){
        echo "<label>";
        echo '<INPUT TYPE="radio" NAME="q">';                        
        echo '<a class="btn btn-warning">'.$row["conteudo"].'</a>';
        echo "</label>";
        if($row["Correta"] == "c"){
            echo '<input type="button" class="btn btn-success" value="correta" onclick='."'".' editar() '."'".'>';
        }
        echo "<br><br>";
    }
}
if($status=="a"){
echo "<label>";
echo "<INPUT TYPE=radio NAME=q>";
echo '<a class="btn btn-warning">'.$conteudo.'</a>';
echo "</label>";
echo "<br><br>";
}
echo '<input type="button" value="limpar" class="btn btn-danger" onclick='."'".'limpando('.$idPergunta.',"'.$conteudo.'","'.$status.'")'."'".'>'
        
?>