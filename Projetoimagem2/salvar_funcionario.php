<?php
function redimensionarImagem($imagem, $largura, $altura){
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);


//CRIA UMA NOVA IMAGEM EM BRANCO COM NOVAS DIMENSOES
//imagecreatetruecolor() CRIA UMA NOVA IMAGEM EM BRANCO COM ALTA QUALIDADE
    $novaImagem = imagecreatetruecolor($largura, $altura);
    
    //CARREGA A IMAGEM ORIGINAL(JPEG) APARTIR DO AQUIVO
    //imagecreatefromjpeg() CRIA A IMAGEM PHP A PARTIR DE UM JPEG
    $imagemOriginal = imagecreatefromjpeg($imagem);
    
    // COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA 
    //imagecopyresampled() COPIA E REDIMENSIONAMENTO E SUAVIZAÇÃO
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    
    //INICIA UM BUFFER PARA GUARDAR A IMAGEM COMO TEXTO BINARIO
    // ob_start() INICIA O "output buffering" GUARDANDO A SAIDA
    ob_start();
    //imagejep()ENVIA A IMAGEM PARA O OUTPUT(QUEVAI PRO BUFFER)
    imagejpeg($novaImagem);

    //OB_GET_CLEAN() -- PEGAR O CONTEUDO DO BUFFER E LIMPA O BUFFER
    $dadosImagem = ob_get_clean();

    //LIBERA A MEMÓRIA USADA PELAS IMAGEMS
    //imagendestroy() LIBERA A MEMÓRIA USADA PELA IMAGEM
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    //RETORNA A IMAGEM REDIMENSIONADA EM FORMATO BINARIO
    return $dadosImagem;
}
    //CONFIGURAÇÂO DO BANCO DE DADOS
    $host = "localhost";
    $dbname = "armazenaimagem";
    $dbusername = "root";
    $password = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname:$dbname", $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERMODE_EXCEPTION);

        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES('foto'))){
            if($_FILES['foto']['error']==0){
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $nomeFoto = $_FILES['foto']['name']; //pega o nome original do arquivo
                $tipoFoto = $_FILES['foto']['type']; //pega o tipo mime da imagem

                //Redimensionar imgaem
                // O codigo abaixo cuja variavel é "tmp_name" é o caminho temporario do arquivo 
                $foto = redimensionarImagem($_FILES['foto']['tmp_name'],300.400);

                //Insere no banco de dados usando sql preparad
                $sql = "INSERT INTO funcionarios(nome,telefone,nome_foto,tipo_foto,foto) VALUES (:nome,:telefone,:nome_foto,:tipo_foto,:foto)";
                $stmt = $pdo->prepare($sql); //Responsavel por preparar a query para evitar ataque de sql injection
                $stmt->bindParam(':nome', $nome); //Liga os parametros as variaveis
                $stmt->bindParam(':telefone', $telefone); //Liga os parametros as variaveis
                $stmt->bindParam(':nome_foto', $nomeFoto); //Liga os parametros as variaveis
                $stmt->bindParam(':tipo_foto', $tipoFoto); //Liga os parametros as variaveis
                $stmt->bindParam(':foto', $foto , PDO::PARAM_LOB); //O lob - large Object Usado para dados binarios como imagem
                if($stmt->execute()){
                    echo "funcionario cadastrado com sucesso!";
                } else{
                    echo"Erro ao cadastrar o usuario";
                }

            }else {
                echo "Erro ao fazer upload da foto! Codigo: " . $_FILES['foto']['error'];
            }
        }
    }catch(PDOException $e){
        echo"Erro. " . $e->getMessage(); //Mostra o erro se houver
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imagens</title>
</head>
<body>
    <h1>Lista de Imagens</h1>

    <a href="consulta_fucionario.php">Listar funcionarios</a>
    
</body>
</html>