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
        <?php include_once 'header/header.php';?>
    </header>
    <main>
        <section>
            <h1>Bem-vindo ao Multicultura</h1>
            <h2>Tela de Login Empresa</h2>
            <form action="pefil_org.php" method="post">
                <label for="cnpj">cnpj:</label>
                <input type="text" id="cnpj" name="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" title="Digite um CNPJ no formato XX.XXX.XXX/XXXX-XX">
                <br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                <br>
                <button type="submit">Entrar</button>
            </form>
            <a href="index.php">Logue como pessoa</a>
        </section>
    </main>
    <footer>
        <?php include_once 'footer/footer.php';?>
    </footer>

</body>
</html>