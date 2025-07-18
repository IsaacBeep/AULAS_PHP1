<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        #$media = 6.0; #Exame
        #$media = 7.0; #Aprovado
        #$media = 2.9; #Reprovado

        if ($media >= 7.0){
            echo "Aluno Aprovado";
        }

        if ($media < 7.0 and $media >= 3.0) {
            echo "Aluno em Exame";
        }

        if ($media <= 2.9){
            echo "Aluno Reprovado";
        }
    ?>
</body>
</html>