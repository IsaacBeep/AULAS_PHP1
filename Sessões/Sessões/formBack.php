<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <FORM>
        <fieldset>
                <div>
                    <h3>DADOS DO FUNCIONARIO</h3>
                </div>

                <div id="linha">
                    <hr>
                </div>
                <br>

                <div id="dados">
                    <?php
                        if (isset($_GET['Nome'])
                        && isset($_GET['Telefone']) 
                        && isset($_GET['Email'])
                        && isset($_GET['Dt']) 
                        && isset($_GET['Endereco'])
                        && isset($_GET['Bairro'])
                        && isset($_GET['Cidade'])
                        && isset($_GET['Cep'])
                        && isset($_GET['Estado'])
                        && isset($_GET['Pais'])){
                            echo " O cliente ".$_GET['Nome'],"<br/>";
                            echo " Possui o numero ",$_GET['Telefone'],"<br/>";
                            echo " Tem o email ",$_GET['Email'],"<br/>";
                            echo " Nasceu em ",$_GET['Dt'],"<br/>";
                            echo " Atualmente mora em ",$_GET['Endereco'],"<br/>";
                            echo " No bairro ",$_GET['Bairro'],"<br/>";
                            echo " Na cidade ",$_GET['Cidade'],"<br/>";
                            echo " O cep ",$_GET['Cep'],"<br/>";
                            echo " No estado ",$_GET['Estado'],"<br/>";
                            echo " No pais ",$_GET['Pais'],"<br/>";
                        }
                    ?>
            
                </div>

        </fieldset>

    </FORM>
    
    
</body>
</html>