<?php
include_once 'conexão_banco/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multicultura</title>
    <link rel="stylesheet" href="estilos/style_register.css">
</head>

<body>
    <header>
        <?php include_once 'header/headerlogin.php'; ?>
    </header>
    <main>
        <section>
            <h1>Bem-vindo ao Multicultura</h1>
            <h2>Tela de Registro Usuário</h2>
            <form action="register.php" method="POST">
                <label for="Nome">Nome:</label>
                <input type="text" id="Nome" name="Nome" required placeholder="Digite seu Nome">
                <br>
                <label for="sobrenome">sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required placeholder="Digite seu sobrenome">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required placeholder="Digite seu email">
                <br>
                <label for="senha">senha</label>
                <input type="text" id="senha" name="senha" required>
                <br>
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required title="Digite um telefone no formato DDXXXXXXXXX" maxlength="11">
                <br>
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
    <footer class="footer">
        <?php include_once 'footer/footer.php'; ?>
    </footer>

</body>

</html>