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
        <?php include_once 'header/header.php'; ?>
    </header>
    <main>
        <section>
            <h1>Bem-vindo ao Multicultura</h1>
            <h2>Tela de Registro Usuário</h2>
            <form action="perfil_user.php" method="post">
                <label for="Nome">Nome:</label>
                <input type="text" id="Nome" name="Nome" required placeholder="Digite seu Nome">
                <br>
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" required placeholder="Digite seu nickname">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required placeholder="Digite seu email">
                <br>
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required placeholder="(XX) XXXXX-XXXX" pattern="^\(\d{2}\) \d{5}-\d{4}$" title="Digite um telefone no formato (DD) XXXXX-XXXX" maxlength="15">
                <br>
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required placeholder="Digite seu endereço">
                <br>
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
                <br>
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" cols="50" required placeholder="Escreva uma breve descrição sobre você"></textarea>
                <button type="submit">Entrar</button>
            </form>
            <a href="register_org.php">Registre-se como empresa</a>
        </section>
    </main>
    <footer class="footer">
        <?php include_once 'footer/footer.php'; ?>
    </footer>

</body>

</html>