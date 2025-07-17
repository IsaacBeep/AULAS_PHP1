<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
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
            echo "Recebido o cliente ".$_GET['nome'],"<br/>";
            echo " que tem o numero ",$_GET['telefone'],"<br/>";
            echo " que tem o email ",$_GET['email'],"<br/>";
            echo " que tem a data de nascimento ",$_GET['dt'],"<br/>";
           echo " que tem o endereço ",$_GET['endereco'],"<br/>";
            echo " que esta no bairro ",$_GET['bairro'],"<br/>";
            echo " que esta na cidade ",$_GET['cidade'],"<br/>";
            echo " que tem o cep ",$_GET['cep'],"<br/>";
            echo " que esta no estado ",$_GET['estado'],"<br/>";
            echo " que esta no pais ",$_GET['pais'],"<br/>";
        }
    ?>
</body>
</html>