<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $musicas = array(
            array("Kid abelha", "Amanha", 1993),
            array("Ultrage A Rigor", "Pelados", 1985),
            array("Paralamas do Sucesso","Alagados", 1987));
        for ($linha = 0; $linha < 3; $linha++)
        {
            for ($coluna = 0; $coluna < 3; $coluna++)
            {
                echo $musicas[$linha][$coluna]. " | ";
            }
            echo "<br/>";
        }
        
    ?>
</body>
</html>