<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <title>Deletar - Morador</title>
 <style>
    .input-pequeno {
        width: 80%;
        height: 24px;
        font-size: 12px;
        padding: 4px;
    }
    .w3-half {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 50%;
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
    .w3-card-camera {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 30px;
        width: 450px;
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
                    if (isset($_POST['txtCpf_mor'])) {
                        // Exibe os dados do morador específico
                        echo '<a href="Mdeletar.php" class="w3-button w3-light-gray w3-round w3-margin">';
                        echo '<i class="fa fa-arrow-circle-left"></i> Voltar</a>';  
                    } else {
                        // Exibe a lista de moradores e o botão para voltar à página principal2.php
                        echo '<a href="principal.php" class="w3-button w3-light-gray w3-round w3-margin">';
                        echo '<i class="fa fa-arrow-circle-left"></i> Voltar</a>';
                    }
            ?>

                <div style="align-items: center;">
                    <h2 style="flex-grow: 1; text-align: center;"><b>Deletar Morador</b></h2>
                </div><br>

                <?php
                    // Exibe o formulário de consulta apenas quando não houver um CPF específico sendo consultado
                    if (!isset($_POST['txtCpf_mor'])) {
                        echo '<form method="POST" class="w3-container">';
                        echo '<div class="w3-center">';
                        echo '<label for="txtCpf_mor" class="w3-text-black"><b>Digite o CPF:</b></label>';
                        echo '<input type="text" id="txtCpf_mor" name="txtCpf_mor" required class="w3-input w3-border w3-round w3-small w3-auto input-busca">';
                        echo '</div>';

                        echo '<div class="w3-center">';
                        echo '<button type="submit" class="w3-button w3-light-gray w3-round w3-margin-top"><i class="fa fa-search"></i> Consultar</button>';
                        echo '</div>';
                        echo '</form>';
                    }
                ?>

            </div>

                <?php
                require_once ('config.php');

                if (isset($_POST['txtCpf_mor'])) {
                    $cpf = $conexao->real_escape_string($_POST['txtCpf_mor']);
                    $sql = "SELECT * FROM moradores WHERE cpf_mor = '$cpf'";
                    $resultado = $conexao->query($sql); 

                    if ($resultado->num_rows > 0) {
                        $linha = $resultado->fetch_assoc();
                    } else {
                        echo '<br>';
                        echo '<div class="w3-container w3-padding-32 w3-center w3-round w3-gray">';
                        echo "Morador não encontrado!";
                        echo '</div>';
                        exit();
                    }
                } else {
                    exit();
                }
                ?>
            

        <div class="w3-card w3-gray w3-padding-16 w3-round w3-margin-top">
            <form action="MdeletarAc.php" method="post">
                <div class="w3-row-padding">
                    <!-- Coluna Esquerda: Formulário -->
                    <div class="w3-half">
                        <div class="input-container">
                            <input name="txtCpf_mor" type="hidden" value="<?php echo $linha['cpf_mor']; ?>">

                            <label class="w3-text-black">Nome</label>
                            <input name="txtNome" value="<?php echo $linha['nome']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Telefone</label>
                            <input name="txtTelefone" value="<?php echo $linha['telefone']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Email</label>
                            <input name="txtEmail" value="<?php echo $linha['email']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Veículo</label>
                            <input name="txtVeiculo" value="<?php echo $linha['veiculo']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Placa Veículo</label>
                            <input name="txtPlacaVeiculo" value="<?php echo $linha['placaVeiculo']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Endereço</label>
                            <input name="txtEndereco" value="<?php echo $linha['endereco']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Comp. Endereço</label>
                            <input name="txtCompEndereco" value="<?php echo $linha['compEndereco']; ?>" class="w3-input w3-border w3-round input-pequeno">

                            <label class="w3-text-black">Vaga Garagem</label>
                            <input name="txtVagaGaragem" value="<?php echo $linha['vagaGaragem']; ?>" class="w3-input w3-border w3-round input-pequeno">
                        </div>
                    </div>

                    <!-- Coluna Direita: Foto -->
                    <div class="w3-half">
                        <div class="w3-card w3-white w3-round w3-card-camera">
                            <h3 class="w3-center">Foto</h3>
                            <?php
                            if (!empty($linha['foto'])) {
                                if (file_exists($linha['foto'])) {
                                    echo '<img src="' . $linha['foto'] . '" width="240" height="180" class="w3-margin">';
                                } else {
                                    echo '<p>Foto não encontrada no diretório!</p>';
                                }
                            } else {
                                echo '<p>Sem foto disponível.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="w3-center">
                    <button name="btnDeletar" class="w3-button w3-red w3-round w3-margin-top">
                        <i class="fa fa-trash"></i> Deletar
                    </button>
                </div>
            </form>
        </div>

</body>
</html>
