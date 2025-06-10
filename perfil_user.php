<?php
session_start();
include_once 'conexão_banco/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>

<body>
    <header>
        <?php include_once 'header/header.php';?>
    </header>
    <main>
        <?php
            if (isset($_SESSION['mensagem'])) {
            echo '<p class="message">' . $_SESSION['mensagem'] . '</p>';
            unset($_SESSION['mensagem']);
        }
        ?>
        
        <h2>Pefil</h2>
        <section>
            <div>
                <p>//nome do usuário</p>
                <?php echo "<div class=infos>" . $_SESSION['nome'] . " " . $_SESSION['sobrenome'] . "</div>";?>
                <p>//email do usuário</p>
                <?php echo "<div class=infos>" . $_SESSION['email'] . "</div>"; ?>
                <p>//telefone do usuário</p>
                <?php echo "<div class=infos>" . $_SESSION['telefone'] . "</div>"; ?>
            </div>
        </section>
        <h3>Criar Evento</h3>
        <form action="create_event.php" method="post">
            <button>enviar</button>
        </form>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>

</html>