<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Cadastrar Morador</title>
</head>
<body>

    <!-- Card cinza que pega toda a tela -->
    <div class="w3-card w3-gray w3-padding-4 w3-round w3-margin" style="min-height:100vh;">

    <!-- Botão voltar -->
    <a href="principal.php" class="w3-button w3-light-gray w3-round w3-margin">
        <i class="fa fa-arrow-circle-left"></i> Voltar
    </a>

        <!-- Caixa central com fundo light-gray -->
        <div class="w3-display-middle">
            <div class="w3-container w3-light-gray w3-round w3-padding-large w3-center w3-card-4" style="width: 90%; max-width: 500px;">
            <?php
                // Exibir erro se houver
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                require_once ('config.php');

                $cpf = $_POST['txtCpf_mor'];
                $nome = $_POST['txtNome'];
                $telefone = $_POST['txtTelefone'];
                $email = $_POST['txtEmail'];
                $veiculo = $_POST['txtVeiculo'];
                $placaVeiculo = $_POST['txtPlacaVeiculo'];
                $endereco = $_POST['txtEndereco'];
                $compEndereco = $_POST['txtCompEndereco'];
                $vagaGaragem = $_POST['txtVagaGaragem'];
                $foto = $_POST['foto'];

                $fotoPath = null;

                if (!empty($foto)) {
                    $uploadDir = __DIR__ . "/../uploads/";
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $foto_bin = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $foto));
                    $nomeArquivo = "foto_" . $cpf . ".jpg";
                    $fotoPath = "../uploads/" . $nomeArquivo;
                    $caminhoFisico = $uploadDir . $nomeArquivo;

                    if (file_put_contents($caminhoFisico, $foto_bin) === false) { 
                        die("Erro ao salvar a imagem!");
                    }
                }

                $sql = $conexao->prepare("INSERT INTO moradores 
                (cpf_mor, nome, telefone, email, veiculo, placaVeiculo, endereco, compEndereco, vagaGaragem, foto)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $sql->bind_param(
                    "ssssssssss",
                    $cpf,
                    $nome,
                    $telefone,
                    $email,
                    $veiculo,
                    $placaVeiculo,
                    $endereco,
                    $compEndereco,
                    $vagaGaragem,
                    $fotoPath
);
if ($sql->execute()) {
    echo '<h2>Cadastro Realizado com Sucesso!</h2>';

                } else {
                    echo '<h2>Erro ao cadastrar! '. $sql->error .'</h2>';
                }

                $conexao->close();
            ?>
            </div>
     </div>

</div>

</body>
</html>
