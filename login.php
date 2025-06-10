<?php
session_start();
include_once 'conexão_banco/conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        $_SESSION['mensagem'] = 'preencha_todos_os_campos';
        header('Location: index.php');
        exit();
    }

    $stmt = $conn->prepare('SELECT usuario_id, primeiro_nome, sobrenome, email, senha_hash, telefone FROM usuarios WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario && password_verify($senha, $usuario['senha_hash'])){
        $_SESSION['usuario_id'] = $usuario['usuario_id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['primeiro_nome'];
        $_SESSION['sobrenome'] = $usuario['sobrenome'];
        $_SESSION['telefone'] = $usuario['telefone'];
        $_SESSION['mensagem'] = 'login_sucesso';
        header('Location: perfil_user.php');
        exit();
    }else {
        $_SESSION['mensagem'] = 'email_ou_senha_incorretos';
        header('Location: index.php');
        exit();
    }
}
