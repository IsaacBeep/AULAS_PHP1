<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" />
            </label>
            <br>
            <br>
            <label>
                Descrição :
                <textarea name="descricao"></textarea>
            </label>
            <br>
            <br>
            <label>
                Prazo:
                <input type="text" name="parazo"/>
            </label>
            <br>
            <br>
        </fieldset>
        <fieldset>
            <legend>Prioridade</legend>
            <label>
                <input type="radio" name="prioridade" value="baixa" checked/>
                Baixa
                <input type="radio" name="prioridade" value="media"/>
                Média
                <input type="radio" name="prioridade" value="alta"/>
                Alta
            </label>
        </fieldset>
        <label>
            Tarefa concluida:
            <input type="checkbox" name="concluida" value="sim"/>
        </label>
            <input type="submit" value="Cadastrar"/>
    
    </form>
    <table>
        <tr>
            <th>Tarefas</th>
            <th>Descricao</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluida</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa['nome']; ?> </td>
                <td><?php echo $tarefa['descricao']; ?> </td>
                <td><?php echo $tarefa['prazo']; ?> </td>
                <td><?php echo $tarefa['prioridade']; ?> </td>
                <td><?php echo $tarefa['concluida']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>