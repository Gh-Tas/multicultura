<?php 
session_start();
include_once 'conexão_banco/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando Evento</title>
</head>
<body>
    <header>
        <?php include_once 'header/header.php'; ?>
    </header>
    <main>
        <h2>Criar Evento</h2>
        <form action="register_event.php" method="post">
            <label for="nome_evento">Nome do Evento:</label>
            <input type="text" id="nome_evento" name="nome_evento" required placeholder="Digite o nome do evento">
            <br>
            <label for="descricao">Descrição do Evento:</label>
            <input type="text" id="descricao" name="descricao" required>
            <br>
            <label for="Data">Data do Evento</label>
            <input type="date" id="Data" name="Data" required>
            <br>
            <label for="local_evento">Local do Evento:</label>
            <input type="text" id="local_evento" name="local_evento" required placeholder="Digite o local do evento">
            <br>
            <label for="preco">Preço do Evento:</label>
            <input type="number" id="preco" name="preco" required placeholder="Digite o preço do evento">
            <br>
            <label for="status">Status do evento</label>
            <select id="status" name="status" required>
                <option value="agendado">agendado</option>
                <option value="cancelado">cancelado</option>
                <option value="completado">completado</option>
            </select>
            <br>
            <button type="submit">Criar Evento</button>
        </form>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>
</html>