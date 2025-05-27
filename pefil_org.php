<?php include_once 'conexão_banco/conexao.php'; ?>

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
        <h2>Pefil</h2>
        <section>
            <div>
                <h3>//nome empresa</h3>
                <p>//seguidores</p>
                <p>//cnpj da empresa</p>
                <p>//endereço da empresa</p>
                <p>//telefone da empresa</p>
                <p>//email da empresa</p>
                <p>//site da empresa</p>
            </div>
        </section>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>

</html>