<?php
include_once 'conexão_banco/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multicultura</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>

<body>
    <header>
        <?php include_once 'header/headerlogin.php';?>
    </header>
    <main>
        <section>
            <h1>Bem-vindo ao Multicultura</h1>
            <h2>Tela de Login</h2>
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu email">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
    <footer>
        <?php include_once 'footer/footer.php';?>
    </footer>

</body>
</html>