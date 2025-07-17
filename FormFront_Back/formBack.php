<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    <?php
        if (isset($_GET['nome']) 
        && isset($_GET['telefone']) 
        && isset($_GET['email']) 
        && isset($_GET['dt'])
        && isset($_GET['endereco'])
        && isset($_GET['bairro'])
        && isset($_GET['cidade'])
        && isset($_GET['cep'])
        && isset($_GET['estado'])
        && isset($_GET['pais'])){
            echo "Recebido o cliente ".$_GET['nome'];
            echo " que tem o ",$_GET['telefone']," numero";
            echo " que tem o ",$_GET['email']," email";
            echo " que tem o ",$_GET['dt']," email";
            echo " que tem o ",$_GET['endereco']," email";
            echo " que tem o ",$_GET['bairro']," email";
            echo " que tem o ",$_GET['cidade']," email";
            echo " que tem o ",$_GET['cep']," email";
            echo " que tem o ",$_GET['estado']," email";
            echo " que tem o ",$_GET['pais']," email";
        }
    ?>
</body>
</html>