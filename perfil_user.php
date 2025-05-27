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
                <h3>//nickname</h3>
                <p>//nome do usuário</p>
                <p>//email do usuário</p>
                <p>//telefone do usuário</p>
                <p>//endereço do usuário</p>
                <p>//data de nascimento do usuário</p>
                <p>//descrição do usuário</p>
            </div>
        </section>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>

</html>