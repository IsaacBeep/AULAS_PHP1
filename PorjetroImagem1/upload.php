<?php
require_once 'conecta.php';
// Verifica se o formulário foi enviado
$evento = $_POST['evento'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

// Verifica se o arquivo foi enviado
if(!empty($imagem)) {
    //le o conteúdo do arquivo
    $fp = fopen($imagem, 'rb');
    $conteudo = fread($fp, filesize($imagem));
    fclose($fp);

    //protege contra problemas de caracteris no sql
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    //insere no bd
    $queryInsercao = "INSERT INTO tabela_imagens (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) VALUES ('$evento', '$descricao', '$nome', '$tamanho', '$tipo', '$conteudo')";

    $resultado = mysqli_query($conexao, $queryInsercao);

    // Verifica se a inserção foi bem sucedida
    if ($resultado) {
        echo 'Registro inserido com sucesso!';
        header("Location: index.php");
    } else {
        die ('Erro ao inserir no banco: ' . mysqli_error($conexao));
    }
} else {
    echo 'Nenhum arquivo enviado.';

}