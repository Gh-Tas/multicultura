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
        <?php include_once 'header/header.php'; ?>
    </header>
    <main>
        <section>
            <h1>Bem-vindo ao Multicultura</h1>
            <h2>Tela de Registro Empresa</h2>
            <form action="perfil_user.php" method="post">
                <label for="Nome">Nome da empresa:</label>
                <input type="text" id="Nome" name="Nome" required placeholder="Digite o Nome da empresa">
                <br>
                <label for="cnpj">cnpj:</label>
                <input type="text" id="cnpj" name="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" title="Digite um CNPJ no formato XX.XXX.XXX/XXXX-XX">
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
                <label for="site">Site da empresa:</label>
                <input type="url" id="site" name="site" required placeholder="Digite o site da empresa">
                <br>
                <textarea id="descricao" name="descricao" rows="4" cols="50" required placeholder="Escreva uma breve descrição sobre a empresa"></textarea>
                <button type="submit">Entrar</button>
            </form>
            <a href="register_user.php">Registri-se como usuário</a>
        </section>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>

</body>

</html>