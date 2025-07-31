<?php
    require_once('conexao.php');
    $conexao = conectarBanco();
    
    // Obtendo ID via GET
    $idCliente = $_GET['id_cliente'] ?? $_GET['id'] ?? null;
    $cliente = null;
    $msgErro = '';
    
    // Função local para buscar cliente por ID
    function buscarClientePorid($idCliente, $conexao) { 
        try {
            $stmt = $conexao->prepare("
                SELECT id_cliente, nome, endereço, telefone, email
                FROM cliente
                WHERE id_cliente = :id
            ");
            $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro na consulta: " . $e->getMessage());
            return false;
        }
    }
    
    // Se um ID for enviado, busca o cliente no banco
    if ($idCliente && is_numeric($idCliente)) {
        $cliente = buscarClientePorid($idCliente, $conexao);
        if (!$cliente) {
            $msgErro = "Cliente não encontrado com ID: " . htmlspecialchars($idCliente);
        }    
    } else {
        if ($idCliente) {
            $msgErro = "ID inválido. Digite um número válido.";
        } else {
            $msgErro = "Digite o ID do cliente para buscar os dados.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script> 
        function habilitarEdicao(campo){
            const input = document.getElementById(campo);
            input.removeAttribute("readonly");
            input.focus();
            input.style.backgroundColor = "#fff";
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>
    
    <!-- Se houver erro, exibe a mensagem e o campo de busca -->
    <?php if ($msgErro): ?>
        <p style="color:red;"><?= htmlspecialchars($msgErro) ?></p>
        <form action="atualizarCliente.php" method="get">
            <label for="id_cliente">ID do Cliente:</label>
            <input type="number" id="id_cliente" name="id_cliente" required min="1" 
                   value="<?= isset($_GET['id_cliente']) ? htmlspecialchars($_GET['id_cliente']) : '' ?>">
            <button type="submit">Buscar Cliente</button>
        </form>    
    <?php else: ?>
        <!-- Se o cliente for encontrado, exibe o formulário preenchido --> 
        <p style="color:green;">Cliente encontrado! Clique nos campos para editar.</p>
        <form action="processarAtualizacao.php" method="post">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente']) ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" 
                   value="<?= htmlspecialchars($cliente['nome']) ?>" 
                   readonly onclick="habilitarEdicao('nome')" 
                   style="cursor: pointer; background-color: #f0f0f0;" 
                   title="Clique para editar">
            
            <label for="endereço">Endereço:</label>
            <input type="text" id="endereço" name="endereço" 
                   value="<?= htmlspecialchars($cliente['endereço']) ?>" 
                   readonly onclick="habilitarEdicao('endereço')" 
                   style="cursor: pointer; background-color: #f0f0f0;" 
                   title="Clique para editar">
            
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" 
                   value="<?= htmlspecialchars($cliente['telefone']) ?>" 
                   readonly onclick="habilitarEdicao('telefone')" 
                   style="cursor: pointer; background-color: #f0f0f0;" 
                   title="Clique para editar">
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" 
                   value="<?= htmlspecialchars($cliente['email']) ?>" 
                   readonly onclick="habilitarEdicao('email')" 
                   style="cursor: pointer; background-color: #f0f0f0;" 
                   title="Clique para editar">
            
            <button type="submit">Atualizar Cliente</button>
            <a href="atualizarCliente.php" style="margin-left: 10px;">Buscar Outro Cliente</a>
        </form>  
    <?php endif; ?>
    
    <!-- Debug info (remover em produção) -->
    <?php if (isset($_GET['debug'])): ?>
        <div style="margin-top: 20px; padding: 10px; background: #f0f0f0; border: 1px solid #ccc;">
            <h3>Debug Info:</h3>
            <p><strong>GET params:</strong> <?= htmlspecialchars(print_r($_GET, true)) ?></p>
            <p><strong>ID Cliente:</strong> <?= htmlspecialchars($idCliente ?? 'null') ?></p>
            <p><strong>Cliente encontrado:</strong> <?= $cliente ? 'Sim' : 'Não' ?></p>
        </div>
    <?php endif; ?>
</body>
</html>