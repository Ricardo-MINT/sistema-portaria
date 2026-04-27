<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Consultar Funcionários/Prestador de Serviços</title>
    <style>
        .input-pequeno{
            width: 60%;
            height: 24px;
            font-size: 12px;
            padding: 4px;
        }
        .w3-half {
            display: flex;
            flex-direction: column;
            align-items: center;  /* Alinha os itens horizontalmente ao centro */
            justify-content: center;  /* Alinha os itens verticalmente ao centro */
            width: 50%;
        }
        .camera-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;  /* Garantir que o contêiner ocupe toda a altura disponível */
        }
        .w3-card-camera {
            display: flex;
            flex-direction: column;
            align-items: center;  /* Centraliza o conteúdo horizontalmente */
            justify-content: center;  /* Centraliza o conteúdo verticalmente */
            padding: 30px;
            width: 450px;

        }
        .w3-row-padding {
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-wrap: wrap;
        }
        .input-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 2px; 
            width: 60%; 
        }
        .w3-text-black {
            text-align: left; 
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
            padding-left: 5px; 
            width: auto; 
        }
        .input-pequeno {
            width: 100%; 
            height: 24px;
            font-size: 12px;
            padding: 4px;
        }

        .input-busca {
            width: 30%;
            height: 24px;
        }

    </style>
