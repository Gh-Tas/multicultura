<?php
session_start();
include_once 'conexão_banco/conexao.php'; // Inclui seu arquivo de conexão

// Verifica se o usuário está logado
$usuario_logado = isset($_SESSION['usuario_id']);
$id_usuario = $usuario_logado ? $_SESSION['usuario_id'] : null;

// --- Configuração e Estilo Básico ---
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include_once 'header/header.php';?>
    </header>
    <main>
        <h2>Eventos</h2>

        <?php
        // Exibir mensagem de login se o usuário não estiver logado
        if (!$usuario_logado) {
            echo '<p class="login-prompt">Faça <a href="login.php">login</a> para interagir com os eventos (inscrever, curtir, favoritar).</p>';
        }

        // Verifica se a conexão com o banco de dados foi estabelecida
        if (!isset($conn) || !$conn) {
            echo '<p class="no-events">Erro: Não foi possível conectar ao banco de dados.</p>';
        } else {
            try {
                // Prepara a consulta para selecionar todos os eventos
                $stmt_eventos = $conn->prepare('SELECT organizador_id, nome_evento, descricao, data_evento, localizacao, preco, status, organizador_id FROM eventos ORDER BY data_evento ASC');
                $stmt_eventos->execute();
                $eventos = $stmt_eventos->fetchAll(PDO::FETCH_ASSOC);

                if ($eventos) {
                    foreach ($eventos as $evento) {
                        $data_formatada = date('d/m/Y', strtotime($evento['data_evento']));
                        $preco_formatado = 'R$ ' . number_format($evento['preco'], 2, ',', '.');
                        $status_class = ($evento['status'] == 'ativo') ? 'status-ativo' : 'status-inativo';

                        echo '<div class="evento-card">';
                        echo '<h2>' . htmlspecialchars($evento['nome_evento']) . '</h2>';
                        echo '<p><strong>Descrição:</strong> ' . htmlspecialchars($evento['descricao']) . '</p>';
                        echo '<p><strong>Data:</strong> ' . $data_formatada . '</p>';
                        echo '<p><strong>Local:</strong> ' . htmlspecialchars($evento['localizacao']) . '</p>';
                        echo '<p><strong>Preço:</strong> ' . $preco_formatado . '</p>';
                        echo '<p><strong>Status:</strong> <span class="' . $status_class . '">' . htmlspecialchars(ucfirst($evento['status'])) . '</span></p>';

                        // Botões de Interação
                        echo '<div class="interaction-buttons">';
                        if ($usuario_logado) {
                            // Consultar interações do usuário para este evento
                            $stmt_interacao = $conn->prepare('SELECT tipo_interacao FROM interacoes WHERE usuario_id = :usuario_id AND evento_id = :evento_id');
                            $stmt_interacao->bindParam(':usuario_id', $id_usuario);
                            $stmt_interacao->bindParam(':evento_id', $evento['id']);
                            $stmt_interacao->execute();
                            $interacoes_usuario = $stmt_interacao->fetchAll(PDO::FETCH_COLUMN); // Pega apenas a coluna 'tipo_interacao'

                            $interacao_inscricao = in_array('inscricao', $interacoes_usuario) ? 'active' : '';
                            $interacao_like = in_array('like', $interacoes_usuario) ? 'active' : '';
                            $interacao_favorito = in_array('favorito', $interacoes_usuario) ? 'active' : '';

                            // Botão Inscrever
                            echo '<form action="handle_interaction.php" method="POST">';
                            echo '<input type="hidden" name="evento_id" value="' . htmlspecialchars($evento['id']) . '">';
                            echo '<input type="hidden" name="tipo_interacao" value="inscricao">';
                            echo '<button type="submit" class="' . $interacao_inscricao . '">';
                            echo ($interacao_inscricao == 'active') ? 'Inscrito!' : 'Inscrever';
                            echo '</button>';
                            echo '</form>';

                            // Botão Like
                            echo '<form action="handle_interaction.php" method="POST">';
                            echo '<input type="hidden" name="evento_id" value="' . htmlspecialchars($evento['id']) . '">';
                            echo '<input type="hidden" name="tipo_interacao" value="like">';
                            echo '<button type="submit" class="' . $interacao_like . '">';
                            echo ($interacao_like == 'active') ? 'Curtido!' : 'Like';
                            echo '</button>';
                            echo '</form>';

                            // Botão Favoritar
                            echo '<form action="handle_interaction.php" method="POST">';
                            echo '<input type="hidden" name="evento_id" value="' . htmlspecialchars($evento['id']) . '">';
                            echo '<input type="hidden" name="tipo_interacao" value="favorito">';
                            echo '<button type="submit" class="' . $interacao_favorito . '">';
                            echo ($interacao_favorito == 'active') ? 'Favorito!' : 'Favoritar';
                            echo '</button>';
                            echo '</form>';

                        } else {
                            // Se não estiver logado, desabilita os botões
                            echo '<form><button type="button" disabled>Inscrever</button></form>';
                            echo '<form><button type="button" disabled>Like</button></form>';
                            echo '<form><button type="button" disabled>Favoritar</button></form>';
                        }
                        echo '</div>'; // Fim interaction-buttons

                        echo '</div>'; // Fim evento-card
                    }
                } else {
                    echo '<p class="no-events">Nenhum evento encontrado no momento.</p>';
                }

            } catch (PDOException $e) {
                echo '<p class="no-events">Ocorreu um erro ao carregar os eventos: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }
        }
        ?>
    </main>
    <footer>
        <?php include_once 'footer/footer.php'; ?>
    </footer>
</body>
</html>