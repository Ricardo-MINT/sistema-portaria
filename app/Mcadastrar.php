<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Cadastro - Morador</title>
    <style>

        .w3-half {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            width: 50%; 
        }

        .camera-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .w3-card-camera {
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center;
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
            margin-bottom: 2px; /* Espaço entre o label e o input */
            padding-left: 5px; 
            width: auto; 
        }

        .input-pequeno {
            width: 100%; 
            height: 24px;
            font-size: 12px;
            padding: 4px;
        }
    </style>

</head>
<body>

    <div class="w3-card w3-gray w3-padding-4 w3-round w3-margin">

        <div style="align-items: center;">
            <a href="principal.php" class="w3-button w3-light-gray w3-round w3-margin">
                <i class="fa fa-arrow-circle-left"></i> Voltar
            </a>
                <h1 style="text-align: center;"><b>Cadastro de Moradores</b></h1>
        </div><br>


        <form action="McadastrarAc.php" method="POST" enctype="multipart/form-data">
            <div class="w3-row-padding">
                <!-- Coluna Esquerda: Formulário -->
                <div class="w3-half">

                <div class="input-container">
                    <label class="w3-text-black"><b>CPF</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtCpf_mor" required
                           pattern="\d{11}" maxlength="11" title="Digite apenas 11 números.">
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Nome</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtNome" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Telefone</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtTelefone" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Email</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="email" name="txtEmail" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Veículo</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtVeiculo" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Placa Veículo</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtPlacaVeiculo" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Endereço</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtEndereco" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Comp. Endereço</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtCompEndereco" required>
                </div>

                <div class="input-container">
                    <label class="w3-text-black"><b>Vaga Garagem</b></label>
                    <input class="w3-input input-pequeno w3-border w3-round w3-small" type="text" name="txtVagaGaragem" required>
                </div>
                </div>

                <!-- Coluna Direita: Captura de Imagem -->
                <div class="w3-half camera-container">
                    <div class="w3-card w3-white w3-round w3-card-camera">
                        <h3 class="w3-center">Capturar Foto</h3>

                        <!-- Container da Câmera -->
                        <div class="w3-border w3-round w3-center" id="camera" style="width: 240px; height: 180px;">
                            <!-- A imagem capturada será exibida aqui -->
                        </div>

                        <input type="hidden" name="foto" id="foto">
                        <button type="button" class="w3-button w3-gray w3-round w3-margin-top" onclick="takeSnapshot()">
                            <i class="fa fa-camera"></i> Tirar Foto
                        </button>
                    </div>
                </div>
            </div><br><br>

            <!-- Botão de Enviar -->
            <div class="w3-center">
                <button name="btnAdicionar" type="submit" class="w3-button w3-light-gray w3-round w3-margin">
                    <i class="fa fa-user-plus"></i> Adicionar
                </button>
            </div>
        </form>
    </div>

    <script>
        Webcam.set({
            width: 240,
            height: 180,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#camera');

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('camera').innerHTML = '<img src="' + data_uri + '" style="width: 100%; height: 100%;">';
                document.getElementById('foto').value = data_uri;
            });
        }
    </script>

</body>
</html>
