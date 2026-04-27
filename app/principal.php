<?php require_once ('verificarAcesso.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Portaria 1.0</title>
    <style>
        .w3-row-padding {
            display: flex;
            gap: 16px; /* Espaço entre os cards */
            justify-content: center;
            align-items: stretch; /* Faz os cards ficarem do mesmo tamanho */
        }

        .w3-card {
            height: 100%; /* Faz os cards ocuparem toda a altura disponível */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Distribui os elementos */
        }

        .w3-card h1 {
            min-height: 60px; /* Garante que todos os títulos tenham o mesmo espaço */
        }
    </style>
</head>
<body>

    <div class="w3-display-container" style="height: 100vh;">
        <div class="w3-display-middle w3-center" style="width: 80%;">

        <!-- Botão de Logout alinhado à direita -->
        <div class="w3-container" style="text-align: right;">
                <form action="logoutAction.php" method="post" style="display: inline;">
                    <button name="btnLogout" class="w3-button w3-red w3-round w3-margin-bottom">
                        <i class="w3-large fa fa-times-rectangle"></i> Logout
                    </button>
                </form>
        </div>

            <div class="w3-row-padding">
                
                <!-- Morador -->
                <div class="w3-col s12 m4 l4">
                    <div class="w3-card w3-gray w3-padding-32 w3-round w3-center">
                      <h1>Moradores</h1><br>
                        <i class="fas fa-house-user w3-jumbo"></i>
                        <select class="w3-select w3-margin-top w3-block w3-center" name="Morador" onchange="location = this.value;">
                            <option value="" disabled selected>Selecionar</option>
                            <option value="Mcadastrar.php">Cadastrar</option>
                            <option value="Mconsultar.php">Consultar</option>
                            <option value="Malterar.php">Alterar</option>
                            <option value="Mdeletar.php">Deletar</option>
                        </select>
                    </div>
                </div>

                <!-- Visitante -->
                <div class="w3-col s12 m4 l4">
                    <div class="w3-card w3-gray w3-padding-32 w3-round w3-center">
                        <h1>Visitantes</h1><br>
                        <i class="fa-solid fa-user w3-jumbo"></i>
                        <select class="w3-select w3-margin-top w3-block w3-center" name="Visitante" onchange="location = this.value;">
                            <option value="" disabled selected>Selecionar</option>
                            <option value="Vcadastrar.php">Cadastrar</option>
                            <option value="Vconsultar.php">Consultar</option>
                            <option value="Valterar.php">Alterar</option>
                            <option value="Vdeletar.php">Deletar</option>
                        </select>
                    </div>
                </div>

                <!-- Prestador -->
                <div class="w3-col s12 m4 l4">
                    <div class="w3-card w3-gray w3-padding-32 w3-round w3-center">
                        <h1>Funcionários e Prest. de Serviços</h1><br>
                        <i class="fa-solid fa-people-carry-box w3-jumbo"></i>
                        <select class="w3-select w3-margin-top w3-block w3-center" name="Prestador" onchange="location = this.value;">
                            <option value="" disabled selected>Selecionar</option>
                            <option value="FPcadastrar.php">Cadastrar</option>
                            <option value="FPconsultar.php">Consultar</option>
                            <option value="FPalterar.php">Alterar</option>
                            <option value="FPdeletar.php">Deletar</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
