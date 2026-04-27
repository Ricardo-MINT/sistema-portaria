<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <title>Atualizar - Morador</title>
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
            require_once ('config.php');

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cpf_mor = $_POST['txtCpf_mor'];
                $nome = $_POST['txtNome'];
                $telefone = $_POST['txtTelefone'];
                $email = $_POST['txtEmail'];
                $veiculo = $_POST['txtVeiculo'];
                $placaVeiculo = $_POST['txtPlacaVeiculo'];
                $endereco = $_POST['txtEndereco'];
                $compEndereco = $_POST['txtCompEndereco'];
                $vagaGaragem = $_POST['txtVagaGaragem'];
        
                // Atualiza os dados no banco
                $sql = "UPDATE moradores SET 
                                nome=?, telefone=?, email=?, veiculo=?, placaVeiculo=?, 
                                endereco=?, compEndereco=?, vagaGaragem=? 
                            WHERE cpf_mor=?";
                    
                // Preparando o statement
                $stmt = $conexao->prepare($sql);
                if ($stmt === false) {
                    die('Erro na preparação da query: ' . $conexao->error);
                }

                // Bind dos parâmetros
                $stmt->bind_param("sssssssss", 
                            $nome, $telefone, $email, $veiculo, 
                            $placaVeiculo, $endereco, $compEndereco, 
                            $vagaGaragem, $cpf_mor);

                // Executando o statement
                if ($stmt->execute()) {
                    echo '<h1>Morador Atualizado com sucesso!</h1>';
                } else {
                    echo '<h1>ERRO! Não foi possível atualizar os dados.</h1>';
                    
                }

                $stmt->close();
            }

            $conexao->close();
            ?>
           </div>
     </div>

</div>

</body>
</html>
