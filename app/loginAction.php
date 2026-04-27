<?php
session_start();
require_once('config.php');

$usuario = trim($_POST['txtUsuario'] ?? '');
$senha = trim($_POST['txtSenha'] ?? '');
$mensagem = '';
$link = 'index.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $mensagem = 'Acesso inválido!';
} elseif ($usuario === '' || $senha === '') {
    $mensagem = 'Preencha usuário e senha!';
} else {
    $stmt = $conexao->prepare("SELECT usuario, senha FROM controladoresdeacesso WHERE usuario = ?");

    if ($stmt === false) {
        $mensagem = 'Erro na preparação da consulta: ' . $conexao->error;
    } else {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $linha = $resultado->fetch_assoc();

        if ($linha && $linha['senha'] === $senha) {
            $_SESSION['logado'] = $linha['usuario'];
            $mensagem = htmlspecialchars($linha['usuario'], ENT_QUOTES, 'UTF-8') . ', Seja Bem-Vindo(a)!';
            $link = 'principal.php';
        } else {
            $mensagem = 'Login Inválido!';
        }

        $stmt->close();
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
    <div class="w3-padding w3-content w3-text-gray w3-third w3-display-middle w3-center">
        <a href="<?php echo $link; ?>">
            <h1 class="w3-button w3-gray"><?php echo $mensagem; ?></h1>
        </a>
    </div>
</body>
</html>