<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $valores = array("Isaac Silva de Lima Souza" , "35" , "M" , "103");
        list($usuario, $idade, $genero, $qi) = $valores;
        echo "Usuario:".$usuario."<br/>";
        echo "Idade:".$idade."<br/>";
        echo "Genero:".$genero."<br/>";
        echo "Qi:".$qi."<br/>";
    ?>
</body>
</html>