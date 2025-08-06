<?php
//inclui o arquivos de conexão
require_once 'conecta.php';
//cria a consulta sql pra selecionar os dados principais(sem a coluna imagem)
$querySelecao = "SELECT codigo, evento, descricao,nome_imagem,tamanho_imagem FROM tabela_imagens";

$resultado = $conexao->query($querySelecao);
if (!$resultado) {
    die("Erro na consulta: " .mysqli_error($conexao));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>armazenaimagem</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form enctype="multipart/form-data" method="post" action="upload.php">
        <input type="hidden" name="MAX_FILE_SIZE" value="999999999">
        <input type="text" name="evento" placeholder="Nome do Evento" required>
        <input type="text" name="descricao" placeholder="Descrição do Evento" required>
        <input type="file" name="imagem">
        <input type="submit" value="salvar imagem">

    </form>
    <br>
    <table border = "1">
        <tr>
            <td align="center">codigo</td>
            <td align="center">Evento</td>
            <td align="center">Descrição</td>
            <td align="center">nome da imagem</td>
            <td align="center">tamanho</td>
            <td align="center">Visualizar Imagem</td>
            <td align="center">Excluir imagem</td>
        </tr>
    
    <?php
        while($arquivos = mysqli_fetch_array($resultado)){?>
        <tr>
            <td align="center"><?php echo $arquivos['codigo'];?></td>
            <td align="center"><?php echo $arquivos['evento'];?></td>
            <td align="center"><?php echo $arquivos['descricao'];?></td>
            <td align="center"><?php echo $arquivos['nome_imagem'];?></td>
            <td align="center"><?php echo $arquivos['tamanho_imagem'];?></td>
            <td align="center"><a href="ver_imagems.php?id=<?php echo $arquivos['codigo'];?>">Ver Imagem</a></td>
            <td align="center"><a href="excluir_imagem.php?id=<?php echo $arquivos['codigo'];?>">Excluir</a></td>
        </tr>
        <?php
        }?>


    </table>
</body>
</html>