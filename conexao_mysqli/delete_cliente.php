<?php
session_start();
require_once "conexao.php";

$conexao = conectadb();
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];

    $stmt = $conexao->prepare("DELETE FROM cliente WHERE id_cliente = ?");
    $stmt->bind_param("i", $id_cliente);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $mensagem = "<div class='alert alert-success'>Cliente deletado com sucesso!</div>";
        } else {
            $mensagem = "<div class='alert alert-warning'>Cliente com ID $id_cliente não encontrado.</div>";
        }
    } else {
        $mensagem = "<div class='alert alert-danger'>Erro: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar com dropdown -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="front.php">HOME</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Navegar
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="insert_cliente.php">Inserir Cliente</a></li>
                        <li><a class="dropdown-item" href="select_cliente.php">Listar Clientes</a></li>
                        <li><a class="dropdown-item" href="update_cliente.php">Atualizar Cliente</a></li>
                        <li><a class="dropdown-item" href="delete_cliente.php">Deletar Cliente</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo -->
<div class="container mt-5">
    <h2 class="text-center">Deletar Cliente</h2>
    <p class="text-center text-muted">Digite o ID do cliente para remover do sistema.</p>

    <!-- Exibe mensagem -->
    <?= $mensagem ?>

    <!-- Formulário -->
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="id_cliente" class="form-label">ID do Cliente:</label>
            <input type="number" name="id_cliente" class="form-control" id="id_cliente" placeholder="Ex: 1" required>
        </div>
        <button type="submit" class="btn btn-danger">Deletar Cliente</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>