<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $vogais = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
        echo "Hello world of PHP <php/>";
        $cons = str_replace($vogais, "", "Hello world of PHP");
        echo "Consoantes:".$cons, "<br/>";
        $test = "Hello world! \n";
        print "Posição da letra 'o' :";
        print strpos($test, "o")."<br/>";
        print "Posição da letra 'o' apos 5 :";
        print strpos($test, "o", 5). "<br/>";
        $message = "troca letra uma a uma";
        echo $message. "<br/>";
        $new_message = strtr($message, 'abcdef', '123456');
        echo "Criptogrando: ".$new_message."<br/>";
        $new_message = strtr($message, "123456", "abcdef");
        echo "descriptografando: ".$new_message. "<br/>";
    ?>
</body>
</html>