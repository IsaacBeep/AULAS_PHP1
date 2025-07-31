<?php
require_once 'conexao.php';

$conexao = conectarBanco(); 

$sql = "SELECT id_cliente, nome, endereço, telefone, email FROM cliente ORDER BY nome ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Clientes</h2>

    <?php if (!$clientes): ?>
        <p style = "color:red;">Nenhum cliente encontrado no banco de dados</p>
    <?php else: ?>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['endereço']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td>
                    <a href="atualizarCliente.php?id=<?= $cliente['id_cliente'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>

    </table>
    <?php endif; ?>
</body>
</html>