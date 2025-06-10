<?php
session_start();
include_once 'conexão_banco/conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['Nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];


    if (empty($nome) || empty($sobrenome) || empty($email) || empty($senha) || empty($telefone)) {
        $_SESSION['mensagem'] = 'preencha_todos_os_campos';
        header('Location: index.php');
        exit();
    }
    
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = ("INSERT INTO usuarios (primeiro_nome, sobrenome, email, senha_hash, telefone) VALUES (:nome, :sobrenome, :email, :senha, :telefone)");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->execute();
    header('Location: index.php');
    exit();

    if ($stmt->rowCount() > 0) {
        $_SESSION['mensagem'] = 'produto_inserido';
    } else {
        $_SESSION['mensagem'] = 'erro_inserir_produto';
    }
}
