<?php
    require_once 'Conexao.php';

    $conexao = conectarBanco();

    $sql = "SELECT id_cliente, nome, endereco, telefone, email FROM cliente ORDER BY nome ASC";

    $stmt = $conexao ->prepare($sql);
    $stmt-> execute();
    $clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Todos os clientes cadastrados </h2>

    <?php if (!$clientes): ?>
    <p style="color:red;">Nenhum cliente encontrado no banco de dados.</p>
    <?php else: ?>
<table border="1">
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
                <td><?= htmlspecialchars($cliente["id_cliente"]) ?></td>
                <td><?= htmlspecialchars($cliente["nome"]) ?></td>
                <td><?= htmlspecialchars($cliente["endereco"]) ?></td>
                <td><?= htmlspecialchars($cliente["telefone"]) ?></td>
                <td><?= htmlspecialchars($cliente["email"]) ?></td>
                <td><a href="AtualizarClientes.php?id=<?=$cliente['id_cliente']?>">Editar</a></td>
            </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
