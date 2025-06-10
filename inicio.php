<?php
session_start();
include_once 'conexão_banco/conexao.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include_once 'header/header.php';?>
    </header>
    <main>
        <h2>Eventos</h2>

        <?php 
            echo "<div class='infos'>Eventos disponíveis:</div>";
            $stmt = $conn->prepare("SELECT * FROM eventos WHERE status = 'agendado'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);;
            if (isset($result)) {
                echo "<div class='event'>";
                    echo "<h3>" . htmlspecialchars($result['nome_evento']) . "</h3>";
                    echo "<p>Descrição: " . htmlspecialchars($result['descricao']) . "</p>";
                    echo "<p>Data: " . htmlspecialchars($result['data_evento']) . "</p>";
                    echo "<p>Local: " . htmlspecialchars($result['localizacao']) . "</p>";
                    echo "<p>Preço: R$" . htmlspecialchars($result['preco']) . "</p>";
                    echo "<p>Status: " . htmlspecialchars($result['status']) . "</p>";
                    echo "</div>";
            } 
        
        
        
        ?>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>
</html>