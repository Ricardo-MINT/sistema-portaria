<?php
$server = "localhost";
$username = "portaria_user";
$password = "portaria123";
$dbname = "conddb";

$conexao = new mysqli($server, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
?>
