<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <script>
  /*  var xhr = new XMLHttpRequest();
    xhr.open('GET', "//ipinfo.io/json", true);*/
    </script>
    <body>
      <script>
      console.log(user_id);</script>
        <?php
        $user=$_POST['user_id'];
echo "id retornado do canvas";echo "<br>";
        echo $user;
        echo "<br>";
        $print = "";
        $cont=0;
        /*for($cont=15;$cont<17;$cont++){
          $print = $print.$user($cont);
        }*/
        //$print = (float) $user;
        /*$user = (int) $user;  tranforma o valor errado em inteiro*/
        //$user = (double) $user;
        $print = substr("$user", -3);//tem como input a string que correnponde ao id do aluno e tranforma no id do canvas retornado pela api nesse comando https://testilumno.test.instructure.com/api/v1/users/self/profile
        echo "id do usuário no canvas";
        echo "<br>";
        echo $print;
        echo "<br>";
  echo "testando echo";
        //$print = $user % 1000;
        //var_dump($user);
        //var_dump($print);
        //$print = ($print) / (1000);

        //$print =($user)%(1000);

        //echo $print;
      // Initialize session and set URL.
        /*
$ch = curl_init();
$url="https://testilumno.instructure.com/api/v1/users/self/profile";
curl_setopt($ch, CURLOPT_URL, $url);
// Set so curl_exec returns the result instead of outputting it.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
// Get the response and close the channel.
$response = curl_exec($ch);
curl_close($ch);
echo $response;*/
        // put your code here

//$aki = http_get("https://testilumno.instructure.com/api/v1/users/self/profile
//$url = file_get_contents('http://www.kadunew.com/blog/web-design/23-exemplos-de-design-responsivo');
//echo $url;
//fopen("https://testilumno.instructure.com/api/v1/users/self/profile", "r");
//echo $data;
        ?>

    </body>
</html>
