<?php
require_once 'conexao.php';

$conexao = conectarBanco();

$busca = $_GET['busca'] ?? '';

if(!$busca) {
    ?>
    <form action="pesquisarcliente.php" method = "GET">
        <label for="busca">Digite o ID ou nome</label>
        <input type="text" id = "busca" name = "busca" required>
        <button type="submit">Pesquisar</button>
    </form>
    <?php
    exit;
}           
    if(is_numeric($busca)) {
        $stmt = $conexao->prepare("
            SELECT id_cliente, nome, endereço, telefone, email
            FROM cliente
            WHERE id_cliente = :id");
        $stmt->bindParam(':id', $busca, PDO::PARAM_INT);
    }else{
        $stmt = $conexao->prepare("
            SELECT id_cliente, nome, endereço, telefone, email
            FROM cliente
            WHERE nome LIKE :nome");
        $buscanome = "%$busca%";
        $stmt->bindParam(':nome', $busca, PDO::PARAM_STR);
        }
    $stmt->execute();
    $clientes = $stmt->fetchAll();
    if(!$clientes) {
        echo "Erro: Nenhum cliente encontrado.";
    } 
    ?>
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
            
            <a href="atualizarcliente.php?id=<?=$cliente["id_cliente"]?>">Editar</a>
            </td>
            </tr>
            <?php endforeach; ?>
    </table>