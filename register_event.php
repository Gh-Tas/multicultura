<?php 
session_start();
include_once 'conexão_banco/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_evento = trim($_POST['nome_evento']);
    $descricao = trim($_POST['descricao']);
    $local_evento = trim($_POST['local_evento']);
    $data_evento = $_POST['Data'];
    $preco = $_POST['preco'];
    $status = $_POST['status'];

    if (empty($nome_evento) || empty($descricao) || empty($local_evento) || empty($data_evento) || empty($preco) || empty($status)) {
        $_SESSION['mensagem'] = 'preencha_todos_os_campos';
        header('Location: create_event.php');
        exit();
    }

    $stmt = $conn->prepare('INSERT INTO eventos (nome_evento, descricao, data_evento, localizacao, preco, status, organizador_id) VALUES (:nome_evento, :descricao, :data_evento, :local_evento, :preco, :status, :organizador_id)');
    $stmt->bindParam(':nome_evento', $nome_evento);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':data_evento', $data_evento);
    $stmt->bindParam(':local_evento', $local_evento);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':organizador_id', $_SESSION['usuario_id']);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['mensagem'] = 'evento_criado_com_sucesso';
        $_SESSION['organizador_id']['nome_evento'] = $nome_evento;
        $_SESSION['organizador_id']['descricao'] = $descricao;
        $_SESSION['organizador_id']['localizacao'] = $local_evento;
        $_SESSION['organizador_id']['data_evento'] = $data_evento;
        $_SESSION['organizador_id']['preco'] = $preco;
        $_SESSION['organizador_id']['status'] = $status;
        header('Location: inicio.php');
        exit();
    } else {
        $_SESSION['mensagem'] = 'erro_ao_criar_evento';
        header('Location: create_event.php');
        exit();
    }
}

?>