</head>
<body>

    <div class="w3-container w3-padding-16">
        
        <div class="w3-card w3-gray w3-padding-16 w3-round">

        <?php
                if (isset($_POST['txtCpf_fEP'])) {
                    // Exibe os dados do funcionário/Prestador específico
                    echo '<a href="FPconsultar.php" class="w3-button w3-light-gray w3-round w3-margin">';
                    echo '<i class="fa fa-arrow-circle-left"></i> Voltar</a>';  
                } else {
                    // Exibe a lista de funcionário/Prestador de Serviços e o botão para voltar à página principal2.php
                    echo '<a href="principal.php" class="w3-button w3-light-gray w3-round w3-margin">';
                    echo '<i class="fa fa-arrow-circle-left"></i> Voltar</a>';
                }
        ?>

            <div style="align-items: center;">
                <h2 style="flex-grow: 1; text-align: center;"><b>Consulta de Funcionários/Prestador de Serviços</b></h2>
            </div><br>

            <?php
                // Exibe o formulário de consulta apenas quando não houver um CPF específico sendo consultado
                if (!isset($_POST['txtCpf_fEP'])) {
                    echo '<form method="POST" class="w3-container">';
                    echo '<div class="w3-center">';
                    echo '<label for="txtCpf_fEP" class="w3-text-black"><b>Digite o CPF:</b></label>';
                    echo '<input type="text" id="txtCpf_fEP" name="txtCpf_fEP" required class="w3-input w3-border w3-round w3-small w3-auto input-busca">';
                    echo '</div>';

                    echo '<div class="w3-center">';
                    echo '<button type="submit" class="w3-button w3-light-gray w3-round w3-margin-top"><i class="fa fa-search"></i> Consultar</button>';
                    echo '</div>';
                    echo '</form>';
                }
            ?>

        </div>

        <div class="w3-card w3-gray w3-padding-16 w3-round w3-margin-top w3-center">
            <?php
                require_once ('config.php');

                // Se o CPF foi enviado pelo formulário
                if (isset($_POST['txtCpf_fEP'])) {
                    $cpf = $conexao->real_escape_string($_POST['txtCpf_fEP']);
                    $sql = "SELECT * FROM funcionarioseprestadores WHERE cpf_fEP = '$cpf'";
                    $resultado = $conexao->query($sql);

                    if ($resultado && $resultado->num_rows > 0) {
                        $linha = $resultado->fetch_assoc();
                        
                        echo '<div class="w3-row-padding">';
                        echo '<div class="w3-half">';

                        echo '<div class="input-container">';

                        echo '<label class="w3-text-black"><b>CPF</b></label>';
                        echo '<input type="text" value="'.$linha['cpf_fEP'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Nome</b></label>';
                        echo '<input type="text" value="'.$linha['nome'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Telefone</b></label>';
                        echo '<input type="text" value="'.$linha['telefone'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Email</b></label>';
                        echo '<input type="email" value="'.$linha['email'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Veículo</b></label>';
                        echo '<input type="text" value="'.$linha['veiculo'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Placa do Veículo</b></label>';
                        echo '<input type="text" value="'.$linha['placaVeiculo'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Empresa</b></label>';
                        echo '<input type="text" value="'.$linha['empresa'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>CNPJ da Empresa</b></label>';
                        echo '<input type="text" value="'.$linha['cnpjEmpresa'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Telefone da Empresa</b></label>';
                        echo '<input type="text" value="'.$linha['telEmpresa'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Email da Empresa</b></label>';
                        echo '<input type="text" value="'.$linha['emailEmp'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '<label class="w3-text-black"><b>Ocupação</b></label>';
                        echo '<input type="text" value="'.$linha['ocupacao'].'" readonly class="w3-input w3-border w3-round w3-small input-pequeno">';

                        echo '</div>';
                        echo '</div>';
                    
                        // Coluna Direita: Foto em Card Branco
                        echo '<div class="w3-half camera-container">';
                        echo '<div class="w3-card w3-white w3-round w3-card-camera">'; // Card branco
                        echo'<h3 class="w3-center">Foto</h3>';
                        if (!empty($linha['foto'])) {
                            if (file_exists($linha['foto'])) {
                                echo '<img src="' . $linha['foto'] . '" width="240" height="180" class="w3-margin">';
                            } else {
                                echo '<p>Foto não encontrada no diretório!</p>';
                            }
                        } else {
                            echo '<p>Sem foto disponível.</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                        
                        echo '</div>'; // Fechando a w3-row
                    } else {
                        echo '<p>Nenhum funcionário/Prestador de Serviços encontrado.</p>';
                    }

                } else {
                    // Exibe a lista de todos os funcionário/Prestador de Serviços
                    echo '<div class="w3-responsive w3-margin-top">';
                    echo '<table class="w3-table w3-bordered w3-striped w3-hoverable">';
                    echo '<thead class="w3-gray">';
                    echo '<tr>';
                    echo '<th>CPF</th><th>Nome</th><th>Telefone</th><th>Email</th><th>Veículo</th><th>Placa Veículo</th>
                    <th>Empresa</th><th>CNPJ da Empresa</th><th>Telefone da Empresa</th><th>Email da Empresa</th><th>Ocupação</th>';
                    echo '</tr></thead><tbody>';

                    $sql = "SELECT * FROM funcionarioseprestadores;";
                    $resultado = $conexao->query($sql);
                    if ($resultado != null) {
                        foreach($resultado as $linha) {
                            echo '<tr>';
                            echo '<td>' . $linha['cpf_fEP'] . '</td>';
                            echo '<td>' . $linha['nome'] . '</td>';
                            echo '<td>' . $linha['telefone'] . '</td>';
                            echo '<td>' . $linha['email'] . '</td>';
                            echo '<td>' . $linha['veiculo'] . '</td>';
                            echo '<td>' . $linha['placaVeiculo'] . '</td>';
                            echo '<td>' . $linha['empresa'] . '</td>';
                            echo '<td>' . $linha['cnpjEmpresa'] . '</td>';
                            echo '<td>' . $linha['telEmpresa'] . '</td>';
                            echo '<td>' . $linha['emailEmp'] . '</td>';
                            echo '<td>' . $linha['ocupacao'] . '</td>';
                            echo '</tr>';
                        }
                    }

                    echo '</tbody></table></div>';
                }

                $conexao->close();
            ?>
        </div>
    </div>
</body>
</html>